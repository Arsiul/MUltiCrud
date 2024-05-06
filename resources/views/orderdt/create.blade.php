<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">


                <form method="POST" action=" {{ route('orderdetail.store') }}" class="max-w-sm mx-auto px-4 py-5">
                    @csrf

                    <!-- CAMPO EXTRA 
                    <div class="mb-5">
                        <label for="orderid" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Order ID</label>
                        <input type="number" name="orderid" id="orderid" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>

                    -->
                    <div class="mb-5">
                        <label for="orderid" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ORDER ID</label>
                        <input type="number" name="orderid" id="orderid" value="{{ $ID }}" readonly aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div class="mb-5">
                        <label for="productid" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PRODUCT ID</label>
                        <input type="number" name="productid" id="productid" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div class="mb-10">
                        <label for="unitprice" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">UNIT PRICE</label>
                        <input type="number" step="any" name="unitprice" id="unitprice" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div class="mb-10">
                        <label for="quantity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">QUANTITY</label>
                        <input type="number" name="quantity" id="quantity" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div class="mb-10">
                        <label for="discount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">DISCOUNT</label>
                        <input type="number" step="any" name="discount" id="discount" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>

                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Guardar</button>
                    <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-r"><a href=" {{ route('orderdetail.show', $ID)}} ">Cancelar</a></button>

                </form>



            </div>
        </div>
    </div>
</x-app-layout>