<x-guest-layout>
    <!-- Header -->
    <div class="mb-6 text-center">
        <h2 class="font-bold text-blue-600 text-2xl">Admin Desa Haria</h2>
        <p class="mt-1 text-gray-600 text-sm">Silakan login untuk mengakses dashboard administrasi</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="admin@desaharia.id" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" 
                            placeholder="••••••••" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="shadow-sm border-gray-300 rounded focus:ring-blue-500 text-blue-600" name="remember">
                <span class="ms-2 text-gray-600 text-sm">{{ __('Ingat Saya') }}</span>
            </label>
        </div>

        <div class="flex justify-end items-center mt-4">
            @if (Route::has('password.request'))
                <a class="rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 text-gray-600 hover:text-gray-900 text-sm underline" href="{{ route('password.request') }}">
                    {{ __('Lupa Password?') }}
                </a>
            @endif

            <x-primary-button class="bg-blue-600 hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-800 ms-3">
                {{ __('Masuk') }}
            </x-primary-button>
        </div>
    </form>

    <div class="mt-6 text-gray-500 text-xs text-center">
        <p>© 2026 Desa Haria, Saparua - Maluku Tengah</p>
    </div>
</x-guest-layout>
