
  <div class="p-6 flex flex-col justify-between bg-white rounded-[20px] gap-[42px]">
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
        src="https://s3-alpha-sig.figma.com/img/7d7f/f84a/1fd4432d33eea1ed565eac0258877756?Expires=1717372800&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=DQBCoDPfeuzMbWywK2nWi6hCP4Qp81gLkdx-luEI7KzqNxj-xcqIwgCHN1fswZ3mRFy2w9hzcK5hAHt-cwxzbkuGoCcHeWOZB99yupRk8XjbXciJ8ItpmXUHU0tXngDRgTUZC3tmqJOg2nQ0oiUnwSJTipYZIUoCa4ZjvVkt3xlPAU3pPQHpAlxYUn8jGoQRWF-ggWbP6M4Mz~OT0mcnaUDahBZY6w9qiTxK66T6CMZvawUCfG9YvXGPM8gTmLwyc2O5yT3RmHVb6kzIy9aAe9jOdW~rRG8chHkhwY1eEtBZS-7gv0sf~59zBLHBcmDyjbrGwRaXAYbaM7X16nv0JQ__" alt="" 
        class="w-[48px] h-[48px] rounded-full object-cover"
      />
      <div class="flex flex-col gap-[3px]">
        <h1 class="font-semibold text-base  bg-custom-gradient bg-clip-text text-transparent">{{ $name }}</h1>
        <p class="font-semibold text-xs leading-[18px] text-secondary">Pelanggan</p>
      </div>
    </div>
  </div>