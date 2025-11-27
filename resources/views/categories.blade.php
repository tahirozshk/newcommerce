@extends('layouts.app')

@section('title', 'Categories - CYPRUS EXPRESS')

@section('content')
    <!-- Page Header -->
    <section class="bg-gradient-to-r from-[#FF6B35] via-[#FF8FA3] to-[#FF6B35] py-12">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl font-bold text-white mb-2">Shop By Category</h1>
            <p class="text-white/90">Browse our wide range of product categories</p>
        </div>
    </section>

    <!-- Categories Grid -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
                @php
                    $categories = [
                        ['name' => 'Electronics', 'icon' => 'headphones', 'count' => 245, 'image' => 'https://images.unsplash.com/photo-1498049794561-7780e7231661?w=400&h=300&fit=crop'],
                        ['name' => 'Fashion', 'icon' => 'shirt', 'count' => 189, 'image' => 'https://images.unsplash.com/photo-1441986300917-64674bd600d8?w=400&h=300&fit=crop'],
                        ['name' => 'Home & Living', 'icon' => 'home', 'count' => 156, 'image' => 'https://images.unsplash.com/photo-1586023492125-27b2c045efd7?w=400&h=300&fit=crop'],
                        ['name' => 'Sports', 'icon' => 'dumbbell', 'count' => 98, 'image' => 'https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=400&h=300&fit=crop'],
                        ['name' => 'Beauty', 'icon' => 'lipstick', 'count' => 134, 'image' => 'https://images.unsplash.com/photo-1596462502278-27bfdc403348?w=400&h=300&fit=crop'],
                        ['name' => 'Toys & Games', 'icon' => 'gamepad', 'count' => 87, 'image' => 'https://images.unsplash.com/photo-1606144042614-b2417e99c4e3?w=400&h=300&fit=crop'],
                    ];
                @endphp

                @foreach($categories as $category)
                    <a href="#" class="group bg-white rounded-lg shadow-sm hover:shadow-lg transition-all duration-300 overflow-hidden border border-gray-100">
                        <div class="relative aspect-square overflow-hidden bg-gray-100">
                            <img 
                                src="{{ $category['image'] }}" 
                                alt="{{ $category['name'] }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
                            >
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <h3 class="text-2xl font-bold text-white text-center px-4 drop-shadow-lg">
                                    {{ $category['name'] }}
                                </h3>
                            </div>
                            <div class="absolute bottom-0 left-0 right-0 p-4 text-white">
                                <p class="text-sm text-white/90 text-center">{{ $category['count'] }} Products</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Featured Products by Category -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-gray-900 mb-8">Popular Products</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @php
                    $popularProducts = [
                        ['name' => 'Premium Wireless Headphones', 'price' => 299.99, 'rating' => 4.8, 'reviews' => 124, 'category' => 'Electronics', 'badge' => 'Best Seller', 'image' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=300&h=300&fit=crop'],
                        ['name' => 'Ultra Slim Laptop Pro', 'price' => 1299.99, 'rating' => 4.9, 'reviews' => 89, 'category' => 'Electronics', 'badge' => 'Hot Deal', 'discount' => 25, 'image' => 'https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=300&h=300&fit=crop'],
                        ['name' => 'Smart Watch Series X', 'price' => 399.99, 'rating' => 4.7, 'reviews' => 256, 'category' => 'Electronics', 'badge' => 'New Arrival', 'image' => 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=300&h=300&fit=crop'],
                        ['name' => 'Professional Camera Kit', 'price' => 899.99, 'rating' => 4.5, 'reviews' => 67, 'category' => 'Electronics', 'badge' => 'Limited Edition', 'discount' => 17, 'image' => 'https://images.unsplash.com/photo-1516035069371-86a097c516cf?w=300&h=300&fit=crop'],
                    ];
                @endphp

                @foreach($popularProducts as $product)
                    <x-product-card :product="$product" />
                @endforeach
            </div>
        </div>
    </section>
@endsection

