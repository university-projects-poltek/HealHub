<!-- resources/views/pages/detail.blade.php -->
@extends('layouts.app')

@section('content')
<section id='product-detail'>
  <div class="absolute inset-0 bg-gradient-to-b from-[#5D5DB4] via-[#5D5DB4] to-[#3B3B5E] h-[426px]"></div>
  <div class="relative flex flex-col items-center">
    {{-- Product name --}}
    <div class="pt-8 space-y-4 w-full">
      <a class="mr-auto px-4 py-2 rounded-[4px] bg-[#E6EAF1] text-secondary text-base font-semibold"
        href="/skincare">{{ $product->category->name }}</a>
      <h1 class="font-semibold text-[55px] text-white leading-[82.5px]">
        {{ $product->name }}
      </h1>
    </div>


    {{-- image section --}}
    <div class="w-full h-[1070px]">
      <div class="absolute top-[280px] w-full ">
        <img
          src="https://s3-alpha-sig.figma.com/img/57f2/0290/48177419bfbc35077e359de7f015a426?Expires=1717372800&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=EIx-yFAtOgjGNZLAheemj~H-560APf-S2AizFzyaObXQCXZlGZnaIcZzlwYDOUGHZ2xLeE9nMmU8euHzkqePvkiB~fhhOFlfHrtP8vaCQaybpNgCkdXtBkQebMjWLKq8bq8RQ0VbNWfql806WFhrLhUMuikQz-LWim~fXAbBTjL0~aI-QDy9FPZPJCiqcjPuRPzZHbarVqxN0XxhET8KKxvzdSCRCYfM~KQwCHUhAJ3~7PSlDZVTbyOnKPAQha2vkOjhEpYJOx5XGbLx3OPBEjpjL5zhhu-CvhLCa-WWa72O5mLAwQZT3UDVUIEIaeQMr2IE0ntvNWUjLP-KNea~dQ__"
          alt="" class="w-full h-[500px] object-cover rounded-[20px] mb-8" />

        <div class="relative">
          <div class="flex gap-6 justify-start items-end">

            {{-- Overview --}}
            <div class="w-[710px] h-[496px] bg-white rounded-[20px] p-[30px] font-normal text-base text-secondary leading-[30px]">
              <h1 class="text-xl font-semibold mb-3 text-black">Overview</h1>
              <p>
                Face Scrub dari KAFH Skincare adalah eksfoliator revitalisasi yang dirancang untuk membersihkan dan
                meremajakan kulit dengan lembut. Diformulasikan dengan bahan-bahan alami dan teknologi perawatan kulit
                yang
                canggih, scrub wajah ini secara efektif mengangkat sel-sel kulit mati, minyak berlebih, dan kotoran,
                sehingga kulit terasa segar, halus, dan bercahaya.
              </p>

              <p class="my-8">Fitur utama dari Scrub Wajah KAFH Skincare meliputi:</p>

              <p>
                Pengelupasan Kulit yang Lembut: Lulur ini mengandung partikel-partikel halus yang mengelupas kulit
                dengan
                lembut, mendorong pergantian sel dan membuat kulit tampak lebih cerah.
              </p>
            </div>

            {{-- About apotek --}}
            <div class="w-[366px] h-[168px] flex flex-col gap-3 bg-white p-[30px]  rounded-[20px]">
              <a href="/" class="flex justify-between items-center">
                <div class="flex gap-3 items-center">
                  <img src="{{ asset('/svg/logo.svg') }}" alt="Logo">
                  <h1>Apotik Cahaya Garden</h1>
                </div>
                <img src="{{ asset('/images/arrow-right.png') }}" alt="Arrow right">
              </a>
              <p>Telah berdiri sejak 2019 menyajikan berbagai obat dan pengobatan bjps</p>
            </div>

            {{-- Price --}}
            <div class="absolute right-[52.5px] -top-[90px] w-[366px] h-[394px]  bg-custom-gradient p-[2px] rounded-[20px] ">
              <div class="flex flex-col justify-between gap-2 h-full p-[30px] rounded-[20px] w-full  bg-white ">
                <div class="flex flex-col gap-3">
                  <h1 class=" font-semibold text-4xl leading-[54px] bg-custom-gradient bg-clip-text text-transparent">
                    Rp {{ number_format($product->price) }}
                  </h1>

                  <div class="flex flex-col gap-[10px]">
                    <div class="flex gap-[10px]">
                      <img src="{{ asset('/svg/check.svg') }}" alt="">
                      <p class="text-secondary text-base">Hydro Balance</p>
                    </div>
                    <div class="flex gap-[10px]">
                      <img src="{{ asset('/svg/check.svg') }}" alt="">
                      <p class="text-secondary text-base">Brazilian coffe</p>
                    </div>
                    <div class="flex gap-[10px]">
                      <img src="{{ asset('/svg/check.svg') }}" alt="">
                      <p class="text-secondary text-base">Korean Gingseng</p>
                    </div>
                  </div>
                </div>

                <button
                  class="px-[20px] py-3 border rounded-[100px] bg-[#2D68F8] text-white text-base font-semibold text-center">
                  Check out
                </button>

              </div>
            </div>
          </div>
        </div>
      </div>

    </div>



    {{-- More Product --}}
    <div class="py-[102px]">
      <div class="flex flex-col gap-8">

        <h1 class="text-[#1E1E1E] font-semibold text-[32px] leading-[48px]">More Product</h1>
        <div class="flex gap-[22px]">
          {{-- Card Product --}}
          
          @foreach ($products as $moreProduct)
            <x-product-card name="{{ $moreProduct->name }}" price="Rp {{ number_format($moreProduct->price) }}" category="{{ $moreProduct->category->name }}" />
              
          @endforeach
          {{-- <x-product-card name="Descolagen - Pharos" price="Rp 10,000" category="Skincare" />
          <x-product-card name="Descolagen - Pharos" price="Rp 10,000" category="Skincare" />
          <x-product-card name="Descolagen - Pharos" price="Rp 10,000" category="Skincare" /> --}}
        </div>

      </div>
    </div>

    {{-- Customer review --}}
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

        <div class="flex flex-row gap-[20px] ml-auto pb-[75px] ">
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

  </div>
</section>
@endsection