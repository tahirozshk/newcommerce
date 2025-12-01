@extends('layouts.app')

@section('title', 'Dashboard - CYPRUS EXPRESS')

@section('content')
    <!-- Page Header -->
    <section class="bg-white border-b py-8">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold text-gray-900">Dashboard</h1>
            <p class="text-gray-600 mt-1">Welcome back, {{ Auth::user()->name }}.</p>
        </div>
    </section>

    <!-- Dashboard Content -->
    <section class="py-8 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Account Card -->
                <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-12 h-12 bg-[#FF6B35]/10 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-[#FF6B35]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        <h2 class="text-lg font-semibold text-gray-900">Account</h2>
                    </div>
                    <p class="text-sm text-gray-600 mb-1">{{ Auth::user()->email }}</p>
                    <p class="text-sm text-gray-500 mb-4">Manage your profile and security settings.</p>
                    <a href="{{ route('profile.edit') }}" class="inline-flex items-center text-sm font-semibold text-[#FF6B35] hover:text-[#FF8FA3] transition-colors">
                        Go to profile
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>

                <!-- Orders Card -->
                <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                            </svg>
                        </div>
                        <h2 class="text-lg font-semibold text-gray-900">Orders</h2>
                    </div>
                    <p class="text-2xl font-bold text-gray-900 mb-1">0</p>
                    <p class="text-sm text-gray-500">You will be able to see your order history here.</p>
                </div>
            </div>

            <!-- Wishlist Section -->
            @php
                $wishlistCount = \App\Models\Wishlist::where('user_id', Auth::id())->count();
                $wishlistProducts = \App\Models\Wishlist::with('product')
                    ->where('user_id', Auth::id())
                    ->latest()
                    ->take(4)
                    ->get();
            @endphp
            <div class="mt-6">
                <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100">
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-pink-100 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-pink-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-lg font-semibold text-gray-900">Wishlist</h2>
                                <p class="text-sm text-gray-500">{{ $wishlistCount }} item(s) in your wishlist</p>
                            </div>
                        </div>
                        @if($wishlistCount > 0)
                            <a href="{{ route('wishlist') }}" class="text-sm font-semibold text-[#FF6B35] hover:text-[#FF8FA3] transition-colors">
                                View All
                            </a>
                        @endif
                    </div>

                    @if($wishlistCount > 0)
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                            @foreach($wishlistProducts as $wishlistItem)
                                @if($wishlistItem->product)
                                    <div class="border border-gray-200 rounded-lg overflow-hidden hover:shadow-md transition-shadow">
                                        <a href="{{ route('product.detail', ['id' => $wishlistItem->product->id]) }}" class="block">
                                            <img 
                                                src="{{ $wishlistItem->product->primaryImage }}" 
                                                alt="{{ $wishlistItem->product->name }}"
                                                class="w-full h-48 object-cover"
                                            >
                                        </a>
                                        <div class="p-3">
                                            <h3 class="font-semibold text-gray-900 text-sm mb-1 truncate">
                                                {{ $wishlistItem->product->name }}
                                            </h3>
                                            <p class="text-lg font-bold text-[#FF6B35] mb-2">
                                                ${{ number_format($wishlistItem->product->price, 2) }}
                                            </p>
                                            <form method="POST" action="{{ route('wishlist.remove', ['id' => $wishlistItem->product->id]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="w-full text-sm text-gray-600 hover:text-red-600 transition-colors">
                                                    Remove from wishlist
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-12">
                            <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                            </svg>
                            <p class="text-gray-500 mb-2">Your wishlist is empty</p>
                            <a href="{{ route('products.index') }}" class="text-sm font-semibold text-[#FF6B35] hover:text-[#FF8FA3] transition-colors">
                                Browse Products
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
