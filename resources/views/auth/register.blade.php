@extends('layouts.auth')
@section('content')
<div class="w-full max-w-md p-6 bg-white border border-gray-200 rounded-lg shadow-lg">
  <div class="flex items-center justify-center gap-3 mb-2">
    <img src="{{ asset('/svg/logo.svg') }}" width="30px" height="30px" alt="" />
    <h1 class="text-2xl font-bold text-center text-primary">
      Apotik Cahaya Garden
    </h1>
  </div>
  <h2 class="mb-6 text-xl font-semibold text-center">Daftar</h2>
  <form action="#" method="POST" action="{{ route('register') }}">
    @csrf
    @method('POST')
    <div class="mb-4">
      <input
        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary"
        type="text" id="username" name="username" placeholder="Username" />
      @error('username')
      <small class="text-red-600 mt-3">{{ $message }}</small>
      @enderror
    </div>
    <div class="mb-4">
      <input
        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary"
        type="email" id="email" name="email" placeholder="Email" />
      @error('email')
      <small class="text-red-600 mt-3">{{ $message }}</small>
      @enderror
    </div>
    <div class="mb-4">
      <input
        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary"
        type="password" id="password" name="password" placeholder="Kata sandi" />
      @error('password')
      <small class="text-red-600 mt-3">{{ $message }}</small>
      @enderror
    </div>
    <div class="mb-4">
      <input
        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary"
        type="password" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi kata sandi" />
      @error('password_confirmation')
      <small class="text-red-600 mt-3">{{ $message }}</small>
      @enderror
    </div>
    <div class="mb-6 flex items-center">
      <input type="checkbox" id="terms" name="terms"
        class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded" />
      <label for="terms" class="ml-2 block text-sm text-gray-900">Saya setuju dengan
        <a href="#" class="text-primary hover:underline">Syarat & Ketentuan</a></label>
    </div>
    <div class="flex items-center justify-center mb-4">
      <button
        class="w-full px-4 py-2 font-bold text-white bg-primary rounded-md hover:bg-primary hover:opacity-50 focus:outline-none focus:ring-2 focus:ring-primary"
        type="submit">
        REGISTRASI
      </button>
    </div>

    <div>
      <p class="text-center font-bold">atau</p>
    </div>

    <div class="text-center">
      <a href="{{ route('auth.google') }}"
        class="flex items-center justify-center w-full px-4 py-2 mt-4 font-bold text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-primary">
        <img class="w-4 h-4 mr-2" src="https://www.google.com/images/icons/product/search-32.gif" alt="Google Logo" />
        Daftar dengan Google
      </a>
    </div>

    <div class="text-center mt-4">
      <p>
        Sudah Punya Akun?
        <a href="{{ route('login') }}" class="text-primary hover:underline">MASUK</a>
      </p>
    </div>
  </form>
</div>
@endsection