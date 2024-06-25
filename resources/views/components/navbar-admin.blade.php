<header class="hidden lg:block sticky top-0 left-0 right-0 z-10 bg-[#6E58ED]">
  <div class="flex-none relative text-sm leading-6 text-white">
    <nav class="mx-auto lg:max-w-screen-xl px-4 sm:px-6 lg:px-[75px]">
      <div class="flex justify-between gap-7 items-center py-4">
        <div class="flex gap-6 items-center">
          <a class="flex justify-center items-center" href="/">
            <img src="{{ asset('images/logo.png') }}" alt="Logo">
          </a>
          <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'font-bold' : '' }}">Dashboard</a>
          {{-- <a href="{{ route('admin.orders') }}" class="{{ request()->routeIs('admin.orders') ? 'font-bold' : '' }}">Orders</a>
          <a href="{{ route('admin.transactions') }}" class="{{ request()->routeIs('transactions') ? 'font-bold' : '' }}">Transaction</a> --}}
          <a href="{{ route('admin.products') }}" class="{{ request()->routeIs('admin.products') ? 'font-bold' : '' }}">Products</a>
        </div>
        <div class="flex items-center relative  gap-2">
          <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="flex gap-3 items-center">
            @if ($avatar)
            <img src="{{ $avatar }}" alt="{{ $email }}" class="w-8 h-8 rounded-full ml-2">
            @else
            <img src="{{ asset('/images/user-placeholder.jpeg') }}" alt="{{ $email }}"
              class="w-8 h-8 rounded-full ml-2">
            @endif
            <span class="text-base">{{ $username }}</span>
            <svg class="w-2.5 h-2.5 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
              viewBox="0 0 10 6">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 4 4 4-4" />
            </svg>
          </button>

          <!-- Dropdown menu -->
          <div id="dropdown"
            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
              <li>
                <a href="#"
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
                  <button class="block px-4 py-2 w-full text-start hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" type="submit">Logout</button>
              </form>
              </li>
            </ul>
          </div>

        </div>

      </div>

  </div>
  </nav>
  </div>
</header>