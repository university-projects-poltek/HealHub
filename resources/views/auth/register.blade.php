<html>

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="flex justify-center items-center min-h-screen">

        <form action="{{ route('register') }}" method="POST">
            @csrf
            @method('POST')
            <div class="flex flex-col w-full gap-2">
                <input type="email" name="email" placeholder="Email" value="{{ old('email')}}">
                @error('email')
                    <small>{{ $message }}</small>
                @enderror

                <input type="text" name="username" placeholder="Username" value="{{ old('username')}}">
                @error('username')
                    <small>{{ $message }}</small>
                @enderror

                <input type="password" name="password" placeholder="password" value="{{ old('password')}}">

                @error('password')
                    <small>{{ $message }}</small>
                @enderror
                <button type="submit">Sign Up</button>
            </div>
        </form>
    </div>

</body>

</html>
