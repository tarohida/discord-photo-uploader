<?php
declare(strict_types=1);

namespace App\Domain\UploadImageTask;

use App\Domain\UploadImageTask\Exception\InvalidIdException;

class UploadImageTask
{
    private int $id;

    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @throws InvalidIdException
     */
    public function __construct(int $id)
    {
        if ($id <= 0) {
            throw new InvalidIdException();
        }
        $this->id = $id;
    }
}