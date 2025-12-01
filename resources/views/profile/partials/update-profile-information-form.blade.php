<section>
    <header>
        <h2 class="text-xl font-semibold text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information, email address, and billing details.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <!-- Profile Information -->
        <div class="space-y-4">
            <h3 class="text-lg font-semibold text-gray-900 border-b pb-2">{{ __('Personal Information') }}</h3>
            
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                    {{ __('Name') }}
                </label>
                <input 
                    id="name" 
                    name="name" 
                    type="text" 
                    value="{{ old('name', $user->name) }}" 
                    required 
                    autofocus 
                    autocomplete="name"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#FF6B35] focus:border-transparent @error('name') border-red-500 @enderror"
                >
                @error('name')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                    {{ __('Email') }}
                </label>
                <input 
                    id="email" 
                    name="email" 
                    type="email" 
                    value="{{ old('email', $user->email) }}" 
                    required 
                    autocomplete="username"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#FF6B35] focus:border-transparent @error('email') border-red-500 @enderror"
                >
                @error('email')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div class="mt-2">
                        <p class="text-sm text-gray-800">
                            {{ __('Your email address is unverified.') }}

                            <button form="send-verification" class="text-[#FF6B35] hover:text-[#FF8FA3] underline text-sm transition-colors">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 font-medium text-sm text-green-600">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </p>
                        @endif
                    </div>
                @endif
            </div>

            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                    {{ __('Phone Number') }}
                </label>
                <input 
                    id="phone" 
                    name="phone" 
                    type="tel" 
                    value="{{ old('phone', $user->phone) }}" 
                    autocomplete="tel"
                    placeholder="+90 555 123 4567"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#FF6B35] focus:border-transparent @error('phone') border-red-500 @enderror"
                >
                @error('phone')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Address Information -->
        <div class="space-y-4 pt-6 border-t">
            <h3 class="text-lg font-semibold text-gray-900 border-b pb-2">{{ __('Address Information') }}</h3>
            
            <div>
                <label for="address_line1" class="block text-sm font-medium text-gray-700 mb-2">
                    {{ __('Address Line 1') }}
                </label>
                <input 
                    id="address_line1" 
                    name="address_line1" 
                    type="text" 
                    value="{{ old('address_line1', $user->address_line1) }}" 
                    autocomplete="street-address"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#FF6B35] focus:border-transparent @error('address_line1') border-red-500 @enderror"
                >
                @error('address_line1')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="address_line2" class="block text-sm font-medium text-gray-700 mb-2">
                    {{ __('Address Line 2') }} <span class="text-gray-400 text-xs">({{ __('Optional') }})</span>
                </label>
                <input 
                    id="address_line2" 
                    name="address_line2" 
                    type="text" 
                    value="{{ old('address_line2', $user->address_line2) }}" 
                    placeholder="{{ __('Apartment, suite, unit, building, floor, etc.') }}"
                    autocomplete="address-line2"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#FF6B35] focus:border-transparent @error('address_line2') border-red-500 @enderror"
                >
                @error('address_line2')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="city" class="block text-sm font-medium text-gray-700 mb-2">
                        {{ __('City') }}
                    </label>
                    <input 
                        id="city" 
                        name="city" 
                        type="text" 
                        value="{{ old('city', $user->city) }}" 
                        autocomplete="address-level2"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#FF6B35] focus:border-transparent @error('city') border-red-500 @enderror"
                    >
                    @error('city')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="state" class="block text-sm font-medium text-gray-700 mb-2">
                        {{ __('State / Province') }} <span class="text-gray-400 text-xs">({{ __('Optional') }})</span>
                    </label>
                    <input 
                        id="state" 
                        name="state" 
                        type="text" 
                        value="{{ old('state', $user->state) }}" 
                        autocomplete="address-level1"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#FF6B35] focus:border-transparent @error('state') border-red-500 @enderror"
                    >
                    @error('state')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="postal_code" class="block text-sm font-medium text-gray-700 mb-2">
                        {{ __('Postal Code') }}
                    </label>
                    <input 
                        id="postal_code" 
                        name="postal_code" 
                        type="text" 
                        value="{{ old('postal_code', $user->postal_code) }}" 
                        autocomplete="postal-code"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#FF6B35] focus:border-transparent @error('postal_code') border-red-500 @enderror"
                    >
                    @error('postal_code')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="country" class="block text-sm font-medium text-gray-700 mb-2">
                        {{ __('Country') }}
                    </label>
                    <input 
                        id="country" 
                        name="country" 
                        type="text" 
                        value="{{ old('country', $user->country) }}" 
                        autocomplete="country-name"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#FF6B35] focus:border-transparent @error('country') border-red-500 @enderror"
                    >
                    @error('country')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <div class="flex items-center gap-4 pt-6 border-t">
            <button 
                type="submit"
                class="bg-[#FF6B35] text-white px-6 py-2 rounded-lg font-semibold hover:bg-[#FF8FA3] transition-colors focus:outline-none focus:ring-2 focus:ring-[#FF6B35] focus:ring-offset-2"
            >
                {{ __('Save Changes') }}
            </button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-600 font-medium"
                >{{ __('Bilgileriniz kaydedildi.') }}</p>
            @endif
        </div>
    </form>
</section>
