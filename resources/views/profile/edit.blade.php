@extends('layouts.app')

@section('title', 'Profile - CYPRUS EXPRESS')

@section('content')
    <!-- Page Header -->
    <section class="bg-white border-b py-8">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold text-gray-900">Profile Settings</h1>
        </div>
    </section>

    <!-- Profile Content -->
    <section class="py-8 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto space-y-6">
                <!-- Profile Information (includes address) -->
                <div class="bg-white shadow-sm rounded-lg p-6">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <!-- Update Password -->
                <div class="bg-white shadow-sm rounded-lg p-6">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <!-- Delete Account -->
                <div class="bg-white shadow-sm rounded-lg p-6">
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
