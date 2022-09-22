<x-layouts>
    <x-navbar />
    <main class="flex-1 mt-20">
        <div class="items-center flex  pt-5 lg:space-x-8 mx-auto px-4 max-w-lg lg:max-w-5xl">
            <div class="w-full mx-auto lg:w-1/2 ">
                <h1 class="text-2xl font-bold">Insert Drink</h1>
                <form action="/drinks" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mt-4 ">
                        <label class="block mb-2 text-sm text-gray-600" for="name">Name</label>
                        <input
                            class="w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg focus:border-purple-500 focus:outline-none"
                            type="text" name="name" required autofocus>
                        @error('name')
                            <div class="text-xs text-red-500">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <label class="block mb-2 text-sm text-gray-600" for="">Category</label>
                        <select name="category_id" id="category" class="w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg focus:border-purple-500 focus:outline-none">
                          
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category }}</option>
                            @endforeach
                            @error('category')
                            <div class="text-xs text-red-500">
                                {{ $message }}
                            </div>
                        @enderror
                        </select>
                    </div>

                    <div class="mt-4">
                        <label class="block mb-2 text-sm text-gray-600" for="">Stock</label>
                        <input
                            class="w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg focus:border-purple-500 focus:outline-none "
                            type="number" min="1" name="stock" required>
                        @error('stock')
                            <div class="text-xs text-red-500">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <label class="block mb-2 text-sm text-gray-600" for="">Price</label>
                       
                        <input
                            class="w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg focus:border-purple-500 focus:outline-none "
                            type="number" min="1000" name="price" required>
                        
                        @error('price')
                            <div class="text-xs text-red-500">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mt-4">
                      <label class="block mb-2 text-sm text-gray-600" for="">Image</label>
                      <input type="file" name="image">

                      @error('image')
                            <div class="text-xs text-red-500">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mt-8">
                        <button type="submit"
                            class=" px-4 py-2 rounded-md text-sm w-full font-medium border-0 focus:outline-none focus:ring transition-colors text-white bg-purple-500 hover:bg-purple-600 active:bg-purple-700 focus:ring-purple-300">Create</button>
                    </div>
                </form>
               
            </div>
        </div>
    </main>
    <x-footer />
</x-layouts>
