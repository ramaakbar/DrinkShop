<x-layouts>
  <x-navbar />
  <main class="flex-1 mt-10 mb-10">
    <div class="items-center flex  pt-5 lg:space-x-8 mx-auto px-4 max-w-lg lg:max-w-5xl">
      <div class="w-full mx-auto lg:w-1/2 ">
        <h1 class="text-2xl font-bold mb-5">Checkout</h1>
        <form action="/cart/pay" method="post">
          @csrf
          <h3 class="text-lg font-semibold mb-2">Order Summary</h3>
          <div class="flex flex-col mb-2 h-32 overflow-y-scroll">
            @php
            $grandtotal = 0;
            $totalquantity = 0;
            @endphp
            @foreach ($orders as $order)
            @php
            $subtotal =0;
            @endphp
            <div class="flex  align-middle justify-between flex-none ">
              <div class="">
                <p>{{ $order->drink->name }}</p>
                <p class="text-sm text-gray-600">Quantity {{ $order->quantity }}</p>
              </div>
              <p>Rp. {{ number_format($order->drink->price,2, ',', '.') }}</p>
            </div>
            @php
            $subtotal = $order->drink->price * $order->quantity;
            $grandtotal = $grandtotal + $subtotal;
            @endphp
            @endforeach
          </div>
          <hr class=" my-2 ">
          <div class="flex align-middle justify-between  mb-4 font-semibold">
            <p>Total</p>
            <p>Rp. {{ number_format($grandtotal,2, ',', '.') }}</p>
          </div>

          <h3 class="text-lg font-semibold mb-2">Delivery Address</h3>
          <div class="  mb-2 w-full">
            <h3 class="text-base mb-2">Address</h3>
            <input type="text"
              class="w-full mb-3 px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg focus:border-purple-500 focus:outline-none"
              placeholder="Address" id="location" />
              <h3 class="text-base mb-2">City</h3>
            <input type="text"
              class="w-full mb-3  px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg focus:border-purple-500 focus:outline-none"
              placeholder="City" id="locality" />
            <div class="half-input-container ">
              <h3 class="text-base mb-2">State/Province</h3>
              <input type="text" class="half-input w-full mb-3  px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg focus:border-purple-500 focus:outline-none" placeholder="State/Province" id="administrative_area_level_1" />
              <input type="text" class="half-input hidden" placeholder="Zip/Postal code" id="postal_code" />
            </div>
            <h3 class="text-base mb-2">Country</h3>
            <input type="text"
              class="w-full mb-3  px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg focus:border-purple-500 focus:outline-none"
              placeholder="Country" id="country" />
            <div class="map" id="map"></div>
          </div>
          

          <h3 class="text-lg font-semibold mb-2">Payment Method</h3>
          <div class="flex align-middle justify-between  mb-2">
            <select name=""
              class="px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg focus:border-purple-500 focus:outline-none"
              id="">
              <option value="">Credit Card</option>
              <option value="">Debit Card</option>
              <option value="">Go-Pay</option>
            </select>
          </div>


          <div class="mt-8">
            <button type="submit"
              class=" px-4 py-2 rounded-md text-sm w-full font-medium border-0 focus:outline-none focus:ring transition-colors text-white bg-purple-500 hover:bg-purple-600 active:bg-purple-700 focus:ring-purple-300">Checkout</button>
          </div>
        </form>
    
      </div>
    </div>
  </main>
  <x-footer />
</x-layouts>