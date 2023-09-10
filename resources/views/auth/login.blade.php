<x-app-layout>

  <x-slot name="appTitle">
    {{ __('Log In') }}
  </x-slot>

  <x-slot name="appName">
    <a
      href='/'
      class='hover:text-pop'>
      {{ __('Isle of Gods')}}
    </a>
  </x-slot>

  <x-slot name="pageName">
    {{ __('Log In') }}
  </x-slot>

  <x-auth-card>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
      @csrf

      <!-- Email Address -->
      <div>
        <x-input-label for="email" :value="__('Email')" />

        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />

        <x-input-error :messages="$errors->get('email')" class="mt-2" />
      </div>

      <!-- Password -->
      <div class="mt-4">
        <x-input-label for="password" :value="__('Password')" />

        <x-text-input id="password" class="block mt-1 w-full"
                        type="password"
                        name="password"
                        required autocomplete="current-password" />

        <x-input-error :messages="$errors->get('password')" class="mt-2" />
      </div>

      <!-- Remember Me -->
      <div class="block mt-4">
        <label for="remember_me" class="inline-flex items-center">
          <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-pop shadow-sm focus:ring-pop" name="remember">
          <span class="ml-2 text-sm text-gray-600 dark:text-gray-300">{{ __('Remember me') }}</span>
        </label>
      </div>

      <div class="flex items-center justify-evenly mt-4">

        <x-primary-button class="ml-3">
          {{ __('Log in') }}
        </x-primary-button>

      </div>
    </form>
  </x-auth-card>
</x-app-layout>
