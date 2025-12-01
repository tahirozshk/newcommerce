<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Parent Categories (parent_id = null)
        $parentCategories = [
            ['name' => 'Electronics', 'icon' => 'headphones'],
            ['name' => 'Fashion', 'icon' => 'shirt'],
            ['name' => 'Home & Living', 'icon' => 'home'],
            ['name' => 'Sports', 'icon' => 'dumbbell'],
            ['name' => 'Beauty', 'icon' => 'lipstick'],
            ['name' => 'Toys & Games', 'icon' => 'gamepad'],
        ];

        $createdCategories = [];

        // Create parent categories
        foreach ($parentCategories as $category) {
            $created = Category::updateOrCreate(
                ['slug' => Str::slug($category['name'])],
                [
                    'name' => $category['name'],
                    'icon' => $category['icon'],
                    'parent_id' => null,
                ]
            );
            $createdCategories[$category['name']] = $created;
        }

        // Sub-categories (parent_id belirtilmiş)
        $subCategories = [
            // Electronics sub-categories
            ['name' => 'Computers', 'parent' => 'Electronics'],
            ['name' => 'Phones', 'parent' => 'Electronics'],
            ['name' => 'Audio', 'parent' => 'Electronics'],
            
            // Fashion sub-categories
            ['name' => 'Men\'s Clothing', 'parent' => 'Fashion'],
            ['name' => 'Women\'s Clothing', 'parent' => 'Fashion'],
            ['name' => 'Accessories', 'parent' => 'Fashion'],
            
            // Home & Living sub-categories
            ['name' => 'Furniture', 'parent' => 'Home & Living'],
            ['name' => 'Kitchen', 'parent' => 'Home & Living'],
            ['name' => 'Decor', 'parent' => 'Home & Living'],
            
            // Sports sub-categories
            ['name' => 'Fitness', 'parent' => 'Sports'],
            ['name' => 'Outdoor', 'parent' => 'Sports'],
            ['name' => 'Team Sports', 'parent' => 'Sports'],
        ];

        // Create sub-categories
        foreach ($subCategories as $subCategory) {
            if (isset($createdCategories[$subCategory['parent']])) {
                Category::updateOrCreate(
                    ['slug' => Str::slug($subCategory['name'])],
                    [
                        'name' => $subCategory['name'],
                        'parent_id' => $createdCategories[$subCategory['parent']]->id,
                    ]
                );
            }
        }

        // Sub-sub-categories (3. seviye - örnek)
        $subSubCategories = [
            // Computers sub-sub-categories
            ['name' => 'Laptops', 'parent' => 'Computers'],
            ['name' => 'Desktops', 'parent' => 'Computers'],
            ['name' => 'Tablets', 'parent' => 'Computers'],
            
            // Phones sub-sub-categories
            ['name' => 'Smartphones', 'parent' => 'Phones'],
            ['name' => 'Accessories', 'parent' => 'Phones'],
        ];

        // Create sub-sub-categories
        foreach ($subSubCategories as $subSubCategory) {
            $parentCategory = Category::where('name', $subSubCategory['parent'])->first();
            if ($parentCategory) {
                Category::updateOrCreate(
                    ['slug' => Str::slug($subSubCategory['name'])],
                    [
                        'name' => $subSubCategory['name'],
                        'parent_id' => $parentCategory->id,
                    ]
                );
            }
        }
    }
}


