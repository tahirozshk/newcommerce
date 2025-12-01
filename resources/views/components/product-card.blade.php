@props(['product'])

@php
    // Support both array data (old static demo) and Eloquent models
    $id = is_array($product) ? ($product['id'] ?? null) : $product->id;
    $name = is_array($product) ? ($product['name'] ?? '') : $product->name;
    $price = is_array($product) ? ($product['price'] ?? 0) : $product->price;
    $originalPrice = is_array($product) ? ($product['original_price'] ?? null) : $product->original_price;
    $rating = is_array($product) ? ($product['rating'] ?? 0) : $product->rating;
    $reviews = is_array($product) ? ($product['reviews'] ?? 0) : $product->reviews_count;
    $badge = is_array($product) ? ($product['badge'] ?? null) : $product->badge;
    $discount = is_array($product) ? ($product['discount'] ?? null) : $product->discount;
    $categoryName = is_array($product)
        ? ($product['category'] ?? null)
        : optional($product->category)->name;
    $image = is_array($product)
        ? ($product['image'] ?? null)
        : ($product->primaryImage ?? null);

    $imageUrl = $image ?? 'https://via.placeholder.com/300x300?text=Product';
@endphp

<a href="{{ route('product.detail', ['id' => $id ?? 1]) }}" class="group bg-white rounded-lg shadow-sm hover:shadow-lg transition-all duration-300 overflow-hidden border border-gray-100 block">
    <!-- Product Image -->
    <div class="relative overflow-hidden bg-gray-100 aspect-square">
        <img 
            src="{{ $imageUrl }}" 
            alt="{{ $name }}"
            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
        >
        
        <!-- Badge -->
        @if($badge)
            <div class="absolute top-3 left-3">
                <span class="px-3 py-1 text-xs font-semibold rounded-full {{ 
                    $badge === 'Best Seller' ? 'bg-green-500 text-white' : 
                    ($badge === 'Hot Deal' ? 'bg-red-500 text-white' : 
                    ($badge === 'New Arrival' ? 'bg-blue-500 text-white' : 
                    ($badge === 'Limited Edition' ? 'bg-purple-500 text-white' : 
                    'bg-gray-800 text-white'))) 
                }}">
                    {{ $badge }}
                </span>
            </div>
        @endif

        <!-- Discount Badge -->
        @if($discount)
            <div class="absolute top-3 right-3">
                <span class="px-2 py-1 text-xs font-bold bg-[#FF6B35] text-white rounded-full">
                    -{{ $discount }}%
                </span>
            </div>
        @endif

        <!-- Quick View Overlay -->
        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-all duration-300 flex items-center justify-center opacity-0 group-hover:opacity-100">
            <button class="px-6 py-2 bg-white text-gray-900 font-medium rounded-lg transform translate-y-4 group-hover:translate-y-0 transition-all duration-300">
                Quick View
            </button>
        </div>
    </div>

    <!-- Product Info -->
    <div class="p-4">
        <!-- Category -->
        @if($categoryName)
            <p class="text-xs text-gray-500 mb-1">{{ $categoryName }}</p>
        @endif

        <!-- Product Name -->
        <h3 class="font-semibold text-gray-900 mb-2 line-clamp-2 group-hover:text-[#FF6B35] transition-colors">
            {{ $name }}
        </h3>

        <!-- Rating -->
        <div class="flex items-center gap-2 mb-2">
            <div class="flex items-center">
                @for($i = 0; $i < 5; $i++)
                    <svg class="w-4 h-4 {{ $i < floor($rating ?? 0) ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                @endfor
            </div>
            <span class="text-sm text-gray-600">
                {{ number_format($rating ?? 0, 1) }} 
                <span class="text-gray-400">({{ $reviews ?? 0 }})</span>
            </span>
        </div>

        <!-- Price -->
        <div class="flex items-center gap-2 mb-3">
            <span class="text-xl font-bold text-gray-900">${{ number_format($price ?? 0, 2) }}</span>
            @if($originalPrice && $originalPrice > $price)
                <span class="text-sm text-gray-400 line-through">${{ number_format($originalPrice, 2) }}</span>
            @endif
        </div>

        <!-- Add to Cart Button -->
        @if($id)
            <form method="POST"
                  action="{{ route('cart.add', ['product' => $id]) }}"
                  class="w-full">
                @csrf
                <input type="hidden" name="quantity" value="1">
                <button type="submit"
                        class="w-full py-2 bg-gradient-to-r from-[#FF6B35] to-[#FF8FA3] text-white font-medium rounded-lg hover:opacity-90 transition-opacity flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    Add to Cart
                </button>
            </form>
        @endif
    </div>
</a>

