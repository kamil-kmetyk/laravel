<x-layouts.main>
  <div class="grid place-items-center h-screen">
    <div class="flex flex-col justify-center">

      <div class="block p-6 rounded-lg bg-white w-full">
        <form action="{{ route('login.post') }}" method="post" class="w-[250px]">
          @csrf

          <div class="grid grid-cols-1 mb-2 text-black">
            <div class="flex flex-col mb-2">
              <label for="login-mail">{{ __('E-Mail') }}</label>
              <input id="login-mail" type="text" name="email" value="{{ old('mail') }}" class="input-white">
            </div>

            <div class="flex flex-col mb-2">
              <label for="login-password">{{ __('Hasło') }}</label>
              <input id="login-password" type="password" name="password" value="" class="input-white">
            </div>

            <x-ui.validation-errors :errors="$errors"/>
          </div>

          <button type="submit" class="inline-block primary-button">{{ __('Zaloguj') }}</button>
          @if(1 == $setting)
            <a href="{{ route('registration') }}" class="inline-block primary-button">{{ __('Nowe konto') }}</a>
          @endif
        </form>
      </div>
    </div>
  </div>
</x-layouts.main>
