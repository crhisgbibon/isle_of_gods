<nav x-data="{ open: false }" class="font-bevan antialiased bg-stone-800 text-gray-300 top-0" id='navigation'>
  <!-- Primary Navigation Menu -->
  <div class="mx-auto w-full border-b-4 border-pop box-border">

    <div class="flex flex-row items-center w-full justify-between sm:justify-center max-w-4xl mx-auto" style="min-height:calc(var(--vh) * 7.5)">
      
      <!-- Navigation Links -->

      <div class="mx-4 flex justify-start md:justify-center items-center h-full w-2/3 md:w-1/3">
        @if (isset($appName))
          {{ $appName }}
        @else
          {{ config('app.name', '') }}
        @endif
      </div>

      <div class="hidden md:flex min-w-40 w-1/3 ml-2 h-full justify-center items-center">
        @if (isset($pageName))
          {{ $pageName }}
        @else
          {{ config('app.name', '') }}
        @endif
      </div>

      <!-- Settings Dropdown -->
      <div class="hidden sm:flex sm:items-center sm:h-full justify-center items-center mr-2 w-1/3">

        <x-dropdown align="right" width="48">

          <x-slot name="trigger">
            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md hover:text-pop focus:outline-none transition ease-in-out duration-150">
              
              @auth
                <div class="truncate">{{ Auth::user()->name }}</div>
              @else
                <div>{{ __('Account') }}</div>
              @endauth

              <div class="ml-1">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
              </div>
            </button>
          </x-slot>

          @auth

            <x-slot name="content">

              <div class="border-b-4 border-pop">

                <x-dropdown-link class="" :href="url('/')" :active="request()->routeIs('/')">
                  {{ __('Home') }}
                </x-dropdown-link>

                <x-dropdown-link class="" :href="url('/american_football')" :active="request()->routeIs('nfl_pick_index')">
                  {{ __('American Football') }}
                </x-dropdown-link>

              </div>

              <x-dropdown-link class='dark_mode'>
                {{ __('Theme') }}
              </x-dropdown-link>

              <x-dropdown-link :href="route('profile.edit')">
                {{ __('Profile') }}
              </x-dropdown-link>

              <!-- Authentication -->
              <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-dropdown-link :href="route('logout')"
                                  onclick="event.preventDefault();
                                  this.closest('form').submit();">
                  {{ __('Log Out') }}
                </x-dropdown-link>
              </form>
            </x-slot>

          @else

            <x-slot name="content">

              <div class="border-b-4 border-pop">

                <x-dropdown-link class="" :href="url('/')" :active="request()->routeIs('/')">
                  {{ __('Home') }}
                </x-dropdown-link>

              </div>

              <x-dropdown-link class='dark_mode'>
                {{ __('Theme') }}
              </x-dropdown-link>

              <x-dropdown-link :href="route('login')">
                  {{ __('Log In') }}
              </x-dropdown-link>

              @if (Route::has('register'))
                <x-dropdown-link :href="route('register')">
                  {{ __('Register') }}
                </x-dropdown-link>
              @endif

              @if (Route::has('password.request'))
                <x-dropdown-link :href="route('password.request')">
                  {{ __('Reset Password') }}
                </x-dropdown-link>
              @endif

            </x-slot>

          @endauth

        </x-dropdown>
      </div>

      <!-- Hamburger -->
      <div class="mr-2 flex items-center justify-end sm:hidden">
        <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md hover:text-gray-300 hover:bg-stone-800 focus:outline-none focus:bg-stone-800 focus:text-gray-300 transition duration-150 ease-in-out">
          <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M4 6h16M4 12h16M4 18h16" />
            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
    </div>
  </div>

  <!-- Responsive Navigation Menu -->
  <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden absolute z-10 w-full bg-stone-800 text-gray-300">
    
    <div class="pt-2 pb-3 space-y-1 border-b-4 border-pop">

      <x-responsive-nav-link :href="url('/')" :active="request()->routeIs('/')">
        {{ __('Home') }}
      </x-responsive-nav-link>

      @auth

        <x-responsive-nav-link :href="url('/american_football')" :active="request()->routeIs('/')">
          {{ __('American Football') }}
        </x-responsive-nav-link>

      @endauth

    </div>

    <!-- Responsive Settings Options -->
    <div class="pt-4 pb-1 border-b-4 border-pop">


      @auth

      <div class="px-4">
        <div class="font-medium truncate text-stone-300">{{ Auth::user()->name }}</div>
      </div>

      <div class="mt-3 space-y-1">

        <x-responsive-nav-link class='dark_mode'>
          {{ __('Theme') }}
        </x-response-nav-link>

        <x-responsive-nav-link :href="route('profile.edit')">
          {{ __('Profile') }}
        </x-response-nav-link>

        <!-- Authentication -->
        <form method="POST" action="{{ route('logout') }}">
          @csrf

          <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                this.closest('form').submit();">
            {{ __('Log Out') }}
          </x-responsive-nav-link>
        </form>
      </div>

      @else

        <x-responsive-nav-link class='dark_mode'>
          {{ __('Theme') }}
        </x-responsive-nav-link>

        <x-responsive-nav-link :href="route('login')">
          {{ __('Log In') }}
        </x-responsive-nav-link>

        @if (Route::has('register'))
          <x-responsive-nav-link :href="route('register')">
            {{ __('Register') }}
          </x-responsive-nav-link>
        @endif

        @if (Route::has('password.request'))
          <x-responsive-nav-link :href="route('password.request')">
            {{ __('Reset Password') }}
          </x-responsive-nav-link>
        @endif

      @endauth


    </div>
  </div>
</nav>
