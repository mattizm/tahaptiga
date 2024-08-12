<x-guest-layout>
  <x-authentication-card>
    <x-slot name="logo">
      <x-authentication-card-logo />
    </x-slot>
    <h2 class="text-center">{{ config('matt.nama_app') }} <br> Program Studi Akuakultur</h2>
    <div class="text-center mb-4">
      @if (Carbon\Carbon::parse('2024-07-16 23:50:00')->lt(Carbon\Carbon::now()))
        Pendaftaran telah berakhir
      @else
        Pendaftaran akan berakhir dalam <p id="countdown"></p>
      @endif
    </div>

    <x-validation-errors class="mb-4" />

    @session('status')
      <div class="mb-4 font-medium text-sm text-green-600">
        {{ $value }}
      </div>
    @endsession

    <form method="POST" action="{{ route('login') }}">
      @csrf

      <div>
        <x-label for="email" value="{{ __('Nomor Peserta atau Email') }}" />
        <x-input id="email" class="block mt-1 w-full" name="email" :value="old('email')" required autofocus
          autocomplete="username" />
      </div>

      <div class="mt-4">
        <x-label for="password" value="{{ __('NISN') }}" />
        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
          autocomplete="current-password" />
      </div>

      <div class="block mt-4">
        <label for="remember_me" class="flex items-center">
          <x-checkbox id="remember_me" name="remember" />
          <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
        </label>
      </div>

      <div class="flex items-center justify-end mt-4">
        @if (Route::has('password.request'))
          <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
            href="{{ route('password.request') }}">
            {{ __('Forgot your password?') }}
          </a>
        @endif

        <x-button class="ms-4">
          {{ __('Log in') }}
        </x-button>
      </div>
    </form>

    <script>
      function updateCountdown() {
        const now = new Date();
        const nowHour = now.getHours();
        const nowMinutes = now.getMinutes();
        const nowSeconds = now.getSeconds();

        let hoursUntilMidnight = 23 - nowHour;
        let minutesUntilMidnight = 59 - nowMinutes;
        let secondsUntilMidnight = 59 - nowSeconds;

        if (hoursUntilMidnight < 10) hoursUntilMidnight = '0' + hoursUntilMidnight;
        if (minutesUntilMidnight < 10) minutesUntilMidnight = '0' + minutesUntilMidnight;
        if (secondsUntilMidnight < 10) secondsUntilMidnight = '0' + secondsUntilMidnight;

        document.getElementById('countdown').textContent = hoursUntilMidnight + ':' + minutesUntilMidnight + ':' +
          secondsUntilMidnight;
      }

      setInterval(updateCountdown, 1000);
      updateCountdown();
    </script>
  </x-authentication-card>
</x-guest-layout>
