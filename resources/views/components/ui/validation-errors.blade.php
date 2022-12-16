@props(['errors'])

@if ($errors->any())
  <div {{ $attributes }}>
    <ul class="text-red-600 list-none text-xs">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif