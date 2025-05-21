<nav x-data="{ open: false }" class="bg-[#653450] text-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
            <a href="{{ route('dashboard') }}" style="font-size: 2.25rem; font-weight: 300; font-family: serif; text-decoration: none;">
    <span style="color: white;">RecipeFinder<span style="color:rgb(255, 255, 255);">.</span></span>
</a>

            </div>

            <!-- Auth Links or Dropdown -->
          <!-- Auth Links or Dropdown -->
<div class="hidden md:flex items-center space-x-6">
<a href="{{ route('dashboard') }}"
   class="text-sm font-bold transition-all duration-200 border-b-2 {{ request()->routeIs('dashboard') ? 'text-[#AA5486] border-white' : 'text-white border-transparent hover:text-[#AA5486] hover:border-[#AA5486]' }}">
    HOME
</a>

@auth
    <a href="{{ route('favorites.index') }}"
       class="text-sm font-bold transition-all duration-200 border-b-2 {{ request()->routeIs('favorites.index') ? 'text-[#AA5486] border-white' : 'text-white border-transparent hover:text-[#AA5486] hover:border-[#AA5486]' }}">
        FAVORITES
    </a>

    <a href="{{ route('meals.filter') }}"
       class="text-sm font-bold transition-all duration-200 border-b-2 {{ request()->routeIs('meals.filter') ? 'text-[#AA5486] border-white' : 'text-white border-transparent hover:text-[#AA5486] hover:border-[#AA5486]' }}">
        FILTER
    </a>





    <x-dropdown align="right" width="48">
    <x-slot name="trigger">
        <button class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-white bg-transparent border border-white rounded hover:bg-white hover:text-[rgb(255, 255, 255)] transition">
            <div>{{ Auth::user()->name }}</div>
            <svg class="w-4 h-4 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </button>
    </x-slot>

    <x-slot name="content">
    <x-dropdown-link :href="route('profile.edit')" class="text-gray-800 hover:bg-[#AA5486] hover:text-white">
    {{ __('Profile') }}
</x-dropdown-link>


        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="text-gray-800 hover:bg-[#AA5486] hover:text-white">
                {{ __('Log Out') }}
            </x-dropdown-link>
        </form>
    </x-slot>
</x-dropdown>

    @else
        <a href="{{ route('login') }}" class="text-sm text-white underline">Log in</a>
        <a href="{{ route('register') }}" class="text-sm text-white underline ms-4">Register</a>
    @endauth
</div>


            <!-- Hamburger Menu for Mobile -->
            <div class="flex items-center md:hidden">
                <button @click="open = ! open" class="text-white hover:text-white focus:outline-none">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Menu -->
                <!-- Sidebar Overlay -->
<div x-show="open"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     class="fixed inset-0 z-40 bg-black bg-opacity-50 md:hidden"
     @click="open = false">
</div>

<!-- Sidebar (Right-aligned) -->
<div x-show="open"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="translate-x-full"
     x-transition:enter-end="translate-x-0"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="translate-x-0"
     x-transition:leave-end="translate-x-full"
     class="fixed top-0 right-0 z-50 w-64 h-full bg-[#653450] text-white shadow-lg p-6 space-y-4 md:hidden"
     @click.away="open = false">

    <!-- Close Button and Logo -->
    <div class="flex justify-between items-center mb-6">
        <span class="text-2xl font-serif">RecipeFinder<span class="text-white">.</span></span>
        <button @click="open = false" class="text-white">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    <!-- Navigation Links -->
    <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
        class="text-white hover:bg-[#933e6b] hover:text-[#653450] px-3 py-2 rounded">
        <i class="fas fa-home me-2"></i>
        {{ __('Home') }}
    </x-responsive-nav-link>

    @auth
        <x-responsive-nav-link :href="route('favorites.index')" :active="request()->routeIs('favorites.index')"
            class="text-white hover:bg-[#933e6b] hover:text-[#653450] px-3 py-2 rounded">
           	<i class="fas fa-heart me-2"></i> {{ __('Favorites') }}
        </x-responsive-nav-link>

         <x-responsive-nav-link :href="route('meals.filter')" :active="request()->routeIs('meals.filter')"
            class="text-white hover:bg-[#933e6b] hover:text-[#653450] px-3 py-2 rounded">
           		<i class="fas fa-filter me-2"></i> {{ __('Filter') }}
        </x-responsive-nav-link>

        <x-responsive-nav-link :href="route('profile.edit')"
            class="text-white hover:bg-[#933e6b] hover:text-[#653450] px-3 py-2 rounded">
           	<i class="fas fa-user me-2"></i> {{ __('Profile') }}
        </x-responsive-nav-link>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-responsive-nav-link :href="route('logout')"
                onclick="event.preventDefault(); this.closest('form').submit();"
                class="text-white hover:bg-[#933e6b]hover:text-[#653450] px-3 py-2 rounded">
               	<i class="fas fa-sign-out-alt me-2"></i> {{ __('Log Out') }}
            </x-responsive-nav-link>
        </form>
    @else
        <a href="{{ route('login') }}" class="block text-sm underline">Log in</a>
        <a href="{{ route('register') }}" class="block text-sm underline">Register</a>
    @endauth
</div>

</nav>
