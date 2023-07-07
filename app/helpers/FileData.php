<?php

namespace App\helpers;

class FileData
{

    public function __construct(
        public string $name,
        public string $path,
        public string $mimeType,
        public int $size)
    {

    }
}
