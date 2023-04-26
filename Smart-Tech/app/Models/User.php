<?php

namespace App\Models;

use App\Models\Database;
use Exception;
use App\Helpers\Str;
use App\Models\Post;

class User
{
    private Database $db;
    private string $id;
    private string $firstName;
    private string $lastName;
    private string $gender;
    private string $username;
    private string $email;
    private string $password;



    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function find(int|string $identifier): bool
    {
        $column = is_int($identifier) ? 'id' : 'email';
        $sql = "SELECT * FROM `users` WHERE `{$column}` = :identifier";

        $userQuery = $this->db->query($sql, ['identifier' => $identifier]);

        if (!$userQuery->count() === 0) {
            return false;
        }

        $userData = $userQuery->first();

        foreach ($userData as $key => $value) {
            $keyCamelCase = Str::toCamelCase($key);
            $this->{$keyCamelCase} = $value;
        }

        return true;
    }

    public function register(array $userData): void
    {

        //md5 ist nicht mehr sicher
        //md5-hashes sind nicht mehr vertrauenswürdig
        //bcrypt ist eine sicherere Alternative zu md5-hashes und wird für Password hashing verwendet.
        //bycrpt hat mehrere algorithmen, die sich unterscheiden.
        $passwordHash = password_hash($userData['password'], PASSWORD_DEFAULT, ['cost' => 10]);

        $sql = "
        INSERT INTO `users`
        (`username`, `first_name`, `last_name`, `gender`, `email`, `password`)
        VALUES (:username, :firstName, :lastName, :gender, :email, :password)
        ";

        $this->db->query($sql, [
            'username' => $userData['username'],
            'firstName' => $userData['firstName'],
            'lastName' => $userData['lastName'],
            'gender' => $userData['gender'],
            'email' => $userData['email'],
            'password' => $passwordHash
        ]);
    }

    public function login(array $userData): void
    {

        $sql = '
        SELECT *
        FROM `users`
        WHERE `username` = :username
        
        ';

        $userQuery = $this->db->query($sql, [
            'username' => $userData['username']
        ]);



        if ($userQuery->count() < 1) {
            throw new Exception('Username or password is incorrect');
        }

        $queryResults = $userQuery->result()[0];

        $sql = "
        SELECT `attempts`
         FROM `login_attempts`
         WHERE `user_id` = :id";

        $attemptsQuery = $this->db->query($sql, [
            'id' => $queryResults['id']
        ]);

        $attempts = 0;

        if ($attemptsQuery->count() > 0) {
            $attempts = (int) $attemptsQuery->first()['attempts'];

            if ($attempts === 3) {
                throw new Exception('You have reached the maximum number of login trys. Please try again later.');
            }
        }

        $hash = $queryResults['password'];

        if (!password_verify($userData['password'], $hash)) {
            if ($attempts === 0) {
                $sql = "
                INSERT INTO `login_attempts`
                (`user_id`, `attempts`)
                VALUES (:id, :attempts)
                ";

                $this->db->query($sql, [
                    'id' => $queryResults['id'],
                    'attempts' => 1
                ]);
            } else {
                $sql = "UPDATE `login_attempts` SET `attempts` = :attempts WHERE `user_id` = :id";
                $this->db->query($sql, [
                    'attempts' => $attempts + 1, 'id' => $queryResults['id']
                ]);
            }

            throw new Exception('Username or password is incorrect');
        }

        $sql = "DELETE FROM `login_attempts` WHERE `user_id` = :id";

        $_SESSION['userId'] = (int) $queryResults['id'];
    }

    public function logout(): void
    {
        unset($_SESSION['userId']);
    }

    public function isLoggedIn(): bool
    {
        return isset($_SESSION['userId']);
    }

    public function getPosts(): array
    {
        $sql = "SELECT * FROM `posts` WHERE `user_id` = :user_id";

        $postsQuery = $this->db->query($sql, [
            'user_id' => $this->getId()
        ]);

        $posts = [];

        foreach ($postsQuery->result() as $result) {
            $posts[] = new Post($this->db, $result);
        }

        return $posts;
    }

    public function getAllPosts(): array
    {
        $sql = "SELECT * FROM `posts` WHERE NOT `user_id` = :user_id";

        $postsQuery = $this->db->query($sql, [
            'user_id' => $this->getId()
        ]);

        $posts = [];

        foreach ($postsQuery->result() as $result) {
            $posts[] = new Post($this->db, $result);
        }

        return $posts;
    }

    //Roles

    public function getRoles(): string
    {
        $sql = "
        SELECT `roles`.`name`
        FROM `users_roles`
        LEFT JOIN `roles`
        ON `users_roles`.`role_id` = `roles`.`id`
        WHERE `users_roles`.`user_id` = :user_id
        ";

        $rolesQuery = $this->db->query($sql, [
            'user_id' => $this->getId()
        ]);

        if ($rolesQuery->count() < 1) {
            return 'user';
        }

        $roleName = $rolesQuery->result()[0]['name'];

        return $roleName;
    }

    // to implement later

    // public function setAdmin(): void
    // {
    //     $sql = "
    //     INSERT INTO `users_roles`
    //     (`user_id`, `role_id`)
    //     VALUES (:user_id, :role_id)
    //     ";
    //     $this->db->query($sql, [
    //         'user_id' => $this->getId(),
    //         'role_id' => 3
    //     ]);
    // }

    // public function setEditor(): void
    // {
    //     $sql = "
    //     INSERT INTO `users_roles`
    //     (`user_id`, `role_id`)
    //     VALUES (:user_id, :role_id)
    //     ";
    //     $this->db->query($sql, [
    //         'user_id' => $this->getId(),
    //         'role_id' => 2
    //     ]);
    // }

    // public function removeRole(): void
    // {
    //     $sql = "
    //     DELETE FROM `users_roles`
    //     WHERE `user_id` = :user_id
    //     ";
    //     $this->db->query($sql, [
    //         'user_id' => $this->getId()
    //     ]);
    // }


    //User Data

    public function getId(): int
    {
        return (int) ($this->id ?? $_SESSION['userId']);
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getGender(): string
    {
        return $this->gender;
    }

    public function getFullName(): string
    {
        return "{$this->firstName} {$this->lastName}";
    }
}
