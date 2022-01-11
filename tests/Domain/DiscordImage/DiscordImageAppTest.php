<?php
/** @noinspection NonAsciiCharacters */
/** @noinspection PhpUnhandledExceptionInspection */
/** @noinspection PhpDocMissingThrowsInspection */
/** @noinspection PhpPrivateFieldCanBeLocalVariableInspection */
declare(strict_types=1);

namespace Tests\Domain\DiscordImage;

use App\Domain\DiscordImage\DiscordImage;

use Tests\AppTestCase;

class DiscordImageAppTest extends AppTestCase
{
    public function test_method_upload_with_mocked_client()
    {
        $expected_image = 'image byte string';
        $client = $this->createImageStorageMockExpectCallMethodUploadWithExpectedImage($expected_image);
        $image = new DiscordImage($expected_image);
        $image->uploadTo($client);
    }
}
