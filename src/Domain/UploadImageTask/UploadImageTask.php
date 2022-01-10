<?php
declare(strict_types=1);

namespace App\Domain\UploadImageTask;

use App\Domain\DiscordImage\DiscordImageUrl;
use App\Domain\UploadImageTask\Exception\InvalidIdException;
use App\Infrastructure\ImageDownloadClientInterface;
use App\Infrastructure\ImageStorageInterface;

class UploadImageTask
{
    private int $id;

    /**
     * @throws InvalidIdException
     */
    public function __construct(int $id, private DiscordImageUrl $url)
    {
        if ($id <= 0) {
            throw new InvalidIdException();
        }
        $this->id = $id;
    }

    public function equals(self $task): bool
    {
        return $this->id === $task->id;
    }

    public function saveTo(UploadImageTaskRepositoryInterface $repository)
    {
        $url = $this->url->getDao()->getUrl();
        $dao = new UploadImageTaskDao($this->id, $url);
        $repository->save($dao);
    }

    public function run(ImageStorageInterface $image_storage, ImageDownloadClientInterface $download_client, UploadImageTaskRepositoryInterface $repository)
    {
        $image = $this->url->fetchImage($download_client);
        $image->uploadTo($image_storage);
        $repository->delete($this);
    }
}