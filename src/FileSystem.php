<?php

namespace MockSharing;
class FileSystem
{
    private $s3Service;

    public function __construct($s3Service)
    {
        $this->s3Service = $s3Service;
    }

    public function upload(): bool
    {
        $status = $this->s3Service->upload();

        if ($status === 200) {
            return true;
        }

        return false;
    }
}