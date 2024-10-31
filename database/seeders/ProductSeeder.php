<?php

namespace Database\Seeders;

use App\Models\Products\Product;
use App\Models\Products\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $types = Type::factory()->count(5)->create();

        // Create 10 products
        $products = Product::factory()->count(10)->create();
        // Attach products to types (many-to-many)
        $types->each(function ($type) use ($products) {
            $type->products()->attach(
                $products->random(2)->pluck('id')->toArray() // Attach 2 random products to each type
            );
        });
    }
}
