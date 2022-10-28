<?php

namespace App\Providers;

use Faker\Provider\Base;

class FakerImageProvider extends Base
{
    public function thumbnail(string $dir): string {
        $testImagesPath = base_path('tests/Fixtures/images/' . $dir);
        if (!file_exists($testImagesPath)) return '';

        $testImages = scandir($testImagesPath);
        $testImages = array_diff($testImages, ['..', '.']);
        $testImages = array_values($testImages);

        $testImageKey = rand(0, count($testImages) - 1);
        $randomTestImage = $testImages[$testImageKey];
        $randomTestImagePath = $testImagesPath . '/' . $randomTestImage;
        $fakeImagePath = base_path('storage/app/public/images/' . $dir);

        if (!file_exists($fakeImagePath)) {
            mkdir($fakeImagePath, 0777, true);
        }

        $randomFakeImagePath = $fakeImagePath . '/' . $randomTestImage;

        copy($randomTestImagePath, $randomFakeImagePath);

        return '/storage/images/' . $dir . '/' . $randomTestImage;
    }
}
