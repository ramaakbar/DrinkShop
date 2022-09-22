<x-layouts>
  <x-navbar />
  <div class="container flex-1 py-5 mx-auto px-6 md:px-10 sm:max-w-6xl">
    <h1 class="text-3xl mb-5">Cart</h1>
    @if ($carts->count())

    <div class="">
      <div class="overflow-x-auto">
        <table class="table-auto w-full">
          <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
            <tr>
              <th class="p-2 whitespace-nowrap">
                <div class="font-semibold text-left">Name</div>
              </th>
              <th class="p-2 whitespace-nowrap">
                <div class="font-semibold text-left">Price</div>
              </th>
              <th class="p-2 whitespace-nowrap">
                <div class="font-semibold text-left">Quantity</div>
              </th>
              <th class="p-2 whitespace-nowrap">
                <div class="font-semibold text-center">Action</div>
              </th>
            </tr>
          </thead>
          <tbody class="text-sm divide-y divide-gray-100">
            @php
            $grandtotal = 0;
            $totalquantity = 0;
            @endphp
            @foreach ($carts as $cart)
            @php
            $subtotal =0;
            @endphp
            <tr>
              <td class="p-2 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="font-medium text-gray-800">{{ $cart->drink->name }}</div>
                </div>
              </td>
              <td class="p-2 whitespace-nowrap">
                <div class="text-left font-medium text-green-500">Rp. {{ number_format($cart->drink->price,2, ',', '.') }}</div>
              </td>
              <td class="p-2 whitespace-nowrap">
                <div class="text-left">{{ $cart->quantity }}</div>
              </td>
              <td class="p-2 whitespace-nowrap">
                <form action="/cart/{{ $cart->id }}" class="text-center" method="post">
                  @method('delete')
                  @csrf
                  <button onclick="return confirm('Are you sure you want to delete the post?')"
                    class="text-white  bg-red-500 hover:bg-red-700 transition-all focus:ring-4 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center  ">
                    Delete
                  </button>
                </form>
              </td>
              @php
              $subtotal = $cart->drink->price * $cart->quantity;
              $grandtotal = $grandtotal + $subtotal;
              $totalquantity = $totalquantity + $cart->quantity;
              @endphp
            </tr>
            @endforeach
            <tr class="">
              <td class="p-2 font-bold text-xl">
                Total
              </td>
              <td class="p-2 font-bold text-green-500 text-xl">
                Rp. {{ number_format($grandtotal,2,',', '.') }}
              </td>
              <td class="p-2 font-bold text-xl">
                {{ $totalquantity }}
              </td>
              <td class="p-2 text-center">
                <form action="/cart" class="inline"  method="post">
                  @method('delete')
                  @csrf
                  <button onclick="return confirm('Are you sure you want to delete the post?')"
                    class=" text-white  bg-red-500 hover:bg-red-700 transition-all focus:ring-4 font-medium rounded-lg text-sm px-3 py-2 text-center items-center  mb-3 sm:mb-0">
                    Empty Cart
                  </button>
                </form>
                <a 
                  href="/cart/checkout" class="text-white  bg-purple-500 hover:bg-purple-700 transition-all focus:ring-4 font-medium rounded-lg text-sm px-3 py-2 text-center items-center  ">
                  Checkout
                </a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    @else
    <p>Your cart is empty. <a href="/" class="underline text-blue-500"> go buy some drinks</a></p>
    @endif

  </div>
  <x-footer />
</x-layouts>