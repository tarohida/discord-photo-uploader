<?php
declare(strict_types=1);

namespace App\Domain\DiscordImage;

use JetBrains\PhpStorm\Pure;

/**
 * 単体テストなし
 */
class DiscordImageDao
{
    public function getUrl(): string
    {
        return $this->url;
    }

    #[Pure] public function equals(self $dao): bool
    {
        return $this->getUrl() === $dao->getUrl();
    }

    public function __construct(
        private string $url
    )
    {
    }
}