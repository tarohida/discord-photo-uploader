<?php
declare(strict_types=1);

namespace App\Infrastructure;

use App\Domain\DiscordImage\DiscordImageDao;

interface ImageStorageInterface
{
    public function upload(DiscordImageDao $image): void;
}