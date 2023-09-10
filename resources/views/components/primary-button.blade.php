<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex justify-center items-center px-4 py-2 bg-stone-800 dark:bg-stone-300 border border-transparent rounded-md font-semibold text-xs text-white dark:text-stone-800 uppercase tracking-widest hover:bg-stone-500 dark:hover:bg-stone-500 focus:bg-stone-700 active:bg-stone-900 focus:outline-none focus:ring-2 focus:ring-pop focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
