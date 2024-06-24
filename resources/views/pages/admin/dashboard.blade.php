@extends('layouts.dashboard')

@section('content')
  <section class="flex flex-col gap-10">
    <h1 class="font-semibold text-[32px] text-[#6E58ED] leading-[48px]">Overview </h1>
    <div class="mx-10 grid grid-cols-3 gap-5">
      <div class="py-4 px-6 flex flex-col rounded-md shadow-lg gap-7">
        <h1 class="font-medium text-[16px] leading-[27px] text-[#A0A0A0]">Total Product</h1>
        <span class="font-semibold text-[32px] leading-[48px]">{{ $totalProducts }}</span>
      </div>
      <div class="py-4 px-6 flex flex-col rounded-md shadow-lg gap-7">
        <h1 class="font-medium text-[16px] leading-[27px] text-[#A0A0A0]">Total Order</h1>
        <span class="font-semibold text-[32px] leading-[48px]">0</span>
      </div>
      <div class="py-4 px-6 flex flex-col rounded-md shadow-lg gap-7">
        <h1 class="font-medium text-[16px] leading-[27px] text-[#A0A0A0]">Total Income</h1>
        <span class="font-semibold text-[32px] leading-[48px]">Rp. 0</span>
      </div>
    </div>
  </section>
@endsection