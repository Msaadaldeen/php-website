<?php

namespace App\Models;

use App\Models\Database;
use App\Helpers\Str;
use App\Models\User;
use App\Config;
use App\Models\Post;


class Comment
{
    private Database $db;
    private string $userId;
    private string $postId;
    private string $body;
    private string $commentedAt;

    public function __construct(Database $db, ?array $data = [])
    {
        $this->db = $db;
        $this->fill($data);
    }

    public function find(int $identifier): bool
    {
        $sql = "SELECT * FROM `post_comments` WHERE `id` = :identifier";
        $commentQuery = $this->db->query($sql, ['identifier' => $identifier]);

        if (!$commentQuery->count()) {
            return false;
        }

        $this->fill($commentQuery->first());
        return true;
    }

    public function fill(array $data): void
    {
        foreach ($data as $field => $value) {
            $this->{Str::tocamelCase($field)} = $value;
        }
    }

    public function createComment(int $userId, $postId, array $commentData)
    {

        $sql = "INSERT INTO `post_comments`
                (`user_id`, `post_id`, `body`, `commented_at`)
                VALUES (:userId, :postId, :body, :commentedAt)
                ";


        $commentQuery = $this->db->query($sql, [
            'userId' => $userId,
            'postId' => $postId,
            'body' => $commentData['comment'],
            'commentedAt' => time()
        ]);
    }

    public function getComments(int $postId)
    {
        $sql = "SELECT * FROM `post_comments` WHERE `post_id` = :postId";
        $commentQuery = $this->db->query($sql, ['postId' => $postId]);

        return $commentQuery->result();
    }


    public function getId(): int
    {
        return (int) $this->id;
    }


    public function getUser(): User
    {
        $user = new User($this->db);
        $user->find($this->getUserId());
        return $user;
    }

    public function getUserId(): int
    {
        return (int) $this->userId;
    }

    public function getPost(): Post
    {
        $post = new Post($this->db);
        $post->find($this->getPostId());
        return $post;
    }

    public function getPostId(): int
    {
        return (int) $this->postId;
    }

    public function getBody(): string
    {
        return $this->body;
    }

    public function getPostedAt(): string
    {
        return date('D, d.m.Y H:i', $this->commentedAt);
    }
}
