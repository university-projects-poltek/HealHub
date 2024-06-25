<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Apotek Cahaya Garden</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-[#F6F7F9]">

  @if (Auth::check() && Auth::user()->role == 'admin' )
  <x-navbar-admin avatar="{{ Auth::user()->avatar }}" username="{{ Auth::user()->username }}"
    email="{{ Auth::user()->email }}" />
  @else
  <x-navbar-user avatar="{{ Auth::user()->avatar }}" username="{{ Auth::user()->username }}"
    email="{{ Auth::user()->email }}" />
  @endif

  <main class="max-w-6xl mx-auto mt-10 bg-white rounded-[10px] min-h-screen">
    <section class="px-16 py-8">
      @yield('content')
    </section>
  </main>

</body>

</html>