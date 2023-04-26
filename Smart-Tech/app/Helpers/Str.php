<?php

namespace App\Helpers;

class Str
{

    public static function toPascalCase(string $subject): string
    {
        return str_replace('_', '', ucwords($subject, '_'));
    }

    public static function tocamelCase(string $subject): string
    {
        return lcfirst(self::toPascalCase($subject));
    }

    public function toSnakeCase(string $subject): string
    {
        $snakeCase = strtolower(preg_replace('/[A-Z]/', '_$0', $subject));
        return $snakeCase;
    }

    public static function token(): string
    {
        return bin2hex(random_bytes(16));
    }

    public static function slug(string $string)
    {
        $disallowedCharacters = '/[^\-\s\pN\pL]+/';
        $spacesDuplicate = '/[\-\s]+/';

        $slug = mb_strtolower($string, 'UTF-8');
        $slug = preg_replace($disallowedCharacters, '', $slug);
        $slug = preg_replace($spacesDuplicate, '-', $slug);
        $slug = trim($slug, '-');

        return $slug;
    }
}
