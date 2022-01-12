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
        return $this->bytes_of_image === $dao->bytes_of_image;
    }

    public function __construct(
        private string $bytes_of_image
    )
    {
    }
}