<x-layouts>
  <x-navbar />
  <div class="container flex-1 py-5 mx-auto px-6 md:px-10 sm:max-w-6xl">
    <h1 class="text-3xl mb-5">Transactions List</h1>
    @if ($transactions->count())

    <div class="">
      <div class="overflow-x-auto">
        <table class="table-auto w-full">
          <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
            <tr>
              <th class="p-2 whitespace-nowrap">
                <div class="font-semibold text-left">No</div>
              </th>
              <th class="p-2 whitespace-nowrap">
                <div class="font-semibold text-left">Date</div>
              </th>
              <th class="p-2 whitespace-nowrap">
                <div class="font-semibold text-left">Amount</div>
              </th>
              <th class="p-2 whitespace-nowrap">
                <div class="font-semibold text-center">Action</div>
              </th>
            </tr>
          </thead>
          <tbody class="text-sm divide-y divide-gray-100">

            @foreach ($transactions as $key=>$transaction)
            <tr>
              <td class="p-2 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="font-medium text-gray-800">{{ $key+1 }}</div>
                </div>
              </td>
              <td class="p-2 whitespace-nowrap">
                <div class="text-left">{{ $transaction->date }}</div>
              </td>
              <td class="p-2 whitespace-nowrap">
                <div class="text-left font-medium text-green-500">Rp. {{ $transaction->amount }}</div>
              </td>    
               
              <td class="p-2 whitespace-nowrap">
                <a href="/transactions/{{ $transaction->id }}"
        class=" px-4 py-2 rounded-md text-sm  font-medium border-0 focus:outline-none focus:ring transition-colors text-white bg-purple-500 hover:bg-purple-600 active:bg-purple-700 focus:ring-purple-300">Detail</a>
              </td>
            </tr>
            @endforeach
           
          </tbody>
        </table>
      </div>
    </div>

    @else
    <p>You havent made any transaction</p>
    @endif

    
  </div>
  <x-footer />
</x-layouts>