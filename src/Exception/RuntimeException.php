<?php
declare(strict_types=1);

namespace App\Exception;

abstract class RuntimeException extends \TaroHida\ApplicationExceptions\RuntimeException implements ApplicationExceptionInterface
{
}