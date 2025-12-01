@extends('layouts.app')

@section('title', 'Wishlist - CYPRUS EXPRESS')

@section('content')
    <!-- Breadcrumb -->
    <section class="bg-gray-50 py-4">
        <div class="container mx-auto px-4">
            <nav class="flex items-center gap-2 text-sm">
                <a href="{{ route('home') }}" class="text-gray-600 hover:text-[#FF6B35]">Home</a>
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
                <span class="text-gray-900">Wishlist</span>
            </nav>
        </div>
    </section>

    <!-- Wishlist Content -->
    <section class="py-8">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-3xl font-bold text-gray-900">My Wishlist</h1>
                @if($products->count() > 0)
                    <p class="text-gray-600">{{ $products->count() }} item(s)</p>
                @endif
            </div>

            @if($products->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($products as $product)
                        <x-product-card :product="$product" />
                    @endforeach
                </div>
            @else
                <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-12 text-center">
                    <svg class="w-24 h-24 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Your wishlist is empty</h3>
                    <p class="text-gray-600 mb-6">Start adding products to your wishlist</p>
                    <a href="{{ route('products.index') }}" class="inline-block px-6 py-3 bg-gradient-to-r from-[#FF6B35] to-[#FF8FA3] text-white font-semibold rounded-lg hover:opacity-90 transition-opacity">
                        Browse Products
                    </a>
                </div>
            @endif
        </div>
    </section>
@endsection

