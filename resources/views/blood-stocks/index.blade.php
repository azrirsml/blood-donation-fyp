<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blood Stock') }}
        </h2>
    </x-slot>

    <div class="flex justify-end py-2 min-w-full">
        <a href="{{ route('blood-stocks.create') }}" class="inline-flex justify-end items-center px-4 py-2 border border-transparent shadow-sm text-base font-medium rounded-md text-white bg-teal-600 hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 -mr-1 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
          </svg>
          Add Blood Stock
        </a>
    </div>

    <x-alert></x-alert>

    <div class="py-5">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 mb-3 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        State
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Hospital
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Blood Type
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Donation Type
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Contact
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Updated at
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Delete</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($bloodStocks as $bloodStock)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ data_get($bloodStock, 'state.name') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-normal text-sm text-gray-800">
                                        {{ data_get($bloodStock, 'hospital.name') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-normal text-sm text-gray-800">
                                        {{ data_get($bloodStock, 'bloodType.name') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-normal text-sm text-gray-800">
                                        {{ data_get($bloodStock, 'donationType.name') }}
                                    </td>
                                    <td class="px-4 py-3 whitespace-normal ">
                                        @if (data_get($bloodStock, 'stockStatus.name') === 'Good')
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-green-100 text-green-800">
                                                {{ data_get($bloodStock, 'stockStatus.name') }}
                                            </span>
                                        @elseif(data_get($bloodStock, 'stockStatus.name') === 'Decreasing')
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-yellow-100 text-yellow-800">
                                                {{ data_get($bloodStock, 'stockStatus.name') }}
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-red-100 text-red-800">
                                                {{ data_get($bloodStock, 'stockStatus.name') }}
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <div class="text-sm text-gray-800">{{ data_get($bloodStock, 'hospital.email') }}</div>
                                        <div class="text-sm text-gray-500">{{ data_get($bloodStock, 'hospital.contact') }}</div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-normal text-sm text-gray-800">
                                        {{ date('j F, Y g:i a', strtotime($bloodStock->updated))  }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="{{ route('blood-stocks.edit', $bloodStock->id) }}" class="text-teal-600 hover:text-teal-900">Edit</a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <form action="{{ route('blood-stocks.destroy', $bloodStock->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-rose-500 hover:text-rose-500" onclick="return confirm('Are you sure?')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{ $bloodStocks->links() }}
    </div>
</x-app-layout>