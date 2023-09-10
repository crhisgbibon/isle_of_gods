<x-app-layout>

  <x-slot name="appTitle">
    {{ __('Confirm Password') }}
  </x-slot>

  <x-slot name="appName">
    <a
      href='/'
      class='hover:text-pop'>
      {{ __('Isle of Gods')}}
    </a>
  </x-slot>

  <x-slot name="pageName">
    {{ __('Confirm Password') }}
  </x-slot>

    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600 dark:text-gray-300">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="flex justify-end mt-4">
                <x-primary-button>
                    {{ __('Confirm') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-app-layout>
