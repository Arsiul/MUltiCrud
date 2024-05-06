<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Listado de Clientes') }}
        </h2>
    </x-slot>

    <div>
        <div>
            <div class="bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg p-10">



                <div class="mb-7">
                    <a href="{{ route('customer.create')}}" class="bg-cyan-500 dark:bg-cyan-700 hover:bg-cyan-600 px-4 py-2 dark:text-white">Registrar Nuevo</a>
                </div>

                <table class="table-auto w-full px-3 h-96">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-gray-900 dark:text-white text-center">ID</th>
                            <th class="px-4 py-2 text-gray-900 dark:text-white text-center">COMPANY NAME</th>
                            
                            
                            <th class="px-4 py-2 text-gray-900 dark:text-white text-center">ADDRESS</th>
                            <th class="px-4 py-2 text-gray-900 dark:text-white text-center">CITY</th>
            
                            
                            <th class="px-4 py-2 text-gray-900 dark:text-white text-center">COUNTRY</th>
                            <th class="px-4 py-2 text-gray-900 dark:text-white text-center">PHONE</th>
                            <th class="px-4 py-2 text-gray-900 dark:text-white text-center">ACCIONES</th>

                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($customer as $customer)
                        <tr>
                            <td class="px-4 py-2 border text-gray-900 dark:text-white text-center">{{ $customer->CustomerID }}</td>
                            <td class="px-4 py-2 border text-gray-900 dark:text-white text-center">{{ $customer->CompanyName }}</td>

                            <td class="px-4 py-2 border text-gray-900 dark:text-white text-center">{{ $customer->Address }}</td>
                            <td class="px-4 py-2 border text-gray-900 dark:text-white text-center">{{ $customer->City }}</td>

                            
                            <td class="px-4 py-2 border text-gray-900 dark:text-white text-center">{{ $customer->Country }}</td>
                            <td class="px-4 py-2 border text-gray-900 dark:text-white text-center">{{ $customer->Phone }}</td>

                            <td class="border px-4 py-2 text-center">
                                <div class="flex justify-center gap-5">
                                    <a href="{{ route('customer.edit', $customer->CustomerID) }}" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <button type="button" onclick="ConfirmDelete('{{ $customer->CustomerID }}')" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"><i class="fa-solid fa-trash"></i></button>
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
    function ConfirmDelete(id) {
        alertify.confirm("¿Estas seguro de eliminar este Registro?", function(e) {
            if (e) {
                let form = document.createElement('form')
                form.method = 'POST'
                form.action = `/customer/${id}`
                form.innerHTML = '@csrf @method("DELETE")'
                document.body.appendChild(form)
                form.submit()
            } else {
                return false
            }

        })
    }
</script>