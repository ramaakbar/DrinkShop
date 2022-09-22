<x-layouts>
  <x-navbar />
  <main class="flex-1 mt-10 mb-10">
    <div class="items-center flex  pt-5 lg:space-x-8 mx-auto px-4 max-w-lg lg:max-w-5xl">
      <div class="w-full mx-auto lg:w-1/2 ">
        <h1 class="text-2xl font-bold mb-5">Transaction {{ $transaction->id }}</h1>
        
          <h3 class="text-lg font-semibold mb-2">Order Summary</h3>
          <div class="flex flex-col mb-2 h-32 overflow-y-scroll">
            @foreach ($detail as $detail)
            <div class="flex  align-middle justify-between flex-none ">
              <div class="">
                <p>{{ $detail->drink->name }}</p>
                <p class="text-sm text-gray-600">Quantity {{ $detail->quantity }}</p>
              </div>
              <p>Rp. {{ number_format($detail->drink->price,2, ',', '.') }}</p>
            </div>
            @endforeach
          </div>
          <hr class=" my-2 ">
          <div class="flex align-middle justify-between  mb-4 font-semibold">
            <p>Total</p>
            <p>Rp. {{ number_format($transaction->amount,2, ',', '.') }}</p>
          </div>



      </div>
    </div>

  </main>
  <x-footer />
</x-layouts>