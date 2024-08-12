<x-guest-layout>
  <x-authentication-card>
    <x-slot name="logo">
      <x-authentication-card-logo />
    </x-slot>
    <p class="text-center text-xl">{{ config('matt.nama_app') }} <br> Program Studi Akuakultur</p>
    <div class="text-center mb-4">
      @if (now()->lt(Carbon\Carbon::parse('2024-07-18 08:00:00')))
        Akan dibuka dalam<p id="mulai"></p>
      @elseif (now()->lt(Carbon\Carbon::parse('2024-07-18 23:50:00')))
        Akan berakhir dalam<p id="countdown"></p>
      @else
        Pendaftaran selesai
      @endif
    </div>

    <x-validation-errors class="mb-4" />
    @if (Session::has('success'))
      <p class="text-center text-green-600">Data Berhasil Disimpan</p>
    @endif

    @if (Carbon\Carbon::now()->between(Carbon\Carbon::parse('2024-07-18 08:00:00'),Carbon\Carbon::parse('2024-07-18 23:50:00')))
      <form method="POST" action="{{ route('createtahap3') }}">@csrf

          <div>
            <x-label for="nisn" value="{{ __('Masukan NISN') }}" />
            <x-input id="nisn" class="block mt-1 w-full" name="nisn" :value="old('nisn')" required autofocus
              autocomplete="username" />
          </div>

        <div class="flex items-center justify-end mt-4">
          @if (Route::has('password.request'))
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
              href="{{ route('password.request') }}">
              {{ __('Forgot your password?') }}
            </a>
          @endif

          <x-button class="ms-4">
            {{ __('Cari NISN') }}
          </x-button>
        </div>
      </form>
    @endif

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
    
    <script>
      function updateCountdown() {
        const now = new Date();
        const nowHour = now.getHours();
        const nowMinutes = now.getMinutes();
        const nowSeconds = now.getSeconds();

        let hoursUntilMidnight = 07 - nowHour;
        let minutesUntilMidnight = 59 - nowMinutes;
        let secondsUntilMidnight = 59 - nowSeconds;

        if (hoursUntilMidnight < 10) hoursUntilMidnight = '0' + hoursUntilMidnight;
        if (minutesUntilMidnight < 10) minutesUntilMidnight = '0' + minutesUntilMidnight;
        if (secondsUntilMidnight < 10) secondsUntilMidnight = '0' + secondsUntilMidnight;

        document.getElementById('mulai').textContent = hoursUntilMidnight + ':' + minutesUntilMidnight + ':' +
          secondsUntilMidnight;
      }

      setInterval(updateCountdown, 1000);
      updateCountdown();
    </script>
  </x-authentication-card>
</x-guest-layout>
