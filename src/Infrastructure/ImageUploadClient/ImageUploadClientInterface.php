<?php
declare(strict_types=1);

namespace App\Infrastructure\ImageUploadClient;

interface ImageUploadClientInterface
{
    public function upload(string $image): void;
}