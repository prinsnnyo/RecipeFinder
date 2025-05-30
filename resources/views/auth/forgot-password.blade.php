<x-guest-layout>
    <div class="mb-4 text-sm text-black-600 dark:text-black-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
        <label for="email" class="flex items-center gap-2 text-[#AA5486] font-semibold font-serif">
                <i class="bi bi-envelope-fill text-[#AA5486]"></i> {{ __('Email') }}
        </label>            
             <x-text-input id="email" class="block mt-1 w-full bg-white dark:bg-white font-serif border-[#AA5486] focus:ring-[#AA5486] focus:border-[#AA5486] rounded-md" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
