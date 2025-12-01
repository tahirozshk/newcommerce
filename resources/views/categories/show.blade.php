@extends('layouts.app')

@section('title', $category->name . ' - CYPRUS EXPRESS')

@section('content')
    <!-- Breadcrumb -->
    <section class="bg-gray-50 py-4">
        <div class="container mx-auto px-4">
            <nav class="flex items-center gap-2 text-sm">
                <a href="{{ route('home') }}" class="text-gray-600 hover:text-[#FF6B35]">Home</a>
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
                <a href="{{ route('categories') }}" class="text-gray-600 hover:text-[#FF6B35]">Categories</a>
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
                <span class="text-gray-900">{{ $category->name }}</span>
            </nav>
        </div>
    </section>

    <!-- Page Header -->
    <section class="bg-white border-b py-8">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $category->name }}</h1>
            <p class="text-gray-600">{{ $products->total() }} products found</p>
        </div>
    </section>

    <!-- Products Section -->
    <section class="py-8 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                <!-- Filters Sidebar -->
                <div class="lg:col-span-1">
                    <form method="GET" action="{{ route('category.show', $category->slug) }}" id="filter-form">
                        <x-filters 
                            :priceRange="$priceRange" 
                            :filters="$filters"
                        />
                        
                        <input type="hidden" name="sort" value="{{ $filters['sort'] ?? 'default' }}" id="sort-input">
                        
                        <button type="submit" class="w-full mt-4 py-3 bg-gradient-to-r from-[#FF6B35] to-[#FF8FA3] text-white font-semibold rounded-lg hover:opacity-90 transition-opacity">
                            Apply Filters
                        </button>
                    </form>
                </div>

                <!-- Products Grid -->
                <div class="lg:col-span-3">
                    <!-- Sort & View Options -->
                    <div class="flex items-center justify-between mb-6">
                        <p class="text-sm text-gray-600">
                            Showing {{ $products->firstItem() ?? 0 }}-{{ $products->lastItem() ?? 0 }} of {{ $products->total() }} products
                        </p>
                        <div class="flex items-center gap-4">
                            <label class="text-sm text-gray-700">Sort by:</label>
                            <select 
                                name="sort" 
                                id="sort-select"
                                onchange="updateSort(this.value)"
                                class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#FF6B35] focus:border-transparent"
                            >
                                <option value="default" {{ ($filters['sort'] ?? 'default') == 'default' ? 'selected' : '' }}>Default</option>
                                <option value="price_asc" {{ ($filters['sort'] ?? '') == 'price_asc' ? 'selected' : '' }}>Price: Low to High</option>
                                <option value="price_desc" {{ ($filters['sort'] ?? '') == 'price_desc' ? 'selected' : '' }}>Price: High to Low</option>
                                <option value="newest" {{ ($filters['sort'] ?? '') == 'newest' ? 'selected' : '' }}>Newest</option>
                                <option value="popular" {{ ($filters['sort'] ?? '') == 'popular' ? 'selected' : '' }}>Most Popular</option>
                                <option value="rating" {{ ($filters['sort'] ?? '') == 'rating' ? 'selected' : '' }}>Highest Rated</option>
                            </select>
                        </div>
                    </div>

                    <!-- Products Grid -->
                    @if($products->count() > 0)
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                            @foreach($products as $product)
                                <x-product-card :product="$product" />
                            @endforeach
                        </div>

                        <!-- Pagination -->
                        <div class="mt-8">
                            {{ $products->links() }}
                        </div>
                    @else
                        <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-12 text-center">
                            <svg class="w-24 h-24 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                            </svg>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">No products found</h3>
                            <p class="text-gray-600 mb-6">Try adjusting your filters</p>
                            <a href="{{ route('category.show', $category->slug) }}" class="inline-block px-6 py-3 bg-gradient-to-r from-[#FF6B35] to-[#FF8FA3] text-white font-semibold rounded-lg hover:opacity-90 transition-opacity">
                                Clear Filters
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
function updateSort(value) {
    document.getElementById('sort-input').value = value;
    document.getElementById('filter-form').submit();
}
</script>
@endpush

