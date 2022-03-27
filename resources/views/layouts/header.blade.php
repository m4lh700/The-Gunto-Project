<header class="md:h-2/3 overflow-hidden relative" x-data="{ navBarScroll: false }">

  <nav class="shadow dark:bg-gray-800 fixed w-screen text-white ease-in-out z-10" :class="{ 'bg-white text-black shadow transition duration-200' : navBarScroll }"
  @scroll.window="navBarScroll = (window.pageYOffset > 20) ? true : false">
  <div class="container flex flex-wrap justify-between items-center mx-auto">
    <a href="#" class="flex items-center">
      <span class="transition ease-in-out duration-100 uppercase font-bold self-center text-xl font-semibold whitespace-nowrap">The Gunto Project</span>
    </a>
    <button id="menu-btn" data-collapse-toggle="mobile-menu" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-black rounded-lg md:hidden">
      <span class="sr-only">Open main menu</span>
      <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
      <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
    </button>
    <div class="hidden w-full h-full md:block md:w-auto transition ease-in-out duration-100" id="mobile-menu">
      <!-- Menu items -->
      <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
        <!-- Nav item -->
        <li class="transition ease-in-out py-4  hover:bg-theme-black duration-100">
          <a href="{{ route('home') }}" class="text-xl block py-2 pr-4 pl-3 font-bold uppercase hover:text-teal-500"><x-heroicon-o-home class="w-6 h-6 mr-1 float-left"/>Home</a>
        </li>
        <!-- End Nav item -->
        <!-- Nav item -->
        <li class="transition ease-in-out py-4  hover:bg-theme-black duration-100">
          <a href="{{ route('indexsmiths') }}" class="text-xl block py-2 pr-4 pl-3 font-bold uppercase hover:text-teal-500"><x-heroicon-o-user class="w-6 h-6 mr-1 float-left"/>Smiths</a>
        </li>
        <!-- End Nav item -->
        <!-- Nav item -->
        <li class="transition ease-in-out py-4  hover:bg-theme-black duration-100">
          <a href="#skills" class="text-xl block py-2 pr-4 pl-3 font-bold uppercase hover:text-teal-500"><x-heroicon-o-search-circle class="w-6 h-6 mr-1 float-left"/>Research</a>
        </li>
        <!-- End Nav item -->
        <!-- Nav item -->
        <li class="transition ease-in-out py-4  hover:bg-theme-black duration-100">
          <a href="#resume" class="text-xl block py-2 pr-4 pl-3 font-bold uppercase hover:text-teal-500"><x-heroicon-o-book-open class="w-6 h-6 mr-1 float-left"/>Blog</a>
        </li>
        <!-- End Nav item -->
        @if(Auth::user())
        <!-- Nav item -->
        <div x-data="{ dropdownOpen: false }"  class="transition ease-in-out py-4  bg-theme-black h-full  hover:bg-theme-black duration-100">
            <button @click="dropdownOpen = ! dropdownOpen" class="block h-8 w-8 rounded-full overflow-hidden shadow focus:outline-none" aria-label="Account Knop">
                @if (Auth::user()->avatar)
                    <img class="h-full w-full object-cover" src="{{ Auth::user()->avatar }}" alt="User avatar">
                @else
                <svg xmlns="http://www.w3.org/2000/svg" class="h-full w-full object-cover" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
                </svg>
                @endif
            </button>

            <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"></div>

            <div x-show="dropdownOpen" class="absolute right-24 mt-6 w-48 bg-white rounded-md overflow-hidden shadow-xl z-10" style="display: none;">
                <a href="{{ route('dashboard') }}" class="block text-center px-4 py-2 text-sm text-gray-700 hover:bg-teal-500 hover:text-white">Dashboard</a>
                <a href="{{ route('profile.show') }}" class="block text-center px-4 py-2 text-sm text-gray-700 hover:bg-teal-500 hover:text-white">Profile</a>
                <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="block px-4 py-2 w-full text-sm text-gray-700 hover:bg-teal-500 hover:text-white">
                    {{ __('Log out') }}
                </button>
              </form>
            </div>
        </div>
        <!-- End Nav item -->
        @else
        <li class="transition ease-in-out py-4  bg-theme-black h-full  hover:bg-theme-black duration-100">
          <a href="{{ route('login') }}" class="text-xl block py-2 pr-4 pl-3 font-bold uppercase hover:text-teal-500"><x-heroicon-o-login class="w-6 h-6 mr-1 float-left"/>Log in</a>
        </li>
        @endif

      <!-- End Menu items -->
    </div>
  </div>
</nav>



</header>
