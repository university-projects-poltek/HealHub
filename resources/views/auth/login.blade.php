<html>

<head>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
  <div class="flex justify-center items-center min-h-screen">

    <form action="{{ route('login') }}" method="POST">
      @csrf
      @method('POST')
      <div  class="flex flex-col gap-2 w-[300px]">
        <input type="email" name="email" placeholder="Email">
        @error('email')
        <small>{{ $message }}</small>
        @enderror

        <input type="password" name="password" placeholder="password">

        @error('password')
        <small>{{ $message }}</small>
        @enderror
        <button type="submit" class="border border-slate-500  px-4 py-3">Sign In</button>
        <a href="{{ route('auth.google') }}" class="flex gap-2 justify-center items-center border border-slate-500  px-4 py-3">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS6WwgH7Nl5_AW9nDCnR2Ozb_AU3rkIbSJdAg&s" alt="" class="w-7 h-7">
          <p>Google</p>
        </a>
      </div>
    </form>
  </div>

</body>

</html>