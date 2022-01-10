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
use Tests\AppTestCase;

class UploadImageTaskTest extends AppTestCase
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
        $repository = $this->createRepositoryMockExpectCallMethodSaveWithDao($id, $url);
        $task->saveTo($repository);
    }

    public function test_method_run()
    {
        $expected_image = 'this is expected image in upload image task test';
        $url = 'https://example.example';
        $discord_url = new DiscordImageUrl($url);
        $upload_client = $this->createUploadClientMockExpectCallMethodUploadWithExpectedImage($expected_image);
        $download_client = $this->getClientMockExpectCallFetchImageWithUrlWillReturnImage($url, $expected_image);
        $task = new UploadImageTask(1, $discord_url);
        $repository = $this->createUpdateImageTaskRepositoryMockExpectCallMethodDeleteWithExpectedTask($task);
        $task->run($upload_client, $download_client, $repository);
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

    /**
     * @param int $id
     * @param string $url
     * @return UploadImageTaskRepositoryInterface
     */
    protected function createRepositoryMockExpectCallMethodSaveWithDao(int $id, string $url): UploadImageTaskRepositoryInterface
    {
        $dao = new UploadImageTaskDao($id, $url);
        $repository = $this->createMock(UploadImageTaskRepositoryInterface::class);
        $repository->expects(self::once())
            ->method('save')
            ->with(
                $this->objectEquals($dao)
            );
        return $repository;
    }

    /**
     * @param UploadImageTask $expected_task
     * @return UploadImageTaskRepositoryInterface
     */
    protected function createUpdateImageTaskRepositoryMockExpectCallMethodDeleteWithExpectedTask(UploadImageTask $expected_task): UploadImageTaskRepositoryInterface
    {
        $repository = $this->createMock(UploadImageTaskRepositoryInterface::class);
        $repository->expects(self::once())
            ->method('delete')
            ->with($expected_task);
        return $repository;
    }
}
