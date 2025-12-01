@extends('layouts.app')

@section('title', 'Shopping Cart - CYPRUS EXPRESS')

@section('content')
    <!-- Page Header -->
    <section class="bg-white border-b py-8">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between">
                <h1 class="text-3xl font-bold text-gray-900">SHOPPING BAG</h1>
                <a href="{{ route('home') }}" class="text-gray-600 hover:text-[#FF6B35] transition-colors">Continue Shopping</a>
            </div>
        </div>
    </section>

    <!-- Cart Content -->
    <section class="py-8 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Cart Items -->
                <div class="lg:col-span-2">
                    @if(!empty($cartItems) && count($cartItems) > 0)
                        @foreach($cartItems as $item)
                            <div class="bg-white border-b border-gray-200 py-6">
                                <div class="flex flex-col md:flex-row gap-6">
                                    <!-- Product Image -->
                                    <div class="w-full md:w-48 h-48 bg-gray-100 rounded-lg overflow-hidden flex-shrink-0">
                                        <img 
                                            src="{{ $item['image'] }}" 
                                            alt="{{ $item['name'] }}"
                                            class="w-full h-full object-cover"
                                        >
                                    </div>

                                    <!-- Product Info -->
                                    <div class="flex-1 space-y-4">
                                        <!-- Shipping Origin -->
                                        <div class="flex items-center gap-2 text-sm text-gray-600">
                                            <span>Shipping from</span>
                                            <span class="font-medium">{{ $item['shipping_from'] ?? 'United States' }}</span>
                                        </div>

                                        <!-- Product Details -->
                                        <div>
                                            <div class="flex items-start justify-between gap-4 mb-2">
                                                <div class="flex-1">
                                                    <p class="text-sm font-semibold text-gray-500 mb-1">{{ $item['brand'] ?? 'CYPRUS EXPRESS' }}</p>
                                                    <h3 class="text-lg font-semibold text-gray-900 mb-1">{{ $item['name'] }}</h3>
                                                    <p class="text-xs text-gray-500">Reference: {{ $item['reference'] ?? 'REF-' . $item['id'] }}</p>
                                                </div>
                                                <form method="POST" action="{{ route('cart.remove', ['product' => $item['id']]) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-gray-400 hover:text-red-600 transition-colors">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>

                                            <!-- Stock Warning -->
                                            <div class="flex items-center gap-2 mb-3">
                                                <span class="px-2 py-1 bg-amber-100 text-amber-800 text-xs font-medium rounded">Last {{ $item['stock'] ?? rand(1, 3) }} left</span>
                                            </div>
                                        </div>

                                        <!-- Price, Size, Quantity -->
                                        <div class="flex flex-wrap items-center gap-6 text-sm">
                                            <div>
                                                <span class="text-gray-500">Price:</span>
                                                <span class="font-semibold text-gray-900 ml-1">${{ number_format($item['price'], 2) }}</span>
                                                @if(isset($item['original_price']))
                                                    <span class="text-gray-400 line-through ml-1">${{ number_format($item['original_price'], 2) }}</span>
                                                @endif
                                            </div>
                                            <div>
                                                <span class="text-gray-500">Size:</span>
                                                <span class="font-semibold text-gray-900 ml-1">{{ $item['size'] ?? 'M' }}</span>
                                            </div>
                                            <form method="POST" action="{{ route('cart.update', ['product' => $item['id']]) }}" class="flex items-center gap-2">
                                                @csrf
                                                <span class="text-gray-500">Quantity:</span>
                                                <div class="flex items-center border border-gray-300 rounded">
                                                    <button type="button" onclick="changeCartQuantity(this, -1)" class="px-2 py-1 hover:bg-gray-100 transition-colors text-gray-600">-</button>
                                                    <input type="number"
                                                           name="quantity"
                                                           value="{{ $item['quantity'] }}"
                                                           min="1"
                                                           class="w-16 text-center border-0 focus:ring-0">
                                                    <button type="button" onclick="changeCartQuantity(this, 1)" class="px-2 py-1 hover:bg-gray-100 transition-colors text-gray-600">+</button>
                                                </div>
                                            </form>
                                        </div>

                                        <!-- Shipping Info -->
                                        <div class="pt-2 border-t border-gray-100">
                                            <div class="flex items-center gap-2 text-sm text-gray-600 mb-1">
                                                <span>Estimated Shipping ${{ number_format($item['shipping_cost'] ?? 8.00, 2) }}</span>
                                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                </svg>
                                            </div>
                                            <p class="text-xs text-gray-500">Import duties are included</p>
                                        </div>

                                        <!-- Move to Wishlist -->
                                        <button class="text-sm text-gray-600 hover:text-[#FF6B35] transition-colors flex items-center gap-1">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                            </svg>
                                            Move to Wishlist
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @else
                        <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-12 text-center">
                            <svg class="w-24 h-24 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Your cart is empty</h3>
                            <p class="text-gray-600 mb-6">Start shopping to add items to your cart</p>
                            <a href="{{ route('home') }}" class="inline-block px-6 py-3 bg-gradient-to-r from-[#FF6B35] to-[#FF8FA3] text-white font-semibold rounded-lg hover:opacity-90 transition-opacity">
                                Continue Shopping
                            </a>
                        </div>
                    @endif
                </div>

                <!-- Order Summary -->
                <div class="lg:col-span-1">
                    <div class="bg-white border border-gray-200 p-6 sticky top-24">
                        <h2 class="text-xl font-bold text-gray-900 mb-6">SUMMARY</h2>
                        
                        <div class="space-y-4 mb-6">
                            <div class="flex justify-between text-gray-600">
                                <span>Subtotal</span>
                                <span class="font-semibold">${{ number_format($subtotal, 2) }}</span>
                            </div>
                            <div class="flex justify-between text-gray-600">
                                <span>Shipping</span>
                                <span class="font-semibold">${{ number_format($totalShipping, 2) }}</span>
                            </div>
                            <div class="flex justify-between text-gray-600">
                                <span>Tax</span>
                                <span class="font-semibold">${{ number_format($tax, 2) }}</span>
                            </div>
                            @if($subtotal >= 50)
                                <div class="flex items-center gap-2 text-green-600 text-sm">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    <span>Free shipping applied!</span>
                                </div>
                            @endif
                        </div>

                        <div class="border-t pt-4 mb-4">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-lg font-semibold text-gray-900">Total</span>
                                <span class="text-2xl font-bold text-gray-900">
                                    USD ${{ number_format($total, 2) }}
                                </span>
                            </div>
                            <p class="text-xs text-gray-500">Import duties included</p>
                        </div>

                        <a href="#" class="block w-full py-3 bg-gray-900 text-white font-semibold rounded-lg hover:bg-gray-800 transition-colors text-center mb-4 flex items-center justify-center gap-2">
                            Go to checkout
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                        <a href="{{ route('home') }}" class="block w-full py-3 border-2 border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-50 transition-colors text-center">
                            Continue Shopping
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    function changeCartQuantity(button, delta) {
        const form = button.closest('form');
        const input = form.querySelector('input[name=\"quantity\"]');
        const current = parseInt(input.value || '1', 10);
        const next = Math.max(1, current + delta);
        input.value = next;
        form.submit();
    }
</script>
@endpush

