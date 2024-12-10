<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Apotek Cahaya Garden</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#F6F7F9]">
  <x-navbar  />

  <main class="max-w-6xl mx-auto min-h-screen ">
    @yield('content')
  </main>

  <x-footer />
<script type="module">
  $(document).ready(function() {
    const $navbar = $('#navbar');

    $navbar.addClass('bg-primary')
  })
</script>
</body>

</html>
