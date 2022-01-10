<?php
declare(strict_types=1);

namespace Tests;

use App\Domain\DiscordImage\DiscordImageDao;
use App\Infrastructure\ImageUploadClient\ImageUploadClientInterface;
use PHPUnit\Framework\TestCase;

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
}