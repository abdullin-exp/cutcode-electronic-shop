<?php

namespace Database\Seeders;

use Database\Factories\Domain\Catalog\Models\BrandFactory;
use Database\Factories\Domain\Catalog\Models\CategoryFactory;
use Database\Factories\ProductFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        BrandFactory::new()->count(20)->create();

        CategoryFactory::new()->count(10)
            ->has(ProductFactory::new()->count(rand(5, 15)))
            ->create();
    }
}
