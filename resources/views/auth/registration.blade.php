<x-layouts.main>
  <div class="grid place-items-center h-screen">
    <div class="flex flex-col justify-center">

      <div class="block p-6 rounded-lg bg-white w-full">
        <form action="{{ route('registration.post') }}" method="post" class="w-[250px]">
          @csrf

          <div class="grid grid-cols-1 mb-2 text-black">
            <div class="flex flex-col mb-2">
              <label for="reg-mail">{{ __('E-Mail') }}</label>
              <input id="reg-mail" type="email" name="email" value="{{ old('mail') }}" class="input-white">
            </div>

            <div class="flex flex-col mb-2">
              <label for="reg-password">{{ __('Hasło') }}</label>
              <input id="reg-password" type="password" name="password" value="" class="input-white">
            </div>

            <div class="flex flex-col mb-2">
              <label for="reg-re-password">{{ __('Powtórz hasło') }}</label>
              <input id="reg-re-password" type="password" name="password_confirmation" value="" class="input-white">
            </div>

            <x-ui.validation-errors :errors="$errors"/>
          </div>

          <button type="submit" class="inline-block primary-button">{{ __('Stwórz konto') }}</button>
          <a href="{{ route('login') }}" class="inline-block primary-button">{{ __('Wróć') }}</a>
        </form>
      </div>
    </div>
  </div>
</x-layouts.main>
