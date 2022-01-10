<?php
/** @noinspection NonAsciiCharacters */
/** @noinspection PhpUnhandledExceptionInspection */
/** @noinspection PhpDocMissingThrowsInspection */
/** @noinspection PhpPrivateFieldCanBeLocalVariableInspection */
declare(strict_types=1);

namespace Tests\Domain\UploadImageTask;

use App\Domain\DiscordImage\DiscordImageUrl;
use App\Domain\UploadImageTask\Exception\InvalidIdException;
use App\Domain\UploadImageTask\UploadImageTask;

use App\Domain\UploadImageTask\UploadImageTaskDao;
use App\Infrastructure\UploadImageTask\UploadImageTaskRepositoryInterface;
use PHPUnit\Framework\TestCase;

class UploadImageTaskTest extends TestCase
{
    public function test_method_equals()
    {
        $task1 = $this->createTaskInstance(1);
        $task2 = $this->createTaskInstance(2);
        $task3 = $this->createTaskInstance(1);
        self::assertObjectEquals($task1, $task3);
        self::assertFalse($task1->equals($task2));
    }

    public function test_method_save()
    {
        $id = 1;
        $url = 'http://example.example';
        $discordImageUrl = new DiscordImageUrl($url);
        $task = new UploadImageTask($id, $discordImageUrl);
        $dao = new UploadImageTaskDao($id, $url);
        $repository = $this->createMock(UploadImageTaskRepositoryInterface::class);
        $repository->expects(self::once())
            ->method('save')
            ->with(
                $this->objectEquals($dao)
            );
        $task->saveTo($repository);
    }

    /**
     * @param int $id
     * @param string $url
     * @return UploadImageTask
     * @throws InvalidIdException
     */
    protected function createTaskInstance(int $id, string $url='http://example.example'): UploadImageTask
    {
        $discord_image_url = new DiscordImageUrl($url);
        return new UploadImageTask($id, $discord_image_url);
    }
}
