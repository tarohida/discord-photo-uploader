<?php
declare(strict_types=1);

namespace App\Infrastructure\ImageUploadClient;

use App\Domain\DiscordImage\DiscordImageDao;

interface ImageUploadClientInterface
{
    public function upload(DiscordImageDao $image): void;
}