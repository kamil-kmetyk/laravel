  <div {{ $attributes->merge(['class' => 'dashboard-card flex flex-col w-full p-3']) }}>
    @if ('' !== $title)
      <div class="flex">
        <h3 class="font-extralight text-2xl">{{ $title }}</h3>
      </div>
    @endif

    @if ('' !== $stat)
      <div class="flex justify-end">
        <span class="font-thin text-6xl">{{ $stat }}</span>
      </div>
    @endif
  </div>
