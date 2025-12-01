@extends('layouts.app')

@section('title', ($product->name ?? 'Product Detail') . ' - CYPRUS EXPRESS')

@section('content')

    <!-- Breadcrumb -->
    <section class="bg-gray-50 py-4">
        <div class="container mx-auto px-4">
            <nav class="flex items-center gap-2 text-sm">
                <a href="{{ route('home') }}" class="text-gray-600 hover:text-[#FF6B35]">Home</a>
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
                <a href="{{ route('categories') }}" class="text-gray-600 hover:text-[#FF6B35]">
                    {{ optional($product->category)->name ?? 'Category' }}
                </a>
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
                <span class="text-gray-900">{{ $product->name }}</span>
            </nav>
        </div>
    </section>

    <!-- Product Detail -->
    <section class="py-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Product Images Slider -->
                <div class="relative">
                    <!-- Main Image Slider -->
                    <div class="relative bg-gray-100 rounded-lg overflow-hidden mb-4" style="max-height: 550px;">
                        <div id="image-slider" class="relative h-[550px] overflow-hidden">
                            @foreach($product->images ?? [] as $index => $image)
                                <div class="slider-image absolute inset-0 transition-opacity duration-500 {{ $index === 0 ? 'opacity-100' : 'opacity-0' }}" data-index="{{ $index }}">
                                    <img 
                                        src="{{ $image }}" 
                                        alt="{{ $product->name }} - Image {{ $index + 1 }}"
                                        class="w-full h-full object-contain"
                                    >
                                </div>
                            @endforeach
                        </div>
                        
                        <!-- Navigation Arrows -->
                        <button 
                            id="prev-btn"
                            onclick="changeSlide(-1)"
                            class="absolute left-4 top-1/2 transform -translate-y-1/2 w-10 h-10 bg-white/90 hover:bg-white rounded-full flex items-center justify-center shadow-lg transition-all z-10"
                        >
                            <svg class="w-5 h-5 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                            </svg>
                        </button>
                        <button 
                            id="next-btn"
                            onclick="changeSlide(1)"
                            class="absolute right-4 top-1/2 transform -translate-y-1/2 w-10 h-10 bg-white/90 hover:bg-white rounded-full flex items-center justify-center shadow-lg transition-all z-10"
                        >
                            <svg class="w-5 h-5 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </button>
                        
                        <!-- Slide Indicators -->
                        <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex gap-2 z-10">
                            @foreach($product->images ?? [] as $index => $image)
                                <button 
                                    onclick="goToSlide({{ $index }})"
                                    class="slide-indicator w-2 h-2 rounded-full transition-all {{ $index === 0 ? 'bg-white w-6' : 'bg-white/50' }}"
                                ></button>
                            @endforeach
                        </div>
                    </div>
                    
                    <!-- Thumbnail Images Slider -->
                    <div class="relative mt-4">
                        <div id="thumbnail-slider" class="flex gap-3 overflow-x-auto scrollbar-hide pb-2 snap-x snap-mandatory min-h-[100px]" style="scrollbar-width: none; -ms-overflow-style: none;">
                            @foreach($product->images ?? [] as $index => $image)
                                <button 
                                    onclick="goToSlide({{ $index }})"
                                    class="thumbnail-btn flex-shrink-0 aspect-square w-28 bg-gray-100 rounded-lg overflow-hidden border-2 snap-center cursor-pointer {{ $index === 0 ? 'border-[#FF6B35]' : 'border-transparent' }} hover:border-[#FF6B35] transition-colors"
                                    data-index="{{ $index }}"
                                >
                                    <img 
                                        src="{{ $image }}" 
                                        alt="Thumbnail {{ $index + 1 }}"
                                        class="w-full h-full object-cover"
                                    >
                                </button>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Product Info -->
                <div class="space-y-6">
                    <!-- Badge -->
                    @if($product->badge)
                        <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full bg-green-500 text-white">
                            {{ $product->badge }}
                        </span>
                    @endif

                    <!-- Product Name -->
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-900">{{ $product->name }}</h1>

                    <!-- Rating -->
                    <div class="flex items-center gap-4">
                        <div class="flex items-center">
                            @for($i = 0; $i < 5; $i++)
                                <svg class="w-5 h-5 {{ $i < floor($product->rating ?? 0) ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                            @endfor
                        </div>
                        <span class="text-gray-600">
                            <span class="font-semibold">{{ number_format($product->rating ?? 0, 1) }}</span>
                            <span class="text-gray-400">({{ $product->reviews_count ?? 0 }} reviews)</span>
                        </span>
                    </div>

                    <!-- Price -->
                    <div class="flex items-baseline gap-4">
                        <span class="text-4xl font-bold text-gray-900">${{ number_format($product->price, 2) }}</span>
                        @if($product->original_price && $product->original_price > $product->price)
                            <span class="text-xl text-gray-400 line-through">${{ number_format($product->original_price, 2) }}</span>
                            <span class="px-3 py-1 bg-red-100 text-red-600 text-sm font-semibold rounded-full">
                                -{{ $product->discount }}%
                            </span>
                        @endif
                    </div>

                    <!-- Description -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Description</h3>
                        <p class="text-gray-600 leading-relaxed">{{ $product->description }}</p>
                    </div>

                    <!-- Features -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">Key Features</h3>
                        <ul class="grid grid-cols-2 gap-2">
                            @foreach(($product->features ?? []) as $feature)
                                <li class="flex items-center gap-2 text-gray-600">
                                    <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    {{ $feature }}
                                </li>
                            @endforeach
                        </ul>
                    </div>

                        <!-- Stock Status -->
                        <div class="flex items-center gap-2">
                            @if($product->stock > 0)
                                <span class="w-3 h-3 bg-green-500 rounded-full"></span>
                                <span class="text-green-600 font-medium">In Stock ({{ $product->stock }} available)</span>
                            @else
                                <span class="w-3 h-3 bg-red-500 rounded-full"></span>
                                <span class="text-red-600 font-medium">Out of Stock</span>
                            @endif
                        </div>

                    <!-- Quantity & Add to Cart -->
                    <div class="space-y-4 pt-4 border-t">
                        <div class="flex items-center gap-4">
                            <label class="text-gray-700 font-medium" for="quantity">Quantity:</label>
                            <div class="flex items-center border border-gray-300 rounded-lg">
                                <button type="button" onclick="decreaseQuantity()" class="px-4 py-2 hover:bg-gray-100 transition-colors">-</button>
                                <input type="number"
                                       id="quantity"
                                       name="quantity"
                                       value="1"
                                       min="1"
                                       max="{{ $product->stock }}"
                                       class="w-16 text-center border-0 focus:ring-0">
                                <button type="button" onclick="increaseQuantity()" class="px-4 py-2 hover:bg-gray-100 transition-colors">+</button>
                            </div>
                        </div>
                        
                        <div class="flex gap-4">
                            <!-- Cart Button -->
                            <form method="POST" action="{{ route('cart.add', ['product' => $product->id]) }}" class="flex-1" id="cart-form">
                                @csrf
                                <input type="hidden" name="quantity" id="cart-quantity" value="1">
                                <button type="submit" class="w-full py-3 bg-gradient-to-r from-[#FF6B35] to-[#FF8FA3] text-white font-semibold rounded-lg hover:opacity-90 transition-opacity flex items-center justify-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                    Add to Cart
                                </button>
                            </form>
                            
                            <!-- Wishlist Button (Same row as Cart button) -->
                            @auth
                                @if($isInWishlist ?? false)
                                    <form method="POST" action="{{ route('wishlist.remove', ['id' => $product->id]) }}" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-6 py-3 bg-[#FF6B35] text-white font-semibold rounded-lg hover:bg-[#FF8FA3] transition-colors">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                            </svg>
                                        </button>
                                    </form>
                                @else
                                    <form method="POST" action="{{ route('wishlist.add', ['id' => $product->id]) }}" class="inline">
                                        @csrf
                                        <button type="submit" class="px-6 py-3 border-2 border-[#FF6B35] text-[#FF6B35] font-semibold rounded-lg hover:bg-[#FF6B35] hover:text-white transition-colors">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                            </svg>
                                        </button>
                                    </form>
                                @endif
                            @else
                                <a href="{{ route('login') }}" class="px-6 py-3 border-2 border-[#FF6B35] text-[#FF6B35] font-semibold rounded-lg hover:bg-[#FF6B35] hover:text-white transition-colors inline-flex items-center justify-center">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                    </svg>
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Similar Products -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-gray-900 mb-8">Similar Products</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($similarProducts as $product)
                    <x-product-card :product="$product" />
                @endforeach
            </div>
        </div>
    </section>
@endsection

@push('scripts')
@php
    $totalImages = count($product->images ?? []);
@endphp
<script>
    let currentSlide = 0;
    const totalSlides = {{ $totalImages }};

    function showSlide(index) {
        const slides = document.querySelectorAll('.slider-image');
        const indicators = document.querySelectorAll('.slide-indicator');
        
        // Update slides
        slides.forEach((slide, i) => {
            if (i === index) {
                slide.classList.remove('opacity-0');
                slide.classList.add('opacity-100');
            } else {
                slide.classList.remove('opacity-100');
                slide.classList.add('opacity-0');
            }
        });
        
        // Update indicators
        indicators.forEach((indicator, i) => {
            if (i === index) {
                indicator.classList.remove('bg-white/50');
                indicator.classList.add('bg-white', 'w-6');
            } else {
                indicator.classList.remove('bg-white', 'w-6');
                indicator.classList.add('bg-white/50');
            }
        });
        
        // Update thumbnails
        const thumbnailButtons = document.querySelectorAll('.thumbnail-btn');
        const thumbnailSlider = document.getElementById('thumbnail-slider');
        thumbnailButtons.forEach((thumb, i) => {
            if (i === index) {
                thumb.classList.remove('border-transparent');
                thumb.classList.add('border-[#FF6B35]');
                // Scroll thumbnail into view within the slider container
                if (thumbnailSlider) {
                    const thumbRect = thumb.getBoundingClientRect();
                    const sliderRect = thumbnailSlider.getBoundingClientRect();
                    const thumbLeft = thumb.offsetLeft;
                    const thumbWidth = thumb.offsetWidth;
                    const sliderWidth = thumbnailSlider.offsetWidth;
                    const scrollLeft = thumbnailSlider.scrollLeft;
                    
                    // Calculate the position to center the thumbnail
                    const targetScroll = thumbLeft - (sliderWidth / 2) + (thumbWidth / 2);
                    thumbnailSlider.scrollTo({
                        left: targetScroll,
                        behavior: 'smooth'
                    });
                }
            } else {
                thumb.classList.remove('border-[#FF6B35]');
                thumb.classList.add('border-transparent');
            }
        });
        
        currentSlide = index;
    }

    function changeSlide(direction) {
        let newSlide = currentSlide + direction;
        if (newSlide < 0) {
            newSlide = totalSlides - 1;
        } else if (newSlide >= totalSlides) {
            newSlide = 0;
        }
        showSlide(newSlide);
    }

    function goToSlide(index) {
        showSlide(index);
    }

    // Auto-play slider (optional)
    // setInterval(() => changeSlide(1), 5000);

    function increaseQuantity() {
        const input = document.getElementById('quantity');
        const max = parseInt(input.getAttribute('max'));
        const current = parseInt(input.value);
        if (current < max) {
            input.value = current + 1;
            document.getElementById('cart-quantity').value = input.value;
        }
    }

    function decreaseQuantity() {
        const input = document.getElementById('quantity');
        const current = parseInt(input.value);
        if (current > 1) {
            input.value = current - 1;
            document.getElementById('cart-quantity').value = input.value;
        }
    }

    // Update cart quantity when quantity input changes
    document.getElementById('quantity').addEventListener('input', function() {
        document.getElementById('cart-quantity').value = this.value;
    });

    // Update cart quantity on form submit
    document.getElementById('cart-form').addEventListener('submit', function() {
        const quantityInput = document.getElementById('quantity');
        document.getElementById('cart-quantity').value = quantityInput.value;
    });
</script>
@endpush

