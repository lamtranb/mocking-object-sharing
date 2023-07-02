<?php

namespace MockSharing;
class S3Service
{
    /**
     * Return 200, 301, 302, 303, 400, 422, 500 v.v...
     *
     * @return int
     */
    public function upload(): int
    {
        // Call to S3 service.
        // using real username + password of s3.
        return 200;
    }
}