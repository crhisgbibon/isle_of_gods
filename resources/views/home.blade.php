<x-app-layout>

  <x-slot name="appTitle">
    {{ __('Isle of Gods') }}
  </x-slot>

  <x-slot name="appName">
    {{ __('Isle of Gods') }}
  </x-slot>

  <x-slot name="pageName">
    {{ __('') }}
  </x-slot>

  @vite(['resources/js/game/test.js', ])

  <canvas id="gameCanvas"></canvas>

</x-app-layout>