<?php
declare(strict_types=1);

namespace App\Domain\DiscordImage;

use App\Domain\DiscordImage\Exception\UrlValidateException;
use App\Infrastructure\ImageDownloadClient\ImageDownloadClientInterface;

class DiscordImageUrl
{
    private string $url;

    /**
     * @throws UrlValidateException
     */
    public function __construct(string $url)
    {
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            throw new UrlValidateException();
        }
        $this->url = $url;
    }

    public function fetchImage(ImageDownloadClientInterface $client): string
    {
        return $client->fetchImage($this->url);
    }
}