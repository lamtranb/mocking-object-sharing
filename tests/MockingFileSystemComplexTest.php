<?php

namespace MockSharing\Tests;

use PHPUnit\Framework\TestCase;

class MockingFileSystemComplexTest extends TestCase
{
    public function test_upload_file_to_s3_success(): void
    {
        $s3ServiceMock = $this->getMockBuilder(\MockSharing\S3Service::class)
            ->onlyMethods(['upload'])
            ->getMock();

        $s3ServiceMock->method('upload')->willReturn(200);

        $fileSystem = new \MockSharing\FileSystemComplex($s3ServiceMock);
        $this->assertTrue($fileSystem->upload());
    }

    public function test_upload_file_to_s3_success_fail(): void
    {
        $s3ServiceMock = $this->getMockBuilder(\MockSharing\S3Service::class)
            ->onlyMethods(['upload'])
            ->getMock();

        $s3ServiceMock->method('upload')->willReturn(404);

        $fileSystem = new \MockSharing\FileSystemComplex($s3ServiceMock);
        $this->assertFalse($fileSystem->upload());
    }

    public function test_upload_file_to_s3_success_without_permission(): void
    {
        $s3ServiceMock = $this->getMockBuilder(\MockSharing\S3Service::class)
            ->onlyMethods(['upload'])
            ->getMock();

        $s3ServiceMock->method('upload')->willReturn(200);

        $fileSystem = new \MockSharing\FileSystemComplex($s3ServiceMock);
        $this->assertTrue($fileSystem->upload());

        $fileSystem = new \MockSharing\FileSystemComplex($s3ServiceMock, false);
        $this->assertFalse($fileSystem->upload());
    }
}