<div class="w-[55%] mx-auto mt-5">
  <div class="grid grid-cols-4 gap-2 p-2">
    <x-ui.success/>

    <div class="col-span-2 flex flex-col mb-2 {{ $errors->has('email') ? 'is-invalid' : '' }}">
      <label for="user-mail">{{ __('E-Mail') }}</label>
      <input id="user-mail" type="text" name="email" value="{{ old('email', $user?->email) }}">
      {!! $errors->first('email', '<div class="form-error">:message</div>') !!}
    </div>

    <div class="col-span-2 flex flex-col mb-2 {{ $errors->has('type') ? 'is-invalid' : '' }}">
      <label for="acc-role">{{ __('Typ konta') }} {{ !$isEdit ? '*' : '' }}</label>
      <select id="acc-role" name="role">
        @foreach(\App\Models\Role::getSelectableRoles() as $role)
          <option value="{{ $role }}" @selected(old('role', $user?->role->role) == $role)>{{ mb_strtolower(\App\Models\Role::translateRole($role)) }}</option>
        @endforeach
      </select>
      {!! $errors->first('role', '<div class="form-error">:message</div>') !!}
    </div>

    <div class="col-span-2 flex flex-col mb-2 {{ $errors->has('password') ? 'is-invalid' : '' }}">
      <label for="user-password">{{ __('Hasło') }}</label>
      <input id="user-password" type="password" name="password" value="">
      @if ($isEdit)
        <input id="user-password-org" type="hidden" name="old_password" value="{{ $user->password }}">
      @endif
      {!! $errors->first('password', '<div class="form-error">:message</div>') !!}
    </div>

    <div class="col-span-2 flex flex-col mb-2 {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}">
      <label for="user-re-password">{{ __('Potwórz hasło') }}</label>
      <input id="user-re-password" type="password" name="password_confirmation" value="">
      {!! $errors->first('password_confirmation', '<div class="form-error">:message</div>') !!}
    </div>

    <div class="flex flex-col mb-2">
      <button type="submit" class="primary-button">{{ __('Zapisz') }}</button>
    </div>
  </div>
</div>
