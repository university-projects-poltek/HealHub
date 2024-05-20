<html>
  <head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>
  <body>
    <div class="flex justify-center items-center min-h-screen">
      <div class="p-5 bg-blue-400">
        @if(session()->has('success'))
          <div>{{ session('success') }}</div>
        @endif
        @if(session()->has('loginError'))
          <div>{{ session('loginError') }}</div>
        @endif
        <h1 class="text-2xl font-bold text-white pb-5">Login</h1>
        <form action="/login" method="POST" class="flex flex-col gap-4">
          @csrf 
          <div class="flex gap-4">
            <label for="email">Email</label>
            <input type="email" name="email" required value="{{ old('email') }}">
            @error('email')
              <div class="text-2xl text-red-500">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="flex gap-4">
            <label for="password">Password</label>
            <input type="text" name="password" required value="{{ old('password') }}">
            @error('password')
              <div class="text-2xl text-red-500">
                {{ $message }}
              </div>
            @enderror
          </div>
          <p>Don't have account?<a href="/register" class="font-bold text-white hover:underline ms-1">Register</a></p>
          <button type="submit" class="bg-white text-blue-600 font-bold rounded-lg">Submit</button>
        </form>
      </div>
    </div>
    
  </body>
</html>

