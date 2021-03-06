<?php
declare(strict_types=1);

namespace App\Infrastructure;

use App\Domain\DiscordImage\DiscordImage;
use App\Domain\DiscordImage\DiscordImageUrlDao;

interface ImageDownloadClientInterface
{
    public function fetchImage(DiscordImageUrlDao $url): DiscordImage;
}