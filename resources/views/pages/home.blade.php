@extends('layouts.app')
@section('content')

<section id="header" class="h-[400px]">
    <div
        class="absolute flex justify-center inset-0 bg-gradient-to-b from-[#5D5DB4] via-[#5D5DB4] to-[#3B3B5E] h-[426px]">
        <img src="{{ asset('/images/banner.png') }}" alt="banner" class="w-full h-[426px]" />

    </div>
    <div class="container max-w-[1130px] mx-auto flex flex-col items-center justify-center gap-[34px] z-10">
        <div class="z-10 flex flex-col gap-2 mt-20 text-center w-fit">
            <h1 class="font-semibold text-white w-[1312px] text-[48px] leading-[62px]">Kami Peduli Dengan Kesehatan Anda
            </h1>
            <p class="text-lg text-[#DEDEDE] leading-[27px]">Jelajahi beragam produk farmasi, suplemen, dan produk
                perawatan
                kesehatan berkualitas tinggi.</p>
        </div>
        <div class="relative w-[560px] ">
            <input type="text" id="search-input"
                class="w-full text-white py-4 pl-12 pr-4 bg-transparent border border-gray-300 rounded-[100px] focus:outline-none  focus:ring-2 focus:ring-blue-500 hover:border-blue-500 hover:border-1 transition-all duration-200 hover:cursor-pointer focus:cursor-text placeholder:text-white"
                placeholder="Type anything to search...">
            <img src="{{ asset('/svg/search.svg') }}" alt="Search"
                class="absolute left-2 top-1/2 transform -translate-y-1/2 cursor-pointer" id="search-icon">


        </div>
    </div>
</section>
<section id="Category" class="container max-w-[1130px] mx-auto mb-[102px] flex flex-col gap-8">
    <h2 class="font-semibold text-[32px] mt-4 ">Kategori</h2>
    <div class="grid grid-cols-5 gap-[20px]">
        <a href="/products"
            class="group category-card w-fit h-fit p-[1px] border border-[#DADADA]  hover:border-blue-500 rounded-2xl bg-white transition-all duration-300">
            <div
                class="flex flex-col p-[18px] rounded-2xl w-[210px] bg-img-white-gradient group-active:bg-img-black transition-all duration-300">
                <div class="w-[58px] h-[58px] flex shrink-0 items-center justify-center">
                    <img src="{{ asset('images/cart.png') }}" alt="icon">
                </div>
                <div class="px-[6px] flex flex-col text-left">
                    <h1 class="text-sm font-bold">Semua Produk</h1>
                    <p class="text-xs text-[#A0A0A0]">Semua Jenis produk</p>
                </div>
            </div>
        </a>
        @foreach ($categories as $category)
        <x-category-card name="{{ $category->name }}" slug="{{ $category->slug }}" />
        @endforeach

    </div>
</section>

<section id="NewProduct" class="container max-w-[1130px] mx-auto mb-[102px] flex flex-col gap-8">
    <h2 class="font-semibold text-[32px]">Produk Baru</h2>
    <div class="grid grid-cols-4 gap-[22px]">
        @foreach ($newProducts as $newProduct)
        <x-product-card id="{{ $newProduct->id }}" name="{{ $newProduct->name }}"
            price="Rp. {{ number_format($newProduct->price) }}" category="{{ $newProduct->category->name }}"
            image="{{ $newProduct->image }}" />
        @endforeach


    </div>
</section>

<div class="pb-4">
    <div class="flex flex-col gap-8 max-w-6xl overflow-hidden">
        <div class=" flex justify-between items-center">

            <div class="w-[358px] h-[96px]">
                <h1 class="font-semibold text-[32px] leading-[48px]">
                    Customers Are Happy
                    With Our Products
                </h1>
            </div>

            <div class="flex gap-[14px]">
                <button>
                    <img src="{{ asset('/svg/left-arrow.svg') }}" alt="">
                </button>
                <button>
                    <img src="{{ asset('/svg/right-arrow.svg') }}" alt="">
                </button>
            </div>
        </div>

        <div class="flex flex-row gap-[20px] ml-auto pb-[75px] overflow-x-auto">
            <x-customer-card name="Sarah Lopez"
                description="Saya sangat terkesan dengan efektivitas obat ini! Hanya dalam beberapa hari penggunaan, saya merasakan perubahan yang signifikan dalam kondisi kesehatan saya. Terima kasih banyak" />
            <x-customer-card name="Sarah Lopez"
                description="Saya sangat terkesan dengan efektivitas obat ini! Hanya dalam beberapa hari penggunaan, saya merasakan perubahan yang signifikan dalam kondisi kesehatan saya. Terima kasih banyak" />
            <x-customer-card name="Sarah Lopez"
                description="Saya sangat terkesan dengan efektivitas obat ini! Hanya dalam beberapa hari penggunaan, saya merasakan perubahan yang signifikan dalam kondisi kesehatan saya. Terima kasih banyak" />
            <x-customer-card name="Sarah Lopez"
                description="Saya sangat terkesan dengan efektivitas obat ini! Hanya dalam beberapa hari penggunaan, saya merasakan perubahan yang signifikan dalam kondisi kesehatan saya. Terima kasih banyak" />
        </div>

    </div>

</div>

<section id="Tool" class="mb-[102px] flex flex-col gap-8">
    <div class="container max-w-[1130px] mx-auto flex justify-between items-center">
        <h2 class="font-semibold text-[32px]">Bekerja Sama Dengan Kami</h2>
    </div>
    <div class="flex flex-col w-full gap-5 overflow-hidden tools-logos">
        <div class="flex items-center group/slider flex-nowrap w-max">
            <div id="carousel" class="flex gap-5 pl-5 items-center flex-nowrap">
                @foreach($items as $item)
                <a href=""
                    class="group tool-card w-fit h-fit p-[1px] bg-white hover:text-white hover:bg-[#142650] rounded-full bg-img-transparent  transition-all duration-300">
                    <div
                        class="w-[300px] h-[100px] rounded-full p-[18px_24px] bg-img-white-gradient  group-active:bg-img-black transition-all duration-300 flex gap-4 items-center shrink-0">
                        <div class="flex w-16 h-16 overflow-hidden shrink-0">
                            <img src="{{ asset($item['image']) }}" class="object-contain w-full h-full" alt="logo">
                        </div>
                        <div class="flex flex-col justify-center gap-1">
                            <p class="text-lg font-bold">{{ $item['title'] }}</p>
                            <p class="font-semibold text-xs leading-[170%]">{{ $item['description'] }}</p>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
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
      if ($(this).scrollTop() > 320) {
        $navbar.removeClass('blur-bg bg-transparent').addClass('bg-primary transition ease-in-out delay-150');
      } else {
        $navbar.removeClass('bg-primary').addClass('blur-bg bg-transparent transition ease-in-out delay-100');
      }
    });

  });

</script>
@endsection
