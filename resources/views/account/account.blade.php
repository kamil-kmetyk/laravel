<x-layouts.dashboard>
  <div class="dashboard-group-wrapper">
    <div class="dashboard-group-header">
      <span class="material-symbols-outlined">account_circle</span>
      <span>{{ __('Ustawienia konta') }}</span>
    </div>

    <div class="container mx-auto">
      <form method="post" action="{{ route('account.edit') }}">
        @csrf @method('PATCH')
        @include('account.form')
      </form>
    </div>
  </div>
</x-layouts.dashboard>
