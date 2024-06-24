<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<!-- <html>

<body>
    <div class="flex justify-center items-center min-h-screen ">

        <form action="{{ route('register') }}" method="POST">
            @csrf
            @method('POST')
            <div class="flex flex-col gap-2 w-[300px]">
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
                <button type="submit" class="border border-slate-500  px-4 py-3">Sign Up</button>
                <a href="{{ route('auth.google') }}" class="flex gap-2 justify-center items-center border border-slate-500  px-4 py-3">
                  <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS6WwgH7Nl5_AW9nDCnR2Ozb_AU3rkIbSJdAg&s" alt="" class="w-7 h-7">
                  <p>Google</p>
                </a>
            </div>
        </form>
    </div>

</body>

</html> -->

<div class="flex items-center justify-center h-screen bg-gray-100">
    <div
        class="w-full max-w-md p-6 bg-white border border-gray-200 rounded-lg shadow-lg"
    >
        <div class="flex items-center justify-center gap-3 mb-2">
            <img
                src="{{ asset('/svg/logo.svg') }}"
                width="30px"
                height="30px"
                alt=""
            />
            <h1 class="text-2xl font-bold text-center text-primary">
                Apotik Cahaya Garden
            </h1>
        </div>
        <h2 class="mb-6 text-xl font-semibold text-center">Daftar</h2>
        <form action="#" method="POST">
            <div class="mb-4">
                <input
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary"
                    type="text"
                    id="nama"
                    name="nama"
                    placeholder="Nama"
                />
            </div>
            <div class="mb-4">
                <input
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary"
                    type="email"
                    id="email"
                    name="email"
                    placeholder="Email"
                />
            </div>
            <div class="mb-4">
                <input
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary"
                    type="password"
                    id="kata_sandi"
                    name="kata_sandi"
                    placeholder="Kata sandi"
                />
            </div>
            <div class="mb-4">
                <input
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary"
                    type="password"
                    id="konfirmasi_kata_sandi"
                    name="konfirmasi_kata_sandi"
                    placeholder="Konfirmasi kata sandi"
                />
            </div>
            <div class="mb-6 flex items-center">
                <input
                    type="checkbox"
                    id="terms"
                    name="terms"
                    class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded"
                />
                <label for="terms" class="ml-2 block text-sm text-gray-900"
                    >Saya setuju dengan
                    <a href="#" class="text-primary hover:underline"
                        >Syarat & Ketentuan</a
                    ></label
                >
            </div>
            <div class="flex items-center justify-center mb-4">
                <button
                    class="w-full px-4 py-2 font-bold text-white bg-primary rounded-md hover:bg-primary hover:opacity-50 focus:outline-none focus:ring-2 focus:ring-primary"
                    type="submit"
                >
                    REGISTRASI
                </button>
            </div>

            <div>
                <p class="text-center font-bold">atau</p>
            </div>

            <div class="text-center">
                <a
                    href="{{ route('auth.google') }}"
                    class="flex items-center justify-center w-full px-4 py-2 mt-4 font-bold text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-primary"
                >
                    <img
                        class="w-4 h-4 mr-2"
                        src="https://www.google.com/images/icons/product/search-32.gif"
                        alt="Google Logo"
                    />
                    Daftar dengan Google
                </a>
            </div>

            <div class="text-center mt-4">
                <p>
                    Sudah Punya Akun?
                    <a
                        href="{{ route('login') }}"
                        class="text-primary hover:underline"
                        >MASUK</a
                    >
                </p>
            </div>
        </form>
    </div>
</div>
