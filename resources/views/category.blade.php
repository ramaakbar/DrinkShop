<x-layouts>
  <x-navbar />
  <div class="container flex-1 py-5 mx-auto px-6 md:px-10 sm:max-w-6xl">
    <h1 class="text-3xl mb-5">Categories</h1>

    @if ($categories->count())
    @foreach ($categories as $category)
    @if ($category->drink->count())


    <div class="mb-3 ">
      {{-- <div class="flex justify-between mb-3"> --}}
        <h3 class="text-xl font-medium mb-2">{{ $category->category }}</h3>
        {{-- <a href="#">View All</a>
      </div> --}}

      <div class="flex gap-3 flex-row w-full overflow-x-scroll ">
        @foreach ($drinks as $drink)
        @if ($drink->category->category == $category->category)

        <div class="bg-white shadow-md border border-gray-200 flex-none rounded-lg w-full sm:w-1/2 md:w-1/3">
          <a href="#">
            <img class="rounded-t-lg object-fill w-full h-60" src="{{ asset('storage/' . $drink->image) }}" alt="">
          </a>
          <div class="p-5 ">
            <p class="text-base font-bold text-purple-500">{{ $drink->category->category }}</p>
            <a href="#">
              <h5 class="text-gray-900 font-bold text-xl tracking-tight mb-2 dark:text-white">
                {{ $drink->name }}</h5>
            </a>
            <p class="mb-5">Rp. {{ number_format($drink->price,2, ',', '.') }}</p>

            @auth
            @if (auth()->user()->is_admin)

            @else
            <div class="w-full">
              <form action="/drinks/{{ $drink->id }}" method="post">
                {{-- @method('put') --}}
                @csrf
                <label class="w-1/4 ">Qty: </label>
                <input
                  class="w-1/4 px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg focus:border-purple-500 focus:outline-none "
                  type="number" min="1" max="{{ $drink->stock }}" value="1" name="quantity">
                <button type="submit"
                  class="w-2/4  text-white bg-gray-800 hover:bg-gray-900 transition-all focus:ring-4  font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex justify-center items-center  ">
                  Add to Cart
                  <svg class="-mr-1 ml-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                      d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                      clip-rule="evenodd"></path>
                  </svg>
                </button>
              </form>
            </div>
            @endif
            @endauth

            @auth
            @if (auth()->user()->is_admin)
            <a href="/drinks/{{ $drink->id }}/edit"
              class="text-white bg-blue-500 hover:bg-blue-700 transition-all focus:ring-4 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center  ">
              Update
            </a>
            <form action="/drinks/{{ $drink->id }}" class="inline-flex" method="post">
              @method('delete')
              @csrf
              <button onclick="return confirm('Are you sure you want to delete the post?')"
                class="text-white  bg-red-500 hover:bg-red-700 transition-all focus:ring-4 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center  ">
                X
                </a>
            </form>
            @endif
            @endauth

          </div>
        </div>
        @endif
        @endforeach
      </div>

    </div>
    @endif
    @endforeach
    @else
    No Drinks
    @endif

  </div>
  <x-footer />
</x-layouts>