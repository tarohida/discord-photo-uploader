<?php
declare(strict_types=1);

namespace App\Domain\DiscordImage;

use App\Domain\DiscordImage\Exception\UrlValidateException;
use App\Infrastructure\ImageDownloadClientInterface;
use JetBrains\PhpStorm\Pure;

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

    #[Pure] public function getDao(): DiscordImageUrlDao
    {
        return new DiscordImageUrlDao($this->url);
    }

    public function fetchImage(ImageDownloadClientInterface $client): DiscordImage
    {
        $dao = $this->getDao();
        return $client->fetchImage($dao);
    }
}