<?php
declare(strict_types=1);

namespace App\Infrastructure\ImageDownloadClient;

interface ImageDownloadClientInterface
{
    public function fetchImage(string $url): string;
}