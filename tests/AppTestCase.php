<?php
declare(strict_types=1);

namespace Tests;

use App\Domain\DiscordImage\DiscordImageDao;
use App\Domain\DiscordImage\DiscordImageUrlDao;
use App\Infrastructure\ImageDownloadClient\ImageDownloadClientInterface;
use App\Infrastructure\ImageUploadClient\ImageUploadClientInterface;
use PHPUnit\Framework\TestCase;
use Tests\Domain\DiscordImage\DiscordImageUrlTest;

class AppTestCase extends TestCase
{
    /**
     * @param string $expected_image
     * @return ImageUploadClientInterface
     */
    protected function createClientMockExpectUploadMethodWithExpectedImage(string $expected_image): ImageUploadClientInterface
    {
        $expected_dao = new DiscordImageDao($expected_image);
        $client = $this->createMock(ImageUploadClientInterface::class);
        $client->expects(TestCase::once())
            ->method('upload')
            ->with(
                $this->objectEquals($expected_dao)
            );
        return $client;
    }

    /**
     * @param string $url
     * @param string $expected_image
     * @return ImageDownloadClientInterface
     */
    protected function getClientMockExpectCallFetchImageWithUrlWillReturnImage(string $url, string $expected_image): ImageDownloadClientInterface
    {
        $dao = new DiscordImageUrlDao($url);
        $client_mock = $this->createMock(ImageDownloadClientInterface::class);
        $client_mock->expects(TestCase::once())
            ->method('fetchImage')
            ->with(
                $this->objectEquals($dao)
            )
            ->willReturn($expected_image);
        return $client_mock;
    }
}