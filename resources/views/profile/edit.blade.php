<x-app-layout>
  <x-slot name="appTitle">
    {{ __('Profile') }}
  </x-slot>

  <x-slot name="appName">
    <a
      href='/'
      class='hover:text-pop'>
      {{ __('Picks')}}
    </a>
  </x-slot>

  <x-slot name="pageName">
    {{ __('Profile') }}
  </x-slot>

    <div class="my-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 shadow dark:shadow-dark sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 shadow dark:shadow-dark sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            {{-- <div class="p-4 sm:p-8 bg-white shadow dark:shadow-dark sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div> --}}
        </div>
    </div>
</x-app-layout>
