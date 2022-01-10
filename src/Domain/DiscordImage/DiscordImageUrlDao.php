<?php
declare(strict_types=1);

namespace App\Domain\DiscordImage;

use JetBrains\PhpStorm\Pure;

class DiscordImageUrlDao
{
    public function __construct(
        private string $url
    )
    {
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    #[Pure] public function equals(self $image): bool
    {
        return $this->getUrl() === $image->getUrl();
    }
}