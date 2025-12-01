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
                    <a href="{{ route('new-arrivals', ['sort' => 'newest']) }}" class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm font-medium hover:bg-gray-50 {{ request('sort', 'newest') == 'newest' ? 'bg-[#FF6B35] text-white border-[#FF6B35]' : '' }}">All</a>
                    <a href="{{ route('new-arrivals', ['sort' => 'newest', 'period' => 'week']) }}" class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm font-medium hover:bg-gray-50 {{ request('period') == 'week' ? 'bg-[#FF6B35] text-white border-[#FF6B35]' : '' }}">This Week</a>
                    <a href="{{ route('new-arrivals', ['sort' => 'newest', 'period' => 'month']) }}" class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm font-medium hover:bg-gray-50 {{ request('period') == 'month' ? 'bg-[#FF6B35] text-white border-[#FF6B35]' : '' }}">This Month</a>
                </div>
            </div>
            
            @if($products->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($products as $product)
                        <x-product-card :product="$product" />
                    @endforeach
                </div>
                
                <!-- Pagination -->
                <div class="mt-8">
                    {{ $products->links() }}
                </div>
            @else
                <div class="text-center py-12">
                    <p class="text-gray-500 text-lg">No new arrivals at the moment.</p>
                </div>
            @endif
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

