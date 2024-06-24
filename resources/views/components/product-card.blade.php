<a href="/products/{{ $id }}" class="w-[266px] h-[280px] rounded-2xl bg-white z-10 border border-[#DADADA] hover:border-blue-500  overflow-hidden transition-all duration-300">
  <div class="relative">
    <img src="https://via.placeholder.com/200x300" alt="" class="w-full h-[180px] rounded-t-2xl object-cover">
    <p href="/skincare" class="absolute px-2 py-1 rounded-[4px] text-white top-3 right-[14px] bg-gray-900 bg-opacity-50 backdrop-filter backdrop-blur-lg text-xs leading-[18px] font-semibold">{{ $price }}</p>
  </div>
  <div class="px-[14px] pb-[14px] pt-[10px] flex flex-col justify-between gap-1">
    <div class="w-[238px] h-[48px]">
      <h1 class="font-semibold text-base">{{ $name }}</h1>
    </div>
    <p class="py-1 px-[6px] rounded-[4px] bg-[#F6F7F9] text-[#90A3BF] text-xs mr-auto leading-[18px]">{{ $category }}</p>
  </div>

</a>