<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Listado de Clientes') }}
        </h2>
    </x-slot>

    <div>
        <div>
            <div class="bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg p-10">


                <div class="container-buttons">
                    <div class="mb-7">
                        <a href="{{ route('orderdetail2.crear', $ID) }}" class="bg-cyan-500 dark:bg-cyan-700 hover:bg-cyan-600 px-4 py-2 dark:text-white">Registrar Nuevo</a>
                    </div>

                </div>
                <table class="table-auto w-full px-3 h-96">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-gray-900 dark:text-white text-center">ORDER ID</th>
                            <th class="px-4 py-2 text-gray-900 dark:text-white text-center">PRODUCT ID</th>


                            <th class="px-4 py-2 text-gray-900 dark:text-white text-center">UNIT PRICE</th>
                            <th class="px-4 py-2 text-gray-900 dark:text-white text-center">QUANTITY</th>


                            <th class="px-4 py-2 text-gray-900 dark:text-white text-center">DISCOUNT</th>


                            <th class="px-4 py-2 text-gray-900 dark:text-white text-center">ACTIONS</th>


                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orderdt as $orders)
                        <tr>
                            <td class="px-4 py-2 border text-gray-900 dark:text-white text-center">{{ $orders->OrderID }}</td>
                            <td class="px-4 py-2 border text-gray-900 dark:text-white text-center">{{ $orders->ProductID }}</td>

                            <td class="px-4 py-2 border text-gray-900 dark:text-white text-center">{{ $orders->UnitPrice }}</td>
                            <td class="px-4 py-2 border text-gray-900 dark:text-white text-center">{{ $orders->Quantity }}</td>


                            <td class="px-4 py-2 border text-gray-900 dark:text-white text-center">{{ $orders->Discount }}</td>

                            <td class="border px-4 py-2 text-center">
                                <div class="flex justify-center gap-5">
                                    <a href="{{ route('orderdetail3.edits', [$orders->OrderID, $orders->ProductID]) }}" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <button type="button" onclick="ConfirmDelete('{{ $orders->OrderID }}','{{ $orders->ProductID }}')" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"><i class="fa-solid fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>


<script>

    
    function ConfirmDelete(OrderID,ProductID) {
        alertify.confirm("¿Estas seguro de eliminar este Registro?", function(e) {
            if (e) {
                let form = document.createElement('form')
                form.method = 'POST'
                form.action = `/orderdetail/${OrderID}/${ProductID}`
                form.innerHTML = '@csrf @method("DELETE")'
                document.body.appendChild(form)
                form.submit()
            } else {
                return false
            }

        })
    }






</script>