@extends('layouts.app')

@section('title', 'Hot Deals - CYPRUS EXPRESS')

@section('content')
    <!-- Hot Deals Banner -->
    <section class="bg-gradient-to-r from-[#FF6B35] via-[#FF8FA3] to-[#FF6B35] py-16">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                <!-- Left Side - Heading -->
                <div class="text-white">
                    <div class="flex items-center gap-2 mb-4">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd"/>
                        </svg>
                        <h1 class="text-4xl md:text-5xl font-bold">Hot Deals</h1>
                    </div>
                    <p class="text-lg text-white/80">
                        Limited time offers on selected products. Don't miss out!
                    </p>
                </div>

                <!-- Right Side - Countdown and Discount Boxes -->
                <div class="space-y-6">
                    <!-- Deal of the Day -->
                    <div class="text-white">
                        <p class="text-sm text-white/70 mb-3">Deal of the Day</p>
                        <div id="countdown" class="flex gap-3 mb-6">
                            <div class="bg-white/20 backdrop-blur-sm px-4 py-2 rounded-lg">
                                <span id="hours" class="text-2xl font-bold">12</span>h
                            </div>
                            <div class="bg-white/20 backdrop-blur-sm px-4 py-2 rounded-lg">
                                <span id="minutes" class="text-2xl font-bold">34</span>m
                            </div>
                            <div class="bg-white/20 backdrop-blur-sm px-4 py-2 rounded-lg">
                                <span id="seconds" class="text-2xl font-bold">31</span>s
                            </div>
                        </div>
                    </div>

                    <!-- Discount Boxes -->
                    <div class="grid grid-cols-3 gap-3">
                        <div class="bg-white/20 backdrop-blur-sm p-4 rounded-lg text-center border border-white/20">
                            <div class="text-3xl font-bold text-white mb-1">50%</div>
                            <div class="text-white/90 text-sm">Electronics</div>
                        </div>
                        <div class="bg-white/20 backdrop-blur-sm p-4 rounded-lg text-center border border-white/20">
                            <div class="text-3xl font-bold text-white mb-1">40%</div>
                            <div class="text-white/90 text-sm">Fashion</div>
                        </div>
                        <div class="bg-white/20 backdrop-blur-sm p-4 rounded-lg text-center border border-white/20">
                            <div class="text-3xl font-bold text-white mb-1">30%</div>
                            <div class="text-white/90 text-sm">Home</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Deals Products -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-3xl font-bold text-gray-900">All Deals</h2>
                <div class="flex gap-2">
                    <button class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm font-medium hover:bg-gray-50">All</button>
                    <button class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm font-medium hover:bg-gray-50">50%+ Off</button>
                    <button class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm font-medium hover:bg-gray-50">30-50% Off</button>
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @php
                    $dealsProducts = [
                        ['name' => 'Premium Wireless Headphones', 'price' => 299.99, 'original_price' => 399.99, 'rating' => 4.8, 'reviews' => 124, 'category' => 'Electronics', 'badge' => 'Best Seller', 'discount' => 25, 'image' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=300&h=300&fit=crop'],
                        ['name' => 'Ultra Slim Laptop Pro', 'price' => 1299.99, 'original_price' => 1733.32, 'rating' => 4.9, 'reviews' => 89, 'category' => 'Electronics', 'badge' => 'Hot Deal', 'discount' => 25, 'image' => 'https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=300&h=300&fit=crop'],
                        ['name' => 'Professional Camera Kit', 'price' => 899.99, 'original_price' => 1084.33, 'rating' => 4.5, 'reviews' => 67, 'category' => 'Electronics', 'badge' => 'Limited Edition', 'discount' => 17, 'image' => 'https://images.unsplash.com/photo-1516035069371-86a097c516cf?w=300&h=300&fit=crop'],
                        ['name' => 'Urban Travel Backpack', 'price' => 79.99, 'original_price' => 99.99, 'rating' => 4.4, 'reviews' => 145, 'category' => 'Fashion', 'badge' => 'Hot Deal', 'discount' => 20, 'image' => 'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?w=300&h=300&fit=crop'],
                        ['name' => 'Flagship Smartphone', 'price' => 999.99, 'original_price' => 1111.10, 'rating' => 4.9, 'reviews' => 312, 'category' => 'Electronics', 'badge' => 'Best Seller', 'discount' => 10, 'image' => 'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?w=300&h=300&fit=crop'],
                        ['name' => 'Performance Running Shoes', 'price' => 129.99, 'original_price' => 199.99, 'rating' => 4.6, 'reviews' => 198, 'category' => 'Sports', 'badge' => 'Hot Deal', 'discount' => 35, 'image' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=300&h=300&fit=crop'],
                        ['name' => 'Designer Sunglasses', 'price' => 159.99, 'original_price' => 229.99, 'rating' => 4.7, 'reviews' => 92, 'category' => 'Fashion', 'badge' => 'New Arrival', 'discount' => 30, 'image' => 'https://images.unsplash.com/photo-1572635196237-14b3f281503f?w=300&h=300&fit=crop'],
                        ['name' => 'Smart Coffee Maker', 'price' => 149.99, 'original_price' => 199.99, 'rating' => 4.6, 'reviews' => 134, 'category' => 'Home & Living', 'badge' => 'Hot Deal', 'discount' => 25, 'image' => 'https://images.unsplash.com/photo-1517487881594-2787fef5ebf7?w=300&h=300&fit=crop'],
                    ];
                @endphp

                @foreach($dealsProducts as $product)
                    <x-product-card :product="$product" />
                @endforeach
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    // Countdown Timer
    function updateCountdown() {
        const hoursEl = document.getElementById('hours');
        const minutesEl = document.getElementById('minutes');
        const secondsEl = document.getElementById('seconds');
        
        if (!hoursEl || !minutesEl || !secondsEl) return;
        
        let hours = parseInt(hoursEl.textContent) || 12;
        let minutes = parseInt(minutesEl.textContent) || 34;
        let seconds = parseInt(secondsEl.textContent) || 31;
        
        seconds--;
        
        if (seconds < 0) {
            seconds = 59;
            minutes--;
            if (minutes < 0) {
                minutes = 59;
                hours--;
                if (hours < 0) {
                    hours = 23;
                }
            }
        }
        
        hoursEl.textContent = hours.toString().padStart(2, '0');
        minutesEl.textContent = minutes.toString().padStart(2, '0');
        secondsEl.textContent = seconds.toString().padStart(2, '0');
    }
    
    if (document.getElementById('countdown')) {
        setInterval(updateCountdown, 1000);
    }
</script>
@endpush

