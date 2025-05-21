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
                    <div :class="{ 'block': open, 'hidden': !open }" class="md:hidden bg-[#653450] text-white px-4 py-4 space-y-2">
                    <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" 
        class="text-white hover:bg-white hover:text-[#653450] !important
">
        {{ __('Home') }}
    </x-responsive-nav-link>

    @auth
        <x-responsive-nav-link :href="route('favorites.index')" :active="request()->routeIs('favorites.index')" 
            class="text-white hover:bg-white hover:text-[#653450] !important
">
            {{ __('Favorites') }}
        </x-responsive-nav-link>

        <x-responsive-nav-link :href="route('profile.edit')" 
            class="text-white hover:bg-white hover:text-[#653450] !important
">
            {{ __('Profile') }}
        </x-responsive-nav-link>

         <form method="POST" action="{{ route('logout') }}">
        @csrf
        <x-responsive-nav-link :href="route('logout')" 
            onclick="event.preventDefault(); this.closest('form').submit();"
            class="text-white hover:bg-white hover:text-[#653450]">
            {{ __('Log Out') }}
        </x-responsive-nav-link>
    </form>

            </form>
        @else
            <a href="{{ route('login') }}" class="block text-sm underline">Log in</a>
            <a href="{{ route('register') }}" class="block text-sm underline">Register</a>
        @endauth
    </div>
</nav>
