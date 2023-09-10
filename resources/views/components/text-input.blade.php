@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'text-stone-800 border-gray-300 focus:border-pop focus:ring-pop rounded-md shadow-sm']) !!}>
