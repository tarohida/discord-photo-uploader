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
    public function test_method_getId()
    {
        $expected_id = 1;
        $task = new UploadImageTask($expected_id);
        self::assertSame($expected_id, $task->getId());
    }
}
