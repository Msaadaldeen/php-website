<?php

namespace App\Models;

use App\Models\Database;
use App\Helpers\Str;
use App\Models\User;
use App\Config;
use App\Models\FileStorage;
use App\Models\Comment;


class Post
{
    private Database $db;
    private string $id;
    private string $userId;
    private string $title;
    private string $slug;
    private string $body;
    private string $postedAt;

    public function __construct(Database $db, ?array $data = [])
    {
        $this->db = $db;
        $this->fill($data);
    }

    public function find(int $identifier): bool
    {
        $sql = "SELECT * FROM `posts` WHERE `id` = :identifier";
        $postQuery = $this->db->query($sql, ['identifier' => $identifier]);

        if (!$postQuery->count()) {
            return false;
        }

        $this->fill($postQuery->first());
        return true;
    }

    public function fill(array $data): void
    {
        foreach ($data as $field => $value) {
            $this->{Str::tocamelCase($field)} = $value;
        }
    }

    public function create(int $userId, array $postData, array $image = null)
    {

        $sql = "INSERT INTO `posts`
                (`user_id`, `title`, `slug`, `body`, `posted_at`)
                VALUES (:userId, :title, :slug, :body, :postedAt)
                ";

        $slug = Str::slug($postData['title']);

        $this->db->query($sql, [
            'userId' => $userId,
            'title' => $postData['title'],
            'slug' => $slug,
            'body' => $postData['body'],
            'postedAt' => time()
        ]);

        if ($image === null) {
            return;
        }

        $sql = "SELECT MAX(`id`) AS `id` FROM `posts` WHERE `user_id` = :userId";
        $postQuery = $this->db->query($sql, ['userId' => $userId]);
        $postId = $postQuery->first()['id'];

        $fileStorage = new FileStorage($image);
        $fileStorage->saveIn(Config::get('app.uploadFolder'));
        $imageName = $fileStorage->getGeneratedName();

        $sql = "INSERT INTO `post_images`
                (`post_id`, `filename`, `created_at`)
                VALUES (:postId, :filename, :createdAt)
                ";

        $this->db->query($sql, [
            'postId' => $postId,
            'filename' => $imageName,
            'createdAt' => time()
        ]);
    }

    public function edit(array $postData)
    {
        $sql = "UPDATE `posts`
                SET `title` = :title, `slug` = :slug, `body` = :body
                WHERE `id` = :id
                ";

        $slug = Str::slug($postData['title']);

        $postData = [
            'title' => $postData['title'],
            'slug' => $slug,
            'body' => $postData['body'],
            'id' => $this->getId()
        ];

        $editQuery = $this->db->query($sql, $postData);

        $this->fill($postData);

        return (bool) $editQuery->count();
    }

    public function delete(): bool
    {

        $images = $this->getImages();

        foreach ($images as $image) {
            FileStorage::delete($image);
        }

        $sql = "DELETE FROM `posts` WHERE `id` = :id";

        $deleteQuery = $this->db->query($sql, [
            'id' => $this->getId()
        ]);

        return (bool) $deleteQuery->count();
    }

    public function like(int $userId): bool
    {
        $sql = "INSERT INTO `posts_likes`
                (`user_id`, `post_id`)
                VALUES (:userId, :postId)
                ";

        $likeQuery = $this->db->query($sql, [
            'userId' => $userId,
            'postId' => $this->getId(),
        ]);

        return (bool) $likeQuery->count();
    }

    public function dislike(int $userId): bool
    {
        $sql = "DELETE FROM `posts_likes`
                WHERE `user_id` = :userId AND `post_id` = :postId
                ";

        $unlikeQuery = $this->db->query($sql, [
            'userId' => $userId,
            'postId' => $this->getId(),
        ]);

        return (bool) $unlikeQuery->count();
    }

    public function getTotalLikes(): int
    {
        $sql = "SELECT COUNT(`id`) AS `total` FROM `posts_likes` WHERE `post_id` = :postId";

        $likeQuery = $this->db->query($sql, ['postId' => $this->getId()]);

        return (int) $likeQuery->first()['total'];
    }

    public function isLikedBy(int $userId): bool
    {
        $sql = "SELECT 1 FROM `posts_likes` WHERE `post_id` = :postId AND `user_id` = :userId";

        $likeQuery = $this->db->query($sql, [
            'postId' => $this->getId(),
            'userId' => $userId,
        ]);

        return (bool) $likeQuery->count();
    }

    public function getAllComments(): array
    {
        $sql = "SELECT * FROM `post_comments` WHERE `post_id` = :post_id";

        $commentsQuery = $this->db->query($sql, [
            'post_id' => $this->getId()
        ]);

        $comments = [];

        foreach ($commentsQuery->result() as $result) {
            $comments[] = new Comment($this->db, $result);
        }

        return $comments;
    }

    public function getCommentsCount(): int
    {
        $sql = "SELECT COUNT(`id`) AS `count` FROM `post_comments` WHERE `post_id` = :postId";
        $commentQuery = $this->db->query($sql, ['postId' => $this->getId()]);

        return $commentQuery->first()['count'];
    }

    public function getId(): int
    {
        return (int) $this->id;
    }

    public function getUserId(): int
    {
        return (int) $this->userId;
    }
    public function getUserName(): int
    {
        $user = new User($this->db);
        return  $user->getUserName($this->getUserId);
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function getBody(): string
    {
        return $this->body;
    }

    public function getPostedAt(): string
    {
        return date('D, d.m.Y H:i', $this->postedAt);
    }

    public function getUser(): User
    {
        $user = new User($this->db);
        $user->find($this->getUserId());
        return $user;
    }

    public function getImages(): array
    {

        $sql = "SELECT `filename` FROM `post_images` WHERE `post_id` = :postId";
        $imagesQuery = $this->db->query($sql, ['postId' => $this->getId()]);

        $images = array_map(function ($image) {
            return '/' . Config::get('app.uploadFolder') . '/' . $image['filename'];
        }, $imagesQuery->result());

        return $images;
    }
}
