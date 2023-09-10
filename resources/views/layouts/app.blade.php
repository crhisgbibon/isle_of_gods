<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
      @if (isset($appTitle))
        {{ $appTitle }}
      @else
        {{ config('app.name', 'crhisgbibon') }}
      @endif
    </title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bevan&display=swap" rel="stylesheet">

    <!-- Add ins -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>

    <!-- Scripts -->
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/vh.js'])
  </head>
  
    <body class="font-bevan antialiased bg-stone-50 text-blackmod dark:bg-stone-800 dark:text-gray-300">

      <div class="min-h-screen">
        
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
          <header class="box-border border-b border-gray-100 box-border" id="topControl" style="min-height:calc(var(--vh) * 7.5)">
            {{ $header }}
          </header>
        @endif

        <!-- Page Content -->
        <main class="antialiased">
          {{ $slot }}
        </main>
      </div>

      @livewireScriptConfig

    </body>
</html>