<x-guest-layout>
<form method="POST" action="{{ route('register') }}" class="bg-white shadow-lg rounded-xl p-8 max-w-3xl border border-[#AA5486]">
    @csrf

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Name -->
        <div>
            <label for="name" class="flex items-center gap-2 text-[#AA5486] font-semibold font-serif">
                <i class="bi bi-person-fill text-[#AA5486]"></i>{{ __('Name') }}
            </label>
            <x-text-input id="name" class="block mt-1 w-full bg-white dark:bg-white font-serif" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div>
            <label for="email" class="flex items-center gap-2 text-[#AA5486] font-semibold font-serif">
                <i class="bi bi-envelope-fill text-[#AA5486]"></i> {{ __('Email') }}
            </label>
            <x-text-input id="email" class="block mt-1 w-full bg-white dark:bg-white font-serif" 
                          placeholder="Email"
                          type="email" 
                          name="email" 
                          :value="old('email')" 
                          required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="flex items-center gap-2 text-[#AA5486] font-semibold font-serif">
                <i class="bi bi-lock-fill text-[#AA5486]"></i> {{ __('Password') }}
            </label>
            <x-text-input id="password" class="block mt-1 w-full bg-white dark:bg-white font-serif"
                          placeholder="Password"
                          type="password"
                          name="password"
                          required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation" class="flex items-center gap-2 text-[#AA5486] font-semibold font-serif">
                <i class="bi bi-lock-fill text-[#AA5486]"></i> {{ __('Confirm Password') }}
            </label>
            <x-text-input id="password_confirmation" class="block mt-1 w-full bg-white dark:bg-white font-serif"
                          placeholder="Confirm Password"
                          type="password"
                          name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
    </div>

    <div class="flex items-center justify-between">
        <a class="underline font-semibold font-serif text-sm text-[#AA5486] hover:underline hover:text-[#933e6b] transition" href="{{ route('login') }}">
            {{ __('Already registered?') }}
        </a>

        <x-primary-button class="ms-4 mt-4">
            {{ __('Register') }}
        </x-primary-button>
    </div>
</form>

</x-guest-layout>
