<button {{ $attributes->merge(['type' => 'submit', 'class' => 'font-serif bg-[#AA5486] hover:bg-[#933e6b] text-white px-4 py-2 rounded-md shadow-md transition flex items-center gap-2']) }}>
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 16l4-4m0 0l-4-4m4 4H3m13 4v1a2 2 0 002 2h3a2 2 0 002-2V7a2 2 0 00-2-2h-3a2 2 0 00-2 2v1" />
    </svg>
    {{ $slot }}
</button>
