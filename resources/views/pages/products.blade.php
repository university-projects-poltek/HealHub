@extends('layouts.app')
@section('content')
<section id="header" class="h-[280px] mb-[80px]">
    <div
        class="absolute flex justify-center inset-0 bg-gradient-to-b from-[#5D5DB4] via-[#5D5DB4] to-[#3B3B5E] h-[350px]">
        <img src="{{ asset('/images/banner.png') }}" alt="banner" class="w-full h-full" />
    </div>
    <div class="container max-w-[1130px] mx-auto flex flex-col items-center justify-center gap-[34px] z-10 h-[68%]">
        <div class="z-10 flex flex-col justify-center items-center h-full">
            <h1 class="font-medium text-[32px] text-white leading-[48px]">{{ $title }}</h1>
            <p class="text-[#DBCDFF] text-[20px] leading-[30px]">All Products</p>
        </div>
    </div>
</section>

<section class="flex flex-col mb-[100px]">
    <div class="grid grid-cols-4 gap-[22px]">
        @foreach ($products as $product)
        <x-product-card id=" {{ $product->id }}" name="{{ $product->name }}" image="{{ $product->image }}" price="Rp.{{
        number_format($product->price) }}" category="{{ $product->category->name }}" />
        @endforeach
    </div>

    <div class="flex justify-center items-center mt-[75px] ">
        <nav aria-label="Page navigation example">
            <ul class="flex items-center -space-x-px h-10 text-base">
                <li>
                    <a href="{{ $products->previousPageUrl() }}"
                        class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        <span class="sr-only">Previous</span>
                        <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 1 1 5l4 4" />
                        </svg>
                    </a>
                </li>

                @for ($i = 1; $i <= $products->lastPage(); $i++)
                    @if ($products->currentPage() <= 5 && $i <=5) <li>
                        <a href="{{ $products->url($i) }}"
                            class="{{ $products->currentPage() == $i ? 'text-blue-600 border border-blue-300 bg-blue-50' : 'text-gray-500' }} flex items-center justify-center px-4 h-10 leading-tight  bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">{{
                            $i }}</a>
                        </li>
                        @elseif ($products->currentPage() > 5 && $i > 5 && $i <= 10) <li>
                            <a href="{{ $products->url($i) }}"
                                class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">{{
                                $i }}</a>
                            </li>
                            @endif
                            @endfor



                <li>
                    <a href="{{ $products->nextPageUrl() }}"
                        class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        <span class="sr-only">Next</span>
                        <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 9 4-4-4-4" />
                        </svg>
                    </a>
                </li>
            </ul>
        </nav>

    </div>
</section>
<script type="module">
    $(document).ready(function() {

      @if (session('error'))
        alert("{{ session('error') }}");
      @endif

      @if (session('success'))
        alert("{{ session('success') }}");
      @endif

      const $navbar = $('#navbar');

      $navbar.addClass('blur-bg bg-transparent')

      $(window).on('scroll', function() {
        if ($(this).scrollTop() > 280) {
          $navbar.removeClass('blur-bg bg-transparent').addClass('bg-primary transition ease-in-out delay-150');
        } else {
          $navbar.removeClass('bg-primary').addClass('blur-bg bg-transparent transition ease-in-out delay-100');
        }
      });

    });

</script>
@endsection
