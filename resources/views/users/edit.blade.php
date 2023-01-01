<x-layouts.dashboard>
  <div class="dashboard-group-wrapper">
    <div class="dashboard-group-header">
      <span class="material-symbols-outlined">account_circle</span>
      <span>{{ __('Edycja użytkownika') }}</span>
    </div>

    <div class="lv-table-wrapper">
      @if(in_array($user->role->role, [\App\Models\Role::ROLE_APP, \App\Models\Role::ROLE_ROOT, \App\Models\Role::ROLE_ADMIN]))
        <p>Nie można edytować wybranego użytkownika.</p>
      @else
        <div class="container mx-auto">
          <form method="post" action="{{ route('users.edit.patch', ['user' => $user->id]) }}">
            @csrf @method('PATCH')
            @include('users.form', ['isEdit' => true])
          </form>
        </div>
      @endif
    </div>
  </div>
</x-layouts.dashboard>
