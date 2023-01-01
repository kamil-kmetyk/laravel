<x-layouts.dashboard>
  <form method="post" action="{{ route('settings.patch') }}">
    @csrf @method('PATCH')

    <div class="dashboard-group-wrapper">
      <div class="dashboard-group-header">
        <span class="material-symbols-outlined">settings</span>
        <span>{{ __('Ustawienia') }}</span>
      </div>

      <div class="container mx-auto w-1/2">
        <div class="dashboard-group-content grid-cols-1">
          <x-ui.success/>

          <div class="grid grid-cols-2 gap-2 flex items-center">
            <label for="set-registration-active" class="switch-label col-span-2 grid grid-cols-2 gap-2 justify-center">
              <input id="set-registration-active" type="checkbox" value="1" class="sr-only peer"
                     name="{{ \App\Models\Setting::REGISTRATION_ACTIVE }}"
                @checked(old(\App\Models\Setting::REGISTRATION_ACTIVE, $settings[\App\Models\Setting::REGISTRATION_ACTIVE]))
              >

              <span class="text-sm font-medium">{{ __('Rejestracja aktywna') }}</span>
              <span class="switch peer"></span>
            </label>
            {!! $errors->first(\App\Models\Setting::REGISTRATION_ACTIVE, '<div class="col-span-2 text-center"><div class="form-error">:message</div></div>') !!}
          </div>

        </div>
      </div>
    </div>

    <div class="text-center mt-2">
      <button type="submit" class="primary-button">{{ __('Zapisz') }}</button>
    </div>
  </form>
</x-layouts.dashboard>
