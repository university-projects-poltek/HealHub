<html>

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="flex justify-center items-center min-h-screen">

        <form action="{{ route('login') }}" method="POST">
            @csrf
            @method('POST')
            <div>
                <input type="email" name="email" placeholder="Email">
                @error('email')
                    <small>{{ $message }}</small>
                @enderror

                <input type="password" name="password" placeholder="password">

                @error('password')
                    <small>{{ $message }}</small>
                @enderror
                <button type="submit">Sign In</button>
            </div>
        </form>
    </div>

</body>

</html>
