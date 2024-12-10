@extends('layouts.auth')
@section('content')
<div class="w-full max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-lg">
  <div class="flex items-center gap-3 mb-2">
    <img src="{{ asset('/svg/logo.svg') }}" width="30px" height="30px" alt="" />
    <h1 class="text-2xl font-bold text-center text-[#6E58ED]">
      Apotik Cahaya Garden
    </h1>
  </div>
  <h2 class="mb-3 text-xl font-semibold text-center">Masuk</h2>
  <form action="{{ route('login') }}" method="POST">
    @csrf @method('POST')
    <div class="mb-4">
      <label class="block mb-2 text-sm font-medium text-gray-700" for="email">Email</label>
      <input
        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary"
        type="email" id="email" name="email" placeholder="mymail@gmail.com" />
      @error('email')
      <small class="text-red-600 mt-3">{{ $message }}</small>
      @enderror
    </div>

    <div class="mb-3">
      <label class="block mb-2 text-sm font-medium text-gray-700" for="password">Kata Sandi</label>
      <input
        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary"
        type="password" id="password" name="password" placeholder="********" />
      @error('password')
      <small class="text-red-600 mt-3">{{ $message }}</small>
      @enderror
    </div>

    <div class="text-right my-3">
      <a class="text-sm text-primary hover:underline" href="{{ route('register') }}">Daftar</a>
    </div>
    <div class="flex items-center justify-between mb-6">
      <button
        class="w-full px-4 py-2 font-bold text-white bg-primary rounded-md hover:bg-primary hover:opacity-50 focus:outline-none focus:ring-2 focus:ring-primary"
        type="submit">
        MASUK
      </button>
    </div>

    <div>
      <p class="text-center font-bold">atau</p>
    </div>

    <div class="text-center">
      <a href="{{ route('auth.google') }}"
        class="flex items-center justify-center w-full px-4 py-2 mt-4 font-bold text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-primary">
        <img class="w-4 h-4 mr-2" src="https://www.google.com/images/icons/product/search-32.gif" alt="Google Logo" />
        Masuk dengan Google
      </a>
    </div>
  </form>
</div>

@endsection