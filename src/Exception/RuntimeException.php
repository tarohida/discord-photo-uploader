<?php
declare(strict_types=1);

namespace App\Exception;

abstract class RuntimeException extends \RuntimeException implements ApplicationExceptionInterface
{
    protected mixed $debug_params;

    public function getLoggingMessage(): string
    {
        if (is_null($this->debug_params)) {
            return 'debug param not set';
        }
        return print_r($this->debug_params, true);
    }
}