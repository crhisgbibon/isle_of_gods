<x-app-layout>

  <x-slot name="appTitle">
    {{ __('Forgot') }}
  </x-slot>

  <x-slot name="appName">
    <a
      href='/'
      class='hover:text-pop'>
      {{ __('Isle of Gods')}}
    </a>
  </x-slot>

  <x-slot name="pageName">
    {{ __('Forgot') }}
  </x-slot>

    <x-auth-card>
      <div class="mb-4 text-sm text-gray-600 dark:text-gray-300">
        {{ __('Enter your email address and you will be emailed a password reset link that will allow you to choose a new one.') }}
      </div>

      <!-- Session Status -->
      <x-auth-session-status class="mb-4" :status="session('status')" />

      <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
          <x-input-label for="email" :value="__('Email:')" />

          <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />

          <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-evenly mt-4">
  
          <x-primary-button>
            {{ __('Email Password Reset Link') }}
          </x-primary-button>
        </div>

      </form>
    </x-auth-card>
</x-app-layout>
