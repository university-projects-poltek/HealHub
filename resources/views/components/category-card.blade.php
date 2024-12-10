<a href="/products/category/{{ $slug }}"
  class="group category-card w-fit h-fit p-[1px] border border-[#DADADA]  hover:border-blue-500 rounded-2xl bg-white transition-all duration-300">
  <div
    class="flex flex-col p-[18px] rounded-2xl w-[210px] bg-img-white-gradient group-active:bg-img-black transition-all duration-300">
    <div class="w-[58px] h-[58px] flex shrink-0 items-center justify-center">
      <img src="{{ asset('images/category.png') }}" alt="icon">
    </div>
    <div class="px-[6px] flex flex-col text-left">
      <p class="text-sm font-bold">{{ $name }}</p>
      <p class="text-xs text-[#A0A0A0]">Logo hijau </p>
    </div>
  </div>
</a>