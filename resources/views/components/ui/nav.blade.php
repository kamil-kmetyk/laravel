<nav id="app-navbar" class="fixed left-0 top-0 px-2 py-4 flex flex-col justify-between items-center w-full mx-auto sm:flex-row">
  <ul class="flex list-none nav-buttons py-2 sm:py-0">
    <li>
      <a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
    </li>
  </ul>

  <ul class="flex list-none nav-buttons items-center">
    @canany(['is-admin', 'is-root'])
      <li>
        <a href="{{ route('settings') }}" class="flex items-center">
          <span class="material-symbols-outlined font-bold">settings</span>
        </a>
      </li>
    @endcanany

    <li>
      <a href="{{ route('account') }}" class="flex items-center">
        <span class="material-symbols-outlined font-bold">account_circle</span>
      </a>
    </li>

    <li class="base-brightness">
      <a href="{{ route('logout') }}" class="flex items-center primary-button">
        <span class="material-symbols-outlined font-bold">logout</span>
        {{ __('Wyloguj') }}
      </a>
    </li>
  </ul>
</nav>
