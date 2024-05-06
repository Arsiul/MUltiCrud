<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">


                <form method="POST" action=" {{ route('order.update', $order->OrderID) }}" class="max-w-sm mx-auto px-4 py-5">
                    @csrf
                    @method('PUT')
                    <div class="mb-5">
                        <label for="orderid" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Order ID</label>
                        <input type="number" name="orderid" id="orderid" value="{{ old('orderid', $order->OrderID) }}" readonly class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div class="mb-5">
                        <label for="customerid" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Customer ID</label>
                        <input type="text" name="customerid" id="customerid" value="{{ old('customerid', $order->CustomerID) }}" aria-describedby="helper-text-explanation" readonly class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div class="mb-5">
                        <label for="orderdate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Order Date</label>
                        <input type="datetime-local" name="orderdate" id="orderdate" value="{{ old('order', $order->OrderDate) }}" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div class="mb-10">
                        <label for="freight" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Freight</label>
                        <input type="number" step="any" name="freight" id="freight" value="{{ old('freight', $order->Freight) }}" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div class="mb-10">
                        <label for="shipname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ship name</label>
                        <input type="text" name="shipname" id="shipname" value="{{ old('shipname', $order->ShipName) }}" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div class="mb-10">
                        <label for="shipcountry" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ship Country</label>
                        <input type="text" name="shipcountry" id="shipcountry" value="{{ old('shipcountry', $order->ShipCountry) }}" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>

                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Guardar Cambios</button>
                    <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-r"><a href=" {{ route('order.index') }} ">Cancelar</a></button>

                </form>



            </div>
        </div>
    </div>
</x-app-layout>