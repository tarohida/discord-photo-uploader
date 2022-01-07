<?php
/** @noinspection NonAsciiCharacters */
/** @noinspection PhpUnhandledExceptionInspection */
/** @noinspection PhpDocMissingThrowsInspection */
/** @noinspection PhpPrivateFieldCanBeLocalVariableInspection */
declare(strict_types=1);

namespace Tests\Domain\DiscordImage;

use App\Domain\DiscordImage\DiscordImage;

use App\Infrastructure\ImageDownloadClient\ImageDownloadClientInterface;
use PHPUnit\Framework\TestCase;

class DiscordImageTest extends TestCase
{
    public function test_method_fetchImage_with_mock()
    {
        $url = 'https://example.example';
        $expected_image = 'this is image byte string';
        $client_mock = $this->createMock(ImageDownloadClientInterface::class);
        $client_mock->expects(self::once())
            ->method('fetchImage')
            ->with($url)
            ->willReturn($expected_image);
        $image = new DiscordImage($url);
        self::assertSame($expected_image, $image->fetchImage($client_mock));
    }

}
