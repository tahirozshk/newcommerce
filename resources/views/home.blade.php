@extends('layouts.app')

@section('title', 'CYPRUS EXPRESS - Home')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-r from-[#FF6B35] via-[#FF8FA3] to-[#FF6B35] py-16 md:py-24 overflow-hidden">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                <!-- Content -->
                <div class="text-white space-y-6 z-10">
                    <span class="inline-block px-4 py-2 bg-white/20 rounded-full text-sm font-medium backdrop-blur-sm">
                        New Arrival
                    </span>
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight">
                        Latest Tech Gadgets
                    </h1>
                    <p class="text-lg md:text-xl text-white/90 max-w-lg">
                        Shop the newest electronics and gadgets. Free shipping on orders over $50.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a href="#featured" class="px-8 py-3 bg-white text-[#FF6B35] font-semibold rounded-lg hover:bg-gray-100 transition-colors">
                            Shop Now
                        </a>
                        <a href="#categories" class="px-8 py-3 bg-white/20 text-white font-semibold rounded-lg hover:bg-white/30 transition-colors backdrop-blur-sm">
                            Learn More
                        </a>
                    </div>
                </div>

                <!-- Image -->
                <div class="relative z-10">
                    <div class="relative">
                        <img 
                            src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=800&h=600&fit=crop" 
                            alt="Tech Gadgets"
                            class="rounded-2xl shadow-2xl"
                        >
                        <div class="absolute -bottom-4 -right-4 w-24 h-24 bg-[#FFD93D] rounded-full opacity-20 blur-2xl"></div>
                        <div class="absolute -top-4 -left-4 w-32 h-32 bg-[#4A90E2] rounded-full opacity-20 blur-2xl"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Carousel Dots -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 flex gap-2 z-10">
            <button class="w-2 h-2 rounded-full bg-white"></button>
            <button class="w-2 h-2 rounded-full bg-white/50"></button>
            <button class="w-2 h-2 rounded-full bg-white/50"></button>
        </div>
    </section>

    <!-- Shop By Category -->
    <section id="categories" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Shop By Category</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                @php
                    $categories = [
                        ['name' => 'Electronics', 'icon' => 'headphones'],
                        ['name' => 'Fashion', 'icon' => 'shirt'],
                        ['name' => 'Home & Living', 'icon' => 'home'],
                        ['name' => 'Sports', 'icon' => 'dumbbell'],
                        ['name' => 'Beauty', 'icon' => 'lipstick'],
                        ['name' => 'Toys & Games', 'icon' => 'gamepad'],
                    ];
                @endphp

                @foreach($categories as $category)
                    <a href="#" class="group bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition-all duration-300 text-center border border-gray-100 hover:border-[#FF6B35]">
                        <div class="w-16 h-16 mx-auto mb-4 bg-gradient-to-br from-[#FF6B35] to-[#FF8FA3] rounded-full flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            @if($category['icon'] === 'headphones')
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/>
                                </svg>
                            @elseif($category['icon'] === 'shirt')
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            @elseif($category['icon'] === 'home')
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                                </svg>
                            @elseif($category['icon'] === 'dumbbell')
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                </svg>
                            @elseif($category['icon'] === 'lipstick')
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/>
                                </svg>
                            @else
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            @endif
                        </div>
                        <h3 class="font-semibold text-gray-900 group-hover:text-[#FF6B35] transition-colors">{{ $category['name'] }}</h3>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Featured Products -->
    <section id="featured" class="py-16">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-3xl font-bold text-gray-900">Featured Products</h2>
                <a href="#" class="text-[#FF6B35] font-semibold hover:underline">View All</a>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @php
                    $featuredProducts = [
                        ['name' => 'Premium Wireless Headphones', 'price' => 299.99, 'rating' => 4.8, 'reviews' => 124, 'category' => 'Electronics', 'badge' => 'Best Seller', 'image' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=300&h=300&fit=crop'],
                        ['name' => 'Ultra Slim Laptop Pro', 'price' => 1299.99, 'rating' => 4.9, 'reviews' => 89, 'category' => 'Electronics', 'badge' => 'Hot Deal', 'discount' => 25, 'image' => 'https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=300&h=300&fit=crop'],
                        ['name' => 'Smart Watch Series X', 'price' => 399.99, 'rating' => 4.7, 'reviews' => 256, 'category' => 'Electronics', 'badge' => 'New Arrival', 'image' => 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=300&h=300&fit=crop'],
                        ['name' => 'Professional Camera Kit', 'price' => 899.99, 'rating' => 4.5, 'reviews' => 67, 'category' => 'Electronics', 'badge' => 'Limited Edition', 'discount' => 17, 'image' => 'https://images.unsplash.com/photo-1516035069371-86a097c516cf?w=300&h=300&fit=crop'],
                        ['name' => 'Performance Running Shoes', 'price' => 129.99, 'rating' => 4.6, 'reviews' => 198, 'category' => 'Sports', 'badge' => 'Best Seller', 'image' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=300&h=300&fit=crop'],
                        ['name' => 'Urban Travel Backpack', 'price' => 79.99, 'rating' => 4.4, 'reviews' => 145, 'category' => 'Fashion', 'badge' => 'Hot Deal', 'discount' => 20, 'image' => 'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?w=300&h=300&fit=crop'],
                        ['name' => 'Designer Sunglasses', 'price' => 159.99, 'rating' => 4.7, 'reviews' => 92, 'category' => 'Fashion', 'badge' => 'New Arrival', 'image' => 'https://images.unsplash.com/photo-1572635196237-14b3f281503f?w=300&h=300&fit=crop'],
                        ['name' => 'Flagship Smartphone', 'price' => 999.99, 'rating' => 4.9, 'reviews' => 312, 'category' => 'Electronics', 'badge' => 'Best Seller', 'discount' => 10, 'image' => 'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?w=300&h=300&fit=crop'],
                    ];
                @endphp

                @foreach($featuredProducts as $product)
                    <x-product-card :product="$product" />
                @endforeach
            </div>
        </div>
    </section>

    <!-- Deals of the Day -->
    <section id="deals" class="py-16 bg-gradient-to-r from-[#FF6B35] via-[#FF8FA3] to-[#FF6B35]">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                <!-- Content -->
                <div class="text-white space-y-6">
                    <div class="flex items-center gap-2">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-lg font-semibold">Deal of the Day</span>
                    </div>
                    <h2 class="text-4xl md:text-5xl font-bold">
                        Limited time offers on selected products. Don't miss out!
                    </h2>
                    <div id="countdown" class="flex gap-4 text-2xl font-bold">
                        <div class="bg-white/20 backdrop-blur-sm px-4 py-2 rounded-lg">
                            <span id="hours">12</span>h
                        </div>
                        <div class="bg-white/20 backdrop-blur-sm px-4 py-2 rounded-lg">
                            <span id="minutes">34</span>m
                        </div>
                        <div class="bg-white/20 backdrop-blur-sm px-4 py-2 rounded-lg">
                            <span id="seconds">56</span>s
                        </div>
                    </div>
                </div>

                <!-- Discount Boxes -->
                <div class="grid grid-cols-3 gap-4">
                    <div class="bg-white/10 backdrop-blur-sm p-6 rounded-lg text-center border border-white/20">
                        <div class="text-5xl font-bold text-white mb-2">50%</div>
                        <div class="text-white/90 text-sm">Electronics</div>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm p-6 rounded-lg text-center border border-white/20">
                        <div class="text-5xl font-bold text-white mb-2">40%</div>
                        <div class="text-white/90 text-sm">Fashion</div>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm p-6 rounded-lg text-center border border-white/20">
                        <div class="text-5xl font-bold text-white mb-2">30%</div>
                        <div class="text-white/90 text-sm">Home</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Hot Deals -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-3xl font-bold text-gray-900">Hot Deals</h2>
                <a href="#" class="text-[#FF6B35] font-semibold hover:underline">View All</a>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @php
                    $hotDeals = [
                        ['name' => 'Premium Wireless Headphones', 'price' => 299.99, 'rating' => 4.8, 'reviews' => 124, 'category' => 'Electronics', 'badge' => 'Best Seller', 'image' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=300&h=300&fit=crop'],
                        ['name' => 'Ultra Slim Laptop Pro', 'price' => 1299.99, 'original_price' => 1733.32, 'rating' => 4.9, 'reviews' => 89, 'category' => 'Electronics', 'badge' => 'Hot Deal', 'discount' => 25, 'image' => 'https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=300&h=300&fit=crop'],
                        ['name' => 'Professional Camera Kit', 'price' => 899.99, 'rating' => 4.5, 'reviews' => 67, 'category' => 'Electronics', 'badge' => 'Limited Edition', 'discount' => 17, 'image' => 'https://images.unsplash.com/photo-1516035069371-86a097c516cf?w=300&h=300&fit=crop'],
                        ['name' => 'Performance Running Shoes', 'price' => 129.99, 'rating' => 4.6, 'reviews' => 198, 'category' => 'Sports', 'badge' => 'Best Seller', 'image' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=300&h=300&fit=crop'],
                    ];
                @endphp

                @foreach($hotDeals as $product)
                    <x-product-card :product="$product" />
                @endforeach
            </div>
        </div>
    </section>

    <!-- New Arrivals -->
    <section id="new-arrivals" class="py-16">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-3xl font-bold text-gray-900">New Arrivals</h2>
                <a href="#" class="text-[#FF6B35] font-semibold hover:underline">View All</a>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @php
                    $newArrivals = [
                        ['name' => 'Gaming Console Pro', 'price' => 499.99, 'rating' => 4.8, 'reviews' => 156, 'category' => 'Electronics', 'badge' => 'New Arrival', 'image' => 'https://images.unsplash.com/photo-1606144042614-b2417e99c4e3?w=300&h=300&fit=crop'],
                        ['name' => 'Modern Indoor Plant Set', 'price' => 49.99, 'rating' => 4.4, 'reviews' => 78, 'category' => 'Home & Living', 'badge' => 'New Arrival', 'image' => 'https://images.unsplash.com/photo-1416879595882-3373a0480b5b?w=300&h=300&fit=crop'],
                        ['name' => 'Adjustable Dumbbell Set', 'price' => 199.99, 'original_price' => 229.00, 'rating' => 4.8, 'reviews' => 203, 'category' => 'Sports', 'badge' => 'New Arrival', 'discount' => 15, 'image' => 'https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=300&h=300&fit=crop'],
                        ['name' => 'Smart Coffee Maker', 'price' => 149.99, 'rating' => 4.6, 'reviews' => 134, 'category' => 'Home & Living', 'badge' => 'New Arrival', 'image' => 'https://images.unsplash.com/photo-1517487881594-2787fef5ebf7?w=300&h=300&fit=crop'],
                    ];
                @endphp

                @foreach($newArrivals as $product)
                    <x-product-card :product="$product" />
                @endforeach
            </div>
        </div>
    </section>
@endsection


