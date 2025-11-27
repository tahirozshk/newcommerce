@extends('layouts.app')

@section('title', 'New Arrivals - CYPRUS EXPRESS')

@section('content')
    <!-- Page Header -->
    <section class="bg-gradient-to-r from-[#4A90E2] via-[#6BA3E8] to-[#4A90E2] py-12">
        <div class="container mx-auto px-4">
            <div class="flex items-center gap-2 mb-2">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                </svg>
                <h1 class="text-4xl font-bold text-white">New Arrivals</h1>
            </div>
            <p class="text-white/90">Discover the latest products just added to our collection</p>
        </div>
    </section>

    <!-- New Arrivals Products -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-3xl font-bold text-gray-900">Latest Products</h2>
                <div class="flex gap-2">
                    <button class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm font-medium hover:bg-gray-50">All</button>
                    <button class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm font-medium hover:bg-gray-50">This Week</button>
                    <button class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm font-medium hover:bg-gray-50">This Month</button>
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @php
                    $newArrivalsProducts = [
                        ['name' => 'Gaming Console Pro', 'price' => 499.99, 'rating' => 4.8, 'reviews' => 156, 'category' => 'Electronics', 'badge' => 'New Arrival', 'image' => 'https://images.unsplash.com/photo-1606144042614-b2417e99c4e3?w=300&h=300&fit=crop'],
                        ['name' => 'Modern Indoor Plant Set', 'price' => 49.99, 'rating' => 4.4, 'reviews' => 78, 'category' => 'Home & Living', 'badge' => 'New Arrival', 'image' => 'https://images.unsplash.com/photo-1416879595882-3373a0480b5b?w=300&h=300&fit=crop'],
                        ['name' => 'Adjustable Dumbbell Set', 'price' => 199.99, 'original_price' => 229.00, 'rating' => 4.8, 'reviews' => 203, 'category' => 'Sports', 'badge' => 'New Arrival', 'discount' => 15, 'image' => 'https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=300&h=300&fit=crop'],
                        ['name' => 'Smart Coffee Maker', 'price' => 149.99, 'rating' => 4.6, 'reviews' => 134, 'category' => 'Home & Living', 'badge' => 'New Arrival', 'image' => 'https://images.unsplash.com/photo-1517487881594-2787fef5ebf7?w=300&h=300&fit=crop'],
                        ['name' => 'Smart Watch Series X', 'price' => 399.99, 'rating' => 4.7, 'reviews' => 256, 'category' => 'Electronics', 'badge' => 'New Arrival', 'image' => 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=300&h=300&fit=crop'],
                        ['name' => 'Designer Sunglasses', 'price' => 159.99, 'rating' => 4.7, 'reviews' => 92, 'category' => 'Fashion', 'badge' => 'New Arrival', 'image' => 'https://images.unsplash.com/photo-1572635196237-14b3f281503f?w=300&h=300&fit=crop'],
                        ['name' => 'Wireless Earbuds Pro', 'price' => 179.99, 'rating' => 4.9, 'reviews' => 287, 'category' => 'Electronics', 'badge' => 'New Arrival', 'image' => 'https://images.unsplash.com/photo-1590658268037-6bf12165a8df?w=300&h=300&fit=crop'],
                        ['name' => 'Minimalist Desk Lamp', 'price' => 89.99, 'rating' => 4.5, 'reviews' => 112, 'category' => 'Home & Living', 'badge' => 'New Arrival', 'image' => 'https://images.unsplash.com/photo-1507473885765-e6ed057f782c?w=300&h=300&fit=crop'],
                    ];
                @endphp

                @foreach($newArrivalsProducts as $product)
                    <x-product-card :product="$product" />
                @endforeach
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="py-16 bg-gradient-to-r from-[#FF6B35] via-[#FF8FA3] to-[#FF6B35]">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold text-white mb-4">Stay Updated</h2>
            <p class="text-white/90 mb-6 max-w-2xl mx-auto">
                Be the first to know about new arrivals and exclusive deals. Subscribe to our newsletter!
            </p>
            <form class="max-w-md mx-auto flex gap-2">
                <input 
                    type="email" 
                    placeholder="Enter your email" 
                    class="flex-1 px-4 py-3 rounded-lg bg-white/20 border border-white/30 text-white placeholder-white/70 focus:outline-none focus:ring-2 focus:ring-white/50"
                >
                <button type="submit" class="px-8 py-3 bg-white text-[#FF6B35] font-semibold rounded-lg hover:bg-gray-100 transition-colors">
                    Subscribe
                </button>
            </form>
        </div>
    </section>
@endsection

