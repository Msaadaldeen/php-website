<?php

namespace App;

class Request
{
    private array $pageParams;
    private array $postParams;
    private array $getParams;
    private array $fileParams;

    public function __construct(array $pageParams)
    {
        $this->pageParams = $pageParams;
        $this->postParams = $_POST;
        $this->getParams = $_GET;
        $this->fileParams = $_FILES;
    }

    public function getMethod(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public function getInput(string $kind = 'post'): array
    {
        $input = match ($kind) {
            'post' => $this->sanitizeInput($this->postParams),
            'get' => $this->sanitizeInput($this->getParams),
            'page' => $this->pageParams,
            'file' => $this->sanitizeFile($this->fileParams),
        };

        return $input;
    }

    private function sanitizeInput(array $input)
    {
        return array_map(function ($element) {
            return trim($element);
        }, $input);
    }

    public function sanitizeFile(array $file)
    {
        return array_filter($file, function ($element) {
            if ($element['name'] === '') {
                return false;
            }
            return true;
        });
    }
}
