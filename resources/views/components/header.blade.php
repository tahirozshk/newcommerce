<header class="sticky top-0 z-50 bg-white shadow-sm w-full overflow-x-hidden">
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
                <a href="{{ route('categories') }}" class="text-gray-700 hover:text-[#FF6B35] font-medium transition-colors">Categories</a>
                <a href="{{ route('deals') }}" class="text-gray-700 hover:text-[#FF6B35] font-medium transition-colors">Deals</a>
                <a href="{{ route('new-arrivals') }}" class="text-gray-700 hover:text-[#FF6B35] font-medium transition-colors">New Arrivals</a>
            </nav>

            <!-- Search Bar -->
            <div class="hidden lg:flex flex-1 max-w-md mx-8">
                <div class="relative w-full">
                    <input 
                        type="text" 
                        placeholder="Search for products..." 
                        class="w-full px-4 py-2 pl-10 pr-4 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-[#FF6B35] focus:border-transparent"
                    >
                    <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
            </div>

            <!-- User Actions -->
            <div class="flex items-center gap-4">
                <!-- Wishlist -->
                <button class="relative p-2 text-gray-700 hover:text-[#FF6B35] transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                    <span class="absolute top-0 right-0 w-4 h-4 bg-[#FF6B35] text-white text-xs rounded-full flex items-center justify-center">0</span>
                </button>

                <!-- User Account -->
                <button class="p-2 text-gray-700 hover:text-[#FF6B35] transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </button>

                <!-- Shopping Cart -->
                <a href="{{ route('cart') }}" class="relative p-2 text-gray-700 hover:text-[#FF6B35] transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    <span class="absolute top-0 right-0 w-4 h-4 bg-[#FF6B35] text-white text-xs rounded-full flex items-center justify-center">3</span>
                </a>

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
                <a href="{{ route('deals') }}" class="text-gray-700 hover:text-[#FF6B35] font-medium">Deals</a>
                <a href="{{ route('new-arrivals') }}" class="text-gray-700 hover:text-[#FF6B35] font-medium">New Arrivals</a>
            </nav>
        </div>
    </div>
</header>

