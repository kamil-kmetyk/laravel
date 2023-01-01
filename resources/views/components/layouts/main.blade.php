<!doctype html>
<html lang="pl" class="h-full">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta name="author" content="Dark Fox">
  <meta name="keywords" content="">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,600,0,0" />

  @vite(['resources/css/app.css'])
  @laravelViewsStyles

  <title>Laravel</title>
</head>
<body>
{{ $slot }}

@vite(['resources/js/app.js'])
@laravelViewsScripts
</body>
</html>
