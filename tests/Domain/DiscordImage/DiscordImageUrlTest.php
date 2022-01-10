<?php
/** @noinspection NonAsciiCharacters */
/** @noinspection PhpUnhandledExceptionInspection */
/** @noinspection PhpDocMissingThrowsInspection */
/** @noinspection PhpPrivateFieldCanBeLocalVariableInspection */
declare(strict_types=1);

namespace Tests\Domain\DiscordImage;

use App\Domain\DiscordImage\DiscordImage;
use App\Domain\DiscordImage\DiscordImageUrl;

use Tests\AppTestCase;

class DiscordImageUrlTest extends AppTestCase
{
    public function test_method_fetchImage_with_mock_call_expected_arg_and_return_image()
    {
        $url = 'https://example.example';
        $expected_image = 'this is image byte string';
        $client_mock = $this->createDownloadClientMockExpectCallMethodFetchImageWithUrlAndReturnImage($url, $expected_image);
        $image = new DiscordImageUrl($url);
        self::assertObjectEquals(new DiscordImage($expected_image), $image->fetchImage($client_mock));
    }
}
