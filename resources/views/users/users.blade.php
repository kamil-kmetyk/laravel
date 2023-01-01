<x-layouts.dashboard>
  <div class="dashboard-group-wrapper">
    <div class="dashboard-group-header">
      <span class="material-symbols-outlined">group</span>
      <span>{{ __('Użytkownicy') }}</span>
    </div>

    <div class="lv-table-wrapper">
      @livewire('users-table-view')
    </div>
  </div>
</x-layouts.dashboard>
