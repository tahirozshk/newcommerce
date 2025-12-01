<div class="sticky top-0 z-50 w-full">
    <!-- Top Info Bar -->
    <div class="bg-gray-800 text-white text-sm w-full border-b border-gray-700">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between h-10">
                <div class="flex items-center gap-6">
                    <!-- Email -->
                    <a href="mailto:info@cyprusexpress.com" class="flex items-center gap-2 hover:text-[#FF6B35] transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <span class="hidden sm:inline">info@cyprusexpress.com</span>
                    </a>
                    
                    <!-- Phone -->
                    <a href="tel:+905551234567" class="flex items-center gap-2 hover:text-[#FF6B35] transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        <span class="hidden sm:inline">+90 555 123 45 67</span>
                    </a>
                    
                    <!-- Location -->
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span class="hidden md:inline">Cyprus, Nicosia</span>
                    </div>
                </div>
                
                <!-- Wallet -->
                <div class="flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                    </svg>
                    <span class="hidden sm:inline">Wallet</span>
                </div>
            </div>
        </div>
    </div>

    <header class="bg-white shadow-sm w-full">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between h-20">
            <!-- Logo -->
            <div class="flex items-center flex-shrink-0">
                <a href="{{ route('home') }}" class="flex items-center">
                    <img 
                        src="{{ asset('logo.png') }}" 
                        alt="CYPRUS EXPRESS" 
                        class="h-10 max-h-10 max-w-[100px] w-auto object-contain"
                        style="height: 40px !important; max-width: 100px !important;"
                    >
                </a>
            </div>

            <!-- Navigation -->
            <nav class="hidden md:flex items-center gap-8">
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-[#FF6B35] font-medium transition-colors">Home</a>
                
                <!-- Categories Dropdown -->
                @php
                    // Sadece parent kategorileri al (parent_id null olanlar) ve children'ları eager load et
                    $parentCategories = \App\Models\Category::whereNull('parent_id')
                        ->with(['children.children'])
                        ->orderBy('name')
                        ->get();
                @endphp
                <div 
                    class="relative"
                    x-data="{ open: false }"
                    @mouseenter="open = true"
                    @mouseleave="open = false"
                >
                    <a 
                        href="{{ route('categories') }}" 
                        class="text-gray-700 hover:text-[#FF6B35] font-medium transition-colors flex items-center gap-1"
                    >
                        Categories
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </a>
                    
                    <!-- Dropdown Menu -->
                    <div 
                        x-show="open"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 transform scale-95"
                        x-transition:enter-end="opacity-100 transform scale-100"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 transform scale-100"
                        x-transition:leave-end="opacity-0 transform scale-95"
                        class="absolute top-full left-0 mt-2 w-64 bg-white rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 z-50 overflow-visible"
                        style="display: none;"
                    >
                        <div class="py-2">
                            @forelse($parentCategories as $category)
                                <x-category-menu-item :category="$category" :level="0" />
                            @empty
                                <div class="px-4 py-3 text-sm text-gray-500">No categories available</div>
                            @endforelse
                        </div>
                    </div>
                </div>
                
                <a href="{{ route('products.index') }}" class="text-gray-700 hover:text-[#FF6B35] font-medium transition-colors">Products</a>
                <a href="{{ route('deals') }}" class="text-gray-700 hover:text-[#FF6B35] font-medium transition-colors">Deals</a>
                <a href="{{ route('new-arrivals') }}" class="text-gray-700 hover:text-[#FF6B35] font-medium transition-colors">New Arrivals</a>
            </nav>

            <!-- Search Bar -->
            <div class="hidden lg:flex flex-1 max-w-md mx-8">
                <form action="{{ route('products.index') }}" method="GET" class="relative w-full">
                    <input 
                        type="text" 
                        name="q"
                        value="{{ request('q') }}"
                        placeholder="Search for products..." 
                        class="w-full px-4 py-2 pl-10 pr-4 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-[#FF6B35] focus:border-transparent"
                    >
                    <button type="submit" class="absolute left-3 top-1/2 transform -translate-y-1/2">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </button>
                </form>
            </div>

            <!-- User Actions -->
            <div class="flex items-center gap-4">
                <!-- Shopping Cart -->
                @php
                    $cartCount = 0;
                    if (Auth::check()) {
                        // Authenticated user: count from database
                        $cartCount = \App\Models\CartItem::where('user_id', Auth::id())
                            ->sum('quantity');
                    } else {
                        // Guest user: count from session
                        $sessionCart = session('cart', []);
                        foreach ($sessionCart as $item) {
                            $cartCount += (int) ($item['quantity'] ?? 1);
                        }
                    }
                @endphp
                <a href="{{ route('cart') }}" class="relative p-2 text-gray-700 hover:text-[#FF6B35] transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    @if($cartCount > 0)
                        <span class="absolute top-0 right-0 w-4 h-4 bg-[#FF6B35] text-white text-xs rounded-full flex items-center justify-center">{{ $cartCount }}</span>
                    @endif
                </a>

                <!-- Wishlist -->
                @auth
                    @php
                        $wishlistCount = \App\Models\Wishlist::where('user_id', Auth::id())->count();
                    @endphp
                    <a href="{{ route('wishlist') }}" class="relative p-2 text-gray-700 hover:text-[#FF6B35] transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                        @if($wishlistCount > 0)
                            <span class="absolute top-0 right-0 w-4 h-4 bg-[#FF6B35] text-white text-xs rounded-full flex items-center justify-center">{{ $wishlistCount }}</span>
                        @endif
                    </a>
                @endauth

                <!-- User Account / Auth -->
                @auth
                    <div 
                        class="relative overflow-visible" 
                        x-data="{ open: false }" 
                        @click.away="open = false"
                    >
                        <button 
                            @click="open = !open"
                            class="text-sm font-medium text-gray-700 hover:text-[#FF6B35] transition-colors flex items-center gap-1"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            <span class="hidden sm:inline">{{ Auth::user()->name }}</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        
                        <!-- Dropdown Menu -->
                        <div 
                            x-show="open"
                            x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 z-[100]"
                            style="display: none;"
                        >
                            <div class="py-1">
                                <a 
                                    href="{{ route('dashboard') }}" 
                                    @click="open = false"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-[#FF6B35] transition-colors"
                                >
                                    Dashboard
                                </a>
                                <a 
                                    href="{{ route('profile.edit') }}" 
                                    @click="open = false"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-[#FF6B35] transition-colors"
                                >
                                    Profile
                                </a>
                                <hr class="my-1">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button 
                                        type="submit" 
                                        @click="open = false"
                                        class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-[#FF6B35] transition-colors"
                                    >
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endauth

                @guest
                    <a href="{{ route('login') }}" class="text-sm font-medium text-gray-700 hover:text-[#FF6B35] transition-colors">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="text-sm font-medium text-white bg-[#FF6B35] hover:bg-[#FF8FA3] px-4 py-2 rounded-full transition-colors">
                        Register
                    </a>
                @endguest

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-btn" class="md:hidden p-2 text-gray-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-white border-t">
        <div class="container mx-auto px-4 py-4">
            <nav class="flex flex-col gap-4">
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-[#FF6B35] font-medium">Home</a>
                <a href="{{ route('categories') }}" class="text-gray-700 hover:text-[#FF6B35] font-medium">Categories</a>
                <a href="{{ route('products.index') }}" class="text-gray-700 hover:text-[#FF6B35] font-medium">Products</a>
                <a href="{{ route('deals') }}" class="text-gray-700 hover:text-[#FF6B35] font-medium">Deals</a>
                <a href="{{ route('new-arrivals') }}" class="text-gray-700 hover:text-[#FF6B35] font-medium">New Arrivals</a>

                @guest
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-[#FF6B35] font-medium">Login</a>
                    <a href="{{ route('register') }}" class="text-gray-700 hover:text-[#FF6B35] font-medium">Register</a>
                @else
                    <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-[#FF6B35] font-medium">Dashboard</a>
                    <a href="{{ route('profile.edit') }}" class="text-gray-700 hover:text-[#FF6B35] font-medium">Profile</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left text-gray-700 hover:text-[#FF6B35] font-medium mt-2">
                            Logout
                        </button>
                    </form>
                @endguest
            </nav>
        </div>
    </div>
</header>
</div>

