@props(['categories' => null, 'priceRange' => null, 'filters' => []])

<div class="bg-white border border-gray-200 rounded-lg p-6 space-y-6">
    <h3 class="text-lg font-bold text-gray-900 mb-4">Filters</h3>

    <!-- Price Range -->
    @if($priceRange)
        <div>
            <h4 class="text-sm font-semibold text-gray-900 mb-3">Price Range</h4>
            <div class="space-y-2">
                <div class="flex items-center gap-2">
                    <input 
                        type="number" 
                        name="min_price" 
                        id="min_price"
                        value="{{ $filters['min_price'] ?? '' }}"
                        placeholder="Min"
                        min="0"
                        step="0.01"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#FF6B35] focus:border-transparent"
                    >
                </div>
                <div class="flex items-center gap-2">
                    <input 
                        type="number" 
                        name="max_price" 
                        id="max_price"
                        value="{{ $filters['max_price'] ?? '' }}"
                        placeholder="Max"
                        min="0"
                        step="0.01"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#FF6B35] focus:border-transparent"
                    >
                </div>
            </div>
        </div>
    @endif

    <!-- Rating Filter -->
    <div>
        <h4 class="text-sm font-semibold text-gray-900 mb-3">Minimum Rating</h4>
        <div class="space-y-2">
            @for($i = 5; $i >= 1; $i--)
                <label class="flex items-center gap-2 cursor-pointer">
                    <input 
                        type="radio" 
                        name="min_rating" 
                        value="{{ $i }}"
                        {{ (isset($filters['min_rating']) && $filters['min_rating'] == $i) ? 'checked' : '' }}
                        class="w-4 h-4 text-[#FF6B35] focus:ring-[#FF6B35]"
                    >
                    <div class="flex items-center gap-1">
                        @for($j = 0; $j < 5; $j++)
                            <svg class="w-4 h-4 {{ $j < $i ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        @endfor
                        <span class="text-sm text-gray-600 ml-1">& up</span>
                    </div>
                </label>
            @endfor
        </div>
    </div>

    <!-- Badge Filter -->
    <div>
        <h4 class="text-sm font-semibold text-gray-900 mb-3">Special Offers</h4>
        <div class="space-y-2">
            @foreach(['Best Seller', 'Hot Deal', 'New Arrival', 'Limited Edition'] as $badge)
                <label class="flex items-center gap-2 cursor-pointer">
                    <input 
                        type="radio" 
                        name="badge" 
                        value="{{ $badge }}"
                        {{ (isset($filters['badge']) && $filters['badge'] == $badge) ? 'checked' : '' }}
                        class="w-4 h-4 text-[#FF6B35] focus:ring-[#FF6B35]"
                    >
                    <span class="text-sm text-gray-700">{{ $badge }}</span>
                </label>
            @endforeach
        </div>
    </div>

    <!-- Category Filter (only for products index) -->
    @if($categories)
        <div>
            <h4 class="text-sm font-semibold text-gray-900 mb-3">Category</h4>
            <div class="space-y-2 max-h-48 overflow-y-auto">
                @foreach($categories as $cat)
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input 
                            type="radio" 
                            name="category" 
                            value="{{ $cat->slug }}"
                            {{ (isset($filters['category']) && $filters['category'] == $cat->slug) ? 'checked' : '' }}
                            class="w-4 h-4 text-[#FF6B35] focus:ring-[#FF6B35]"
                        >
                        <span class="text-sm text-gray-700">{{ $cat->name }} ({{ $cat->products_count }})</span>
                    </label>
                @endforeach
            </div>
        </div>
    @endif

    <!-- Clear Filters Button -->
    <button 
        type="button" 
        onclick="clearFilters()"
        class="w-full py-2 text-sm text-gray-600 hover:text-[#FF6B35] transition-colors"
    >
        Clear All Filters
    </button>
</div>

<script>
function clearFilters() {
    const url = new URL(window.location.href);
    url.search = '';
    window.location.href = url.toString();
}
</script>

