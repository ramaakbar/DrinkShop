<header class="bg-white border-b  ">
    <div class="container px-6 md:px-10  py-3 mx-auto space-y-0 flex items-center justify-between space-x-3  sm:max-w-6xl ">
        <div class="font-bold text-xl">
            <a href="/"> DrinkShop<span class="text-purple-500">.</span></a>
        </div>
        {{-- <div class="hidden w-2/4  lg:flex lg:flex-row">
            <input type="text" name="search" placeholder="Search"
                class="px-4 py-2 w-full rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200">
            <button class="relative right-9"><svg class="text-gray-600 h-4 w-4 fill-current"
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                    id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966"
                    style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px" height="512px">
                    <path
                        d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                </svg></button>
        </div> --}}

        <nav class="hidden space-x-6 md:flex">
            @foreach ($navbar as $name => $url)
                <a class="text-gray-500  py-2  hover:text-gray-800 " href={{ $url }}>{{ $name }}</a>
            @endforeach
            <a class="flex items-center px-4 text-gray-500 hover:text-gray-800 " href="/cart">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>

            </a>
            @auth
                <div class="relative group my-auto text-center">
                    <img src="{{ asset('assets/user.png') }}" width="30px" alt="">


                    {{-- {{ auth()->user()->name }}
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                        aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg> --}}
                    <ul
                        class="dropdown-menu absolute text-left right-0.5  group-hover:block hidden shadow-lg text-gray-700 ">
                        <li class="rounded-t border-b bg-white  py-2 px-4 block whitespace-no-wrap">
                            {{ auth()->user()->is_admin ? 'Admin' : auth()->user()->name }}</li>
                        {{-- User --}}
                        @if (auth()->user()->is_admin == false)
                            <li class="">
                                <a href="/transactions" class="bg-white hover:bg-gray-100 py-2 px-4 block whitespace-no-wrap"
                                    href="#">Transactions list</a>
                            </li>
                            
                        @else
                            <li class="">
                                <a class="bg-white hover:bg-gray-100 py-2 px-4 block whitespace-no-wrap" href="/drinks/create">Insert
                                    Product</a>
                            </li>
                        @endif
                        <li class="">
                            <form action="/logout" method="post">
                                @csrf
                                <button
                                    class="rounded-b bg-white text-left hover:bg-gray-100 py-2 px-4 block whitespace-no-wrap w-full"
                                    type="submit">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>

            @else
                <a href="/login"
                    class=" px-4 py-2 rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition-colors text-white bg-purple-500 hover:bg-purple-600 active:bg-purple-700 focus:ring-purple-300">Login</a>
                <a href="/register"
                    class="px-4 py-2 rounded-md text-sm font-medium border focus:outline-none focus:ring transition-colors text-purple-600 border-purple-600 hover:text-white hover:bg-purple-600 active:bg-purple-700 focus:ring-purple-300"
                    type="submit">Register</a>
            @endauth


        </nav>
        <div class="navbar-burger self-center mr-12 p-1 hover:bg-gray-200 rounded-md cursor-pointer md:hidden"
            id="mobile-btn">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500 " fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </div>

    </div>
    <div class="hidden flex mx-auto sm:max-w-6xl  flex-col border-b space-y-4 container  px-6 pb-5 md:px-10  md:hidden " id="mobile-menu">
        {{-- <div class=" w-full">
            <input type="text" name="search" placeholder="Search"
            class="px-4 py-2 w-10/12 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200">
         <button class="relative right-8"><svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
            viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"
            width="512px" height="512px">
            <path
              d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
          </svg></button>
        </div> --}}

        @foreach ($navbar as $name => $url)
            <a class="text-gray-500  py-2 rounded-md  hover:text-gray-700 "
                href={{ $url }}>{{ $name }}</a>
        @endforeach

        <a class="flex items-center  py-2 rounded-md text-gray-500 hover:text-gray-700 " href="/cart">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
        </a>
        @auth
            @if (auth()->user()->is_admin)
                <a class="text-gray-500  py-2 rounded-md  hover:text-gray-700 " href="/drinks/create">Insert Product</a>
            @else
                <a class="text-gray-500  py-2 rounded-md  hover:text-gray-700 " href="/transactions">Transactions list</a>
            @endif
        @endauth
        @auth
            <form action="/logout" method="post">
                @csrf
                <button class="text-gray-500 w-full text-left  py-2 rounded-md  hover:text-gray-700 "
                    type="submit">Logout</button>
            </form>
            <div class="flex items-center border-t pt-3 lg:border-0 lg:pt-0">
                <img src="{{ asset('assets/user.png') }}" class="w-10 mr-2 lg:mr-0 rounded-full" alt="">
                {{ auth()->user()->is_admin ? 'Admin' : auth()->user()->name }}
            </div>
        @else
            <div class="flex flex-col space-y-3">
                <a href="/login"
                    class=" px-4 py-2 text-center rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition-colors text-white bg-purple-500 hover:bg-purple-600 active:bg-purple-700 focus:ring-purple-300">Login</a>
                <a href="/register"
                    class="px-4 py-2 text-center rounded-md text-sm font-medium border focus:outline-none focus:ring transition-colors text-purple-600 border-purple-600 hover:text-white hover:bg-purple-600 active:bg-purple-700 focus:ring-purple-300"
                    type="submit">Register</a>
            </div>
        @endauth

    </div>
</header>
