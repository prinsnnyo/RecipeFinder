<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4 text-[#AA5486] font-medium" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="bg-white shadow-lg rounded-xl p-8 max-w-3xl border border-[#AA5486]">
        @csrf

        <!-- Email Address -->
        <div class="mb-4">
            <label for="email" class="flex items-center gap-2 text-[#AA5486] font-semibold font-serif">
                <i class="bi bi-envelope-fill text-[#AA5486]"></i> {{ __('Email') }}
            </label>            
            <x-text-input id="email" class="block mt-1 w-full bg-white dark:bg-white font-serif border-[#AA5486] focus:ring-[#AA5486] focus:border-[#AA5486] rounded-md"
                          placeholder="Email" 
                          type="email" name="email" 
                          :value="old('email')"
                          required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-500" />
        </div>

        <!-- Password -->
        <div class="mb-4">
            <label for="password" class="flex items-center gap-2 text-[#AA5486] font-semibold font-serif">
                <i class="bi bi-lock-fill text-[#AA5486]"></i> {{ __('Password') }}
            </label>            <x-text-input id="password" class="block mt-1 w-full bg-white dark:bg-white font-serif border-[#AA5486] focus:ring-[#AA5486] focus:border-[#AA5486] rounded-md"
                          type="password"
                          name="password"
                          placeholder="Password"
                          required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-500" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center mb-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-black-300 text-[#AA5486] shadow-sm focus:ring-[#AA5486]" name="remember">
                <span class="font-serif ml-2 text-sm text-gray-700 dark:text-black-300">{{ __('Remember me') }}</span>
            </label>
        </div>

        <!-- Buttons -->
        <div class="flex items-center justify-between">
            @if (Route::has('password.request'))
                <a class="font-serif font-semibold text-sm text-[#AA5486] hover:underline hover:text-[#933e6b] transition" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="bg-[#AA5486] hover:bg-[#933e6b] text-white px-4 py-2 rounded-md shadow-md transition">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
