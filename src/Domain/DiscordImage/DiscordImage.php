<?php
declare(strict_types=1);

namespace App\Domain\DiscordImage;

use App\Domain\DiscordImage\Exception\ImageMustNotEmptyException;
use App\Infrastructure\ImageUploadClient\ImageUploadClientInterface;

class DiscordImage
{
    private string $image;

    /**
     * @throws ImageMustNotEmptyException
     */
    public function __construct(string $image)
    {
        $this->valid($image);
        $this->image = $image;
    }

    /**
     * @throws ImageMustNotEmptyException
     */
    private function valid(string $image)
    {
        if (empty($image)) {
            throw new ImageMustNotEmptyException();
        }
    }

    public function uploadTo(ImageUploadClientInterface $client)
    {
        $dao = new DiscordImageDao($this->image);
        $client->upload($dao);
    }

    public function equals(self $image): bool
    {
        return $this->image === $image->image;
    }
}