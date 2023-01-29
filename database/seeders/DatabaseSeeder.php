<?php

namespace Database\Seeders;

use Database\Factories\Domain\Catalog\Models\BrandFactory;
use Database\Factories\Domain\Catalog\Models\CategoryFactory;
use Database\Factories\OptionFactory;
use Database\Factories\OptionValueFactory;
use Database\Factories\ProductFactory;
use Database\Factories\PropertyFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        BrandFactory::new()->count(30)->create();

        $properties = PropertyFactory::new()->count(10)->create();

        OptionFactory::new()->count(3)->create();

        $optionValues = OptionValueFactory::new()->count(10)->create();

        CategoryFactory::new()->count(20)
            ->has(
                ProductFactory::new()->count(rand(10, 25))
                    ->hasAttached($optionValues)
                    ->hasAttached($properties, function () {
                        return ['value' => ucfirst(fake()->word())];
                    })
            )
            ->create();
    }
}
