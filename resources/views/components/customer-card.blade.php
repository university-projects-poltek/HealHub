
  <div class="p-6 flex flex-col justify-between bg-white rounded-[20px] gap-[42px]" data-carousel-item>
    <div class="w-[372px] h-[170px] flex flex-col gap-4">
      <div class="flex gap-2">
        <img src="{{ asset('/svg/star.svg') }}" alt="Star">
        <img src="{{ asset('/svg/star.svg') }}" alt="Star">
        <img src="{{ asset('/svg/star.svg') }}" alt="Star">
        <img src="{{ asset('/svg/star.svg') }}" alt="Star">
        <img src="{{ asset('/svg/star.svg') }}" alt="Star">
      </div>
      <p class="font-normal text-base leading-[26px] text-[#131313]">
        {{ $description }}
      </p>
    </div>
    <div class="flex gap-[14px] w-[161px] h-[48px]">
      <img 
        src="{{ asset('images/dummy-customer.png') }}" alt="Customer review" 
        class="w-[48px] h-[48px] rounded-full object-cover"
      />
      <div class="flex flex-col gap-[3px]">
        <h1 class="font-semibold text-base  bg-custom-gradient bg-clip-text text-transparent">{{ $name }}</h1>
        <p class="font-semibold text-xs leading-[18px] text-secondary">Pelanggan</p>
      </div>
    </div>
  </div>