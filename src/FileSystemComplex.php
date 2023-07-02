<?php

namespace MockSharing;
class FileSystemComplex
{
    private S3Service $s3Service;

    private bool $permission;

    public function __construct($s3Service, bool $permission = true)
    {
        $this->s3Service = $s3Service;
        $this->permission = $permission;
    }

    public function upload(): bool
    {
        if (!$this->permission) {
            return false;
        }

        $status = $this->s3Service->upload();

        if ($status === 200) {
            return true;
        }

        return false;
    }
}