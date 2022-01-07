<?php
declare(strict_types=1);

namespace App\Domain\DiscordImage;

use App\Infrastructure\ImageDownloadClient\ImageDownloadClientInterface;

class DiscordImage
{
    private string $url;

    public function __construct(string $url)
    {
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            // todo: 例外を定義する
            throw new \RuntimeException();
        }
        $this->url = $url;
    }

    public function fetchImage(ImageDownloadClientInterface $client): string
    {
        return $client->fetchImage($this->url);
    }
}