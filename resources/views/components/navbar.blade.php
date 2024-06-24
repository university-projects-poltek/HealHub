<header class="hidden lg:block sticky top-0 left-0 right-0 z-50 bg-slate-600 bg-opacity-40 backdrop-blur ">
  <div class="flex-none relative text-sm leading-6 text-white">
    <nav class="mx-auto lg:max-w-screen-xl px-4 sm:px-6 lg:px-[75px]">
      <div class="flex justify-between items-center py-4">
        <a class="flex justify-center items-center" href="/">
          <img src="{{ asset('images/logo.png') }}" alt="Logo">
          <p class="text-xl font-bold ml-3 mr-2 border-gray-200 text-slate-100">Apotek Cahaya Garden</p>
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
                <a href="/products/category/{{ $category->slug }}"
                  class="flex gap-2 border border-[#414141] rounded-2xl p-4">
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
          @if (Auth::user())
          <div class="flex w-[150px] justify-end items-center gap-3">


            <a href="/cart"
              class="relative inline-flex items-center p-[9px] text-sm font-medium text-center text-white ">
              <img src="{{ asset('/images/shopping-cart.png') }}" alt="Cart" class="w-6 h-6">

              <span class="sr-only">cart</span>
              <div
                class="absolute inline-flex items-center justify-center w-5 h-5 text-[10px] font-bold text-white bg-red-500 border-2 border-white rounded-full -top-[-1px] -end-[-1px] dark:border-gray-900">
                2</div>
            </a>

            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown-profile" class="flex gap-3 items-center">
              @if (Auth::user()->avatar)
              <img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}" class="w-8 h-8 rounded-full ml-2">
              @else
              <img src="{{ asset('/images/user-placeholder.jpeg') }}" alt="{{ Auth::user()->email }}"
                class="w-8 h-8 rounded-full ml-2">
              @endif
            </button>
            <!-- Dropdown menu -->
            <div id="dropdown-profile"
              class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
              <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                <li>
                  <a href="/dashboard"
                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                </li>
                <li>
                  <a href="#"
                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                </li>
                <li>
                  <a href="#"
                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                </li>
                <li>
                  <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    @method('POST')
                    <button
                      class="block px-4 py-2 w-full text-start hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                      type="submit">Logout</button>
                  </form>
                </li>
              </ul>
            </div>
          </div>

          @else
          <a class="text-white focus:outline-none focus:ring-2 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5  mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
            href="{{ route('login') }}">
            Log in
          </a>
          <a class=" border border-white focus:outline-none text-white hover:text-black hover:bg-white transition-all duration-300 focus:ring-2 focus:ring-gray-100 font-medium rounded-xl text-sm px-4 py-2 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
            href="{{ route('register') }}">
            Sign up
          </a>
          @endif
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