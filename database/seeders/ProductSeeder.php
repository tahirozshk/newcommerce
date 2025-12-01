<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $electronics = Category::where('slug', 'electronics')->first();
        $fashion = Category::where('slug', 'fashion')->first();
        $sports = Category::where('slug', 'sports')->first();
        $home = Category::where('slug', 'home-living')->first();

        $products = [
            [
                'category' => $electronics,
                'name' => 'Premium Wireless Headphones',
                'price' => 299.99,
                'original_price' => 399.99,
                'rating' => 4.8,
                'reviews_count' => 124,
                'badge' => 'Best Seller',
                'discount' => 25,
                'is_featured' => true,
                'is_hot_deal' => true,
                'is_new_arrival' => false,
                'features' => [
                    'Active Noise Cancellation',
                    '30-Hour Battery Life',
                    'Bluetooth 5.0',
                    'Comfortable Over-Ear Design',
                    'Premium Sound Quality',
                    'Quick Charge (5 min = 3 hours)'
                ],
                'images' => [
                    'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=800&h=800&fit=crop',
                    'https://images.unsplash.com/photo-1484704849700-f032a568e944?w=800&h=800&fit=crop',
                ],
            ],
            [
                'category' => $electronics,
                'name' => 'Ultra Slim Laptop Pro',
                'price' => 1299.99,
                'original_price' => 1733.32,
                'rating' => 4.9,
                'reviews_count' => 89,
                'badge' => 'Hot Deal',
                'discount' => 25,
                'is_featured' => true,
                'is_hot_deal' => true,
                'is_new_arrival' => false,
                'features' => [
                    'Intel Core i7 Processor',
                    '16GB RAM, 512GB SSD',
                    '14-inch Retina Display',
                    '12-Hour Battery Life',
                    'Thunderbolt 4 Ports',
                    'Lightweight Design (1.3kg)'
                ],
                'images' => [
                    'https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=800&h=800&fit=crop',
                ],
            ],
            [
                'category' => $electronics,
                'name' => 'Smart Watch Series X',
                'price' => 399.99,
                'original_price' => null,
                'rating' => 4.7,
                'reviews_count' => 256,
                'badge' => 'New Arrival',
                'discount' => null,
                'is_featured' => true,
                'is_hot_deal' => false,
                'is_new_arrival' => true,
                'features' => [
                    'Health & Fitness Tracking',
                    'Water Resistant (50m)',
                    'GPS & Heart Rate Monitor',
                    '5-Day Battery Life',
                    'Smart Notifications',
                    'Multiple Watch Faces'
                ],
                'images' => [
                    'https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=800&h=800&fit=crop',
                ],
            ],
            [
                'category' => $electronics,
                'name' => 'Professional Camera Kit',
                'price' => 899.99,
                'original_price' => null,
                'rating' => 4.5,
                'reviews_count' => 67,
                'badge' => 'Limited Edition',
                'discount' => 17,
                'is_featured' => true,
                'is_hot_deal' => true,
                'is_new_arrival' => false,
                'features' => [
                    '24MP Full-Frame Sensor',
                    '4K Video Recording',
                    '5-Axis Image Stabilization',
                    'Weather-Sealed Body',
                    'Fast Autofocus System',
                    'Included Lens & Accessories'
                ],
                'images' => [
                    'https://images.unsplash.com/photo-1516035069371-86a097c516cf?w=800&h=800&fit=crop',
                ],
            ],
            [
                'category' => $sports,
                'name' => 'Performance Running Shoes',
                'price' => 129.99,
                'original_price' => null,
                'rating' => 4.6,
                'reviews_count' => 198,
                'badge' => 'Best Seller',
                'discount' => null,
                'is_featured' => true,
                'is_hot_deal' => true,
                'is_new_arrival' => false,
                'images' => [
                    'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=800&h=800&fit=crop',
                ],
            ],
            [
                'category' => $fashion,
                'name' => 'Urban Travel Backpack',
                'price' => 79.99,
                'original_price' => null,
                'rating' => 4.4,
                'reviews_count' => 145,
                'badge' => 'Hot Deal',
                'discount' => 20,
                'is_featured' => true,
                'is_hot_deal' => true,
                'is_new_arrival' => false,
                'images' => [
                    'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?w=800&h=800&fit=crop',
                ],
            ],
            [
                'category' => $fashion,
                'name' => 'Designer Sunglasses',
                'price' => 159.99,
                'original_price' => null,
                'rating' => 4.7,
                'reviews_count' => 92,
                'badge' => 'New Arrival',
                'discount' => null,
                'is_featured' => true,
                'is_hot_deal' => false,
                'is_new_arrival' => true,
                'images' => [
                    'https://images.unsplash.com/photo-1572635196237-14b3f281503f?w=800&h=800&fit=crop',
                ],
            ],
            [
                'category' => $electronics,
                'name' => 'Flagship Smartphone',
                'price' => 999.99,
                'original_price' => null,
                'rating' => 4.9,
                'reviews_count' => 312,
                'badge' => 'Best Seller',
                'discount' => 10,
                'is_featured' => true,
                'is_hot_deal' => false,
                'is_new_arrival' => true,
                'images' => [
                    'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?w=800&h=800&fit=crop',
                ],
            ],
            [
                'category' => $electronics,
                'name' => 'Gaming Console Pro',
                'price' => 499.99,
                'original_price' => null,
                'rating' => 4.8,
                'reviews_count' => 156,
                'badge' => 'New Arrival',
                'discount' => null,
                'is_featured' => false,
                'is_hot_deal' => false,
                'is_new_arrival' => true,
                'images' => [
                    'https://images.unsplash.com/photo-1606144042614-b2417e99c4e3?w=800&h=800&fit=crop',
                ],
            ],
            [
                'category' => $home,
                'name' => 'Modern Indoor Plant Set',
                'price' => 49.99,
                'original_price' => null,
                'rating' => 4.4,
                'reviews_count' => 78,
                'badge' => 'New Arrival',
                'discount' => null,
                'is_featured' => false,
                'is_hot_deal' => false,
                'is_new_arrival' => true,
                'images' => [
                    'https://images.unsplash.com/photo-1416879595882-3373a0480b5b?w=800&h=800&fit=crop',
                ],
            ],
            [
                'category' => $sports,
                'name' => 'Adjustable Dumbbell Set',
                'price' => 199.99,
                'original_price' => 229.00,
                'rating' => 4.8,
                'reviews_count' => 203,
                'badge' => 'New Arrival',
                'discount' => 15,
                'is_featured' => false,
                'is_hot_deal' => false,
                'is_new_arrival' => true,
                'images' => [
                    'https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=800&h=800&fit=crop',
                ],
            ],
            [
                'category' => $home,
                'name' => 'Smart Coffee Maker',
                'price' => 149.99,
                'original_price' => null,
                'rating' => 4.6,
                'reviews_count' => 134,
                'badge' => 'New Arrival',
                'discount' => null,
                'is_featured' => false,
                'is_hot_deal' => false,
                'is_new_arrival' => true,
                'images' => [
                    'https://images.unsplash.com/photo-1517487881594-2787fef5ebf7?w=800&h=800&fit=crop',
                ],
            ],
        ];

        foreach ($products as $data) {
            $category = $data['category'];

            Product::updateOrCreate(
                ['slug' => Str::slug($data['name'])],
                [
                    'category_id' => $category?->id,
                    'name' => $data['name'],
                    'sku' => strtoupper(Str::random(8)),
                    'description' => $data['name'] . ' - demo product description.',
                    'features' => $data['features'] ?? null,
                    'price' => $data['price'],
                    'original_price' => $data['original_price'],
                    'stock' => 20,
                    'rating' => $data['rating'],
                    'reviews_count' => $data['reviews_count'],
                    'badge' => $data['badge'],
                    'discount' => $data['discount'],
                    'images' => $data['images'],
                    'is_featured' => $data['is_featured'],
                    'is_hot_deal' => $data['is_hot_deal'],
                    'is_new_arrival' => $data['is_new_arrival'],
                    'is_active' => true,
                ]
            );
        }
    }
}


