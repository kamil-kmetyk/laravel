<x-layouts.dashboard>
  <div class="dashboard-group-wrapper">
    <div class="dashboard-group-header">
      <span class="material-symbols-outlined">home</span>
      <span>{{ __('Strona Główna') }}</span>
    </div>

    <div class="dashboard-group-content">
      <div class="grid grid-cols-9 gap-2 flex items-center">
        <x-ui.rect-button icon="menu_book" :title="__('Opcja 1')" :route="route('dashboard')" />
      </div>
    </div>
  </div>

  <div class="dashboard-group-wrapper mt-4">
    <div class="dashboard-group-header">
      <span class="material-symbols-outlined">query_stats</span>
      <span>{{ __('Statystyki') }}</span>
    </div>

    <div class="dashboard-group-content">
    </div>
  </div>
</x-layouts.dashboard>
