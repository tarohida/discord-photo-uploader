<?php
declare(strict_types=1);

namespace App\Domain\UploadImageTask;

class UploadImageTaskDao
{
    public function __construct(
        private int $id,
        private string $url
    )
    {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function equals(self $dao): bool
    {
        return $this->id === $dao->id &&
            $this->url === $dao->url;
    }
}