<?php
declare(strict_types=1);

namespace App\Domain\DiscordImage;

use JetBrains\PhpStorm\Pure;

/**
 * 単体テストなし
 */
class DiscordImageDao
{
    public function getBytes(): string
    {
        return $this->bytes_of_image;
    }

    #[Pure] public function equals(self $dao): bool
    {
        return $this->getBytes() === $dao->getBytes();
    }

    public function __construct(
        private string $bytes_of_image
    )
    {
    }
}