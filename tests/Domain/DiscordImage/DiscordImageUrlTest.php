<?php
/** @noinspection NonAsciiCharacters */
/** @noinspection PhpUnhandledExceptionInspection */
/** @noinspection PhpDocMissingThrowsInspection */
/** @noinspection PhpPrivateFieldCanBeLocalVariableInspection */
declare(strict_types=1);

namespace Tests\Domain\DiscordImage;

use App\Domain\DiscordImage\DiscordImageUrl;

use App\Domain\DiscordImage\DiscordImageUrlDao;
use App\Infrastructure\ImageDownloadClient\ImageDownloadClientInterface;
use PHPUnit\Framework\TestCase;

class DiscordImageUrlTest extends TestCase
{
    public function test_method_fetchImage_with_mock_call_expected_arg_and_return_image()
    {
        $url = 'https://example.example';
        $expected_image = 'this is image byte string';
        $client_mock = $this->getClientMockExpectCallFetchImageWithUrlWillReturnImage($url, $expected_image);
        $image = new DiscordImageUrl($url);
        self::assertSame($expected_image, $image->fetchImage($client_mock));
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
        $client_mock->expects(self::once())
            ->method('fetchImage')
            ->with(
                $this->objectEquals($dao)
            )
            ->willReturn($expected_image);
        return $client_mock;
    }
}
