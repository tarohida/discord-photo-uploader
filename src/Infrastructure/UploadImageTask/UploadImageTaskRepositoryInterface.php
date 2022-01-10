<?php
declare(strict_types=1);

namespace App\Infrastructure\UploadImageTask;

use App\Domain\UploadImageTask\UploadImageTask;
use App\Domain\UploadImageTask\UploadImageTaskDao;

interface UploadImageTaskRepositoryInterface
{
    public function save(UploadImageTaskDao $dao): void;
    public function delete(UploadImageTask $param): void;
}