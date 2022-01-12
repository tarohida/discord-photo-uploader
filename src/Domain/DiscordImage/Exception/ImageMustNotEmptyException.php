<?php
declare(strict_types=1);

namespace App\Domain\DiscordImage\Exception;

use App\Exception\ApplicationException;

class ImageMustNotEmptyException extends ApplicationException
{
}