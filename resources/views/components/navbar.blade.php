<header class="hidden lg:block sticky top-0 left-0 right-0 z-50 bg-slate-700 bg-opacity-10 backdrop-blur">
  <div class="flex-none relative text-sm leading-6 text-white">
    <nav class="mx-auto lg:max-w-screen-xl px-4 sm:px-6 lg:px-[75px]">
      <div class="flex justify-between items-center py-4">
        <a class="flex justify-center items-center" href="/">
          <img src="{{ asset('images/logo.png') }}" alt="Logo">
          <p class="text-xl font-bold ml-3 mr-2 border-gray-200 text-slate-100">Apotik Cahaya Garden</p>
        </a>
        <div class="flex gap-5 items-center">

          <a href="/home" class="text-white leading-4 text-base">Home</a>
          <div class="categories-dropdown" id="categories-dropdown">
            <a href="#" class="flex items-center">
              Categories
              <svg class="w-2.5 h-2.5 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="m1 1 4 4 4-4" />
              </svg>
            </a>
            <div id="dropdown"
              class="dropdown absolute p-4 left-1/2 transform -translate-x-1/2 mt-8 hidden bg-white border border-[#414141] rounded-[20px] min-w-[526px] shadow-lg">
              <a href="/products"
                class="flex justify-between items-center border mb-2.5 border-[#414141] rounded-2xl w-full px-4 py-3">
                <div class="flex gap-2">
                  <img src="{{ asset('images/cart.png') }}" alt="Logo">
                  <div class="flex flex-col justify-center">
                    <h1 class="font-bold leading-[21px] text-sm text-[#1E1E1E]">Semua Produk</h1>
                    <p class="text-[#A0A0A0] text-xs">Semua Jenis produk</p>
                  </div>
                </div>
                <img src="{{ asset('images/crown.png') }}" alt="Logo">
              </a>

              <div class="grid grid-cols-2 gap-2">
                @foreach ($categories as $category)
                <a href="/products" class="flex gap-2 border border-[#414141] rounded-2xl p-4">
                  <img src="{{ asset('images/category.png') }}" alt="Logo">
                  <div class="flex flex-col justify-center">
                    <h1 class="font-bold leading-[21px] text-sm text-[#1E1E1E]">{{ $category->name }}</h1>
                    <p class="text-[#A0A0A0] text-xs">Semua Jenis produk</p>
                  </div>
                </a>
                @endforeach

              </div>
            </div>
          </div>
          <a href="#" class="">Stories</a>
          <a href="#" class="">Benefits</a>
          <a href="#" class="">About</a>

        </div>
        <div>
          <a class="text-white focus:outline-none focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5  mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
            href="/login">
            Log in
          </a>
          <a class=" border border-white focus:outline-none text-white hover:bg-black focus:ring-4 focus:ring-gray-100 font-medium rounded-xl text-sm px-4 py-2 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
            href="/signup">
            Sign up
          </a>
        </div>
      </div>
    </nav>
  </div>
</header>

<script>
  const dropdownToggle = document.querySelector('.categories-dropdown');
    const dropdown = document.querySelector('.dropdown');

    dropdownToggle.addEventListener('mouseenter', () => {
      dropdown.classList.remove('hidden');
    });

    dropdown.addEventListener('mouseleave', () => {
      dropdown.classList.add('hidden');
    });

    dropdown.addEventListener('mouseenter', () => {
      dropdown.classList.remove('hidden');
    });
</script>