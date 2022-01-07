<?php
/** @noinspection NonAsciiCharacters */
/** @noinspection PhpUnhandledExceptionInspection */
/** @noinspection PhpDocMissingThrowsInspection */
/** @noinspection PhpPrivateFieldCanBeLocalVariableInspection */
declare(strict_types=1);

namespace Tests\Domain\DiscordImage;

use App\Domain\DiscordImage\DiscordImage;

use App\Infrastructure\ImageUploadClient\ImageUploadClientInterface;
use PHPUnit\Framework\TestCase;

class DiscordImageTest extends TestCase
{
    public function test_method_upload_with_mocked_client()
    {
        $expected_image = 'image byte string';
        $client = $this->createMock(ImageUploadClientInterface::class);
        $client->expects(self::once())
            ->method('upload')
            ->with($expected_image);
        $image = new DiscordImage($expected_image);
        $image->upload($client);
    }
}
