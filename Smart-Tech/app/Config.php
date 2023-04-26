<?php

namespace App;

class Config
{
    private static array $options = [
        'app' => [
            'uploadFolder' => 'images'
        ],
        'database' => [
            'host' => 'localhost',
            'dbname' => 'smarttech',
            'charset' => 'utf8mb4',
            'username' => 'root',
            'password' => 'root'
        ]
    ];

    public static function get(string $selector)
    {
        $elements = explode('.', $selector);
        $dataset = self::$options;
        foreach ($elements as $element) {
            if (isset($dataset[$element])) {
                $dataset = $dataset[$element];
            } else {
                return null;
            }
        }

        return $dataset;
    }
}
