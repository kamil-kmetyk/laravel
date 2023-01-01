@if($message = Session::get('success'))
  <div class="col-span-4 flex justify-center w-full p-2 border rounded mb-5 border-green-900">
    <p class="text-sm text-green-500">{{ $message }}</p>
  </div>
@endif
