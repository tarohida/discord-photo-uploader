<?php
/** @noinspection NonAsciiCharacters */
/** @noinspection PhpUnhandledExceptionInspection */
/** @noinspection PhpDocMissingThrowsInspection */
/** @noinspection PhpPrivateFieldCanBeLocalVariableInspection */
declare(strict_types=1);

namespace Tests\Domain\UploadImageTask;

use App\Domain\UploadImageTask\UploadImageTask;

use PHPUnit\Framework\TestCase;

class UploadImageTaskTest extends TestCase
{
    public function test_method_equals()
    {
        $task1 = new UploadImageTask(1);
        $task2 = new UploadImageTask(2);
        $task3 = new UploadImageTask(1);
        self::assertObjectEquals($task1, $task3);
        self::assertFalse($task1->equals($task2));
    }
}
