<?php

namespace App\Models;

use App\Helpers\Str;
use FFI\Exception;

class FileStorage
{
    private array $file;
    private string $extension;
    private string $currentLocation;
    private string $generatedName;

    public function __construct(array $file)
    {
        $this->file = $file;
        $this->extension = strtolower(pathinfo($this->file['name'], PATHINFO_EXTENSION));
        $this->currentLocation = $this->file['tmp_name'];
        $this->generatedName = Str::token() . '.' . $this->extension;
    }

    public function getGeneratedName(): string
    {
        return $this->generatedName;
    }

    public function saveIn(string $folder): void
    {
        $destination = "{$folder}/{$this->generatedName}";
        $movedFile = move_uploaded_file($this->currentLocation, $destination);

        if (!$movedFile) {
            throw new Exception('File could not be uploaded');
        }
    }

    public static function delete(string $path)
    {
        return unlink(ltrim($path, '/'));
    }
}
