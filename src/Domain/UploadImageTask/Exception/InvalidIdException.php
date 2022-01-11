<?php
declare(strict_types=1);

namespace App\Domain\UploadImageTask\Exception;

use App\Exception\ApplicationException;

class InvalidIdException extends ApplicationException
{
}