<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Appointment') }}
        </h2>
    </x-slot>

    <div class="flex justify-start py-5 mb-2 min-w-full">
        <a href="{{ route('appointments.index') }}" class="inline-flex justify-end items-center px-4 py-2 border border-transparent shadow-sm text-base font-medium rounded-md text-white bg-teal-600 hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 -mr-1 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
          </svg>
            Back
        </a>
    </div>

    <x-alert></x-alert>

    <div class="p-5 bg-white rounded-lg shadow-md">
        <form action="{{ route('appointments.update', $appointment->id) }}" method="POST" class="space-y-8 divide-y divide-gray-200">
            @csrf
            @method('PUT')
            <div class="space-y-8 divide-y divide-gray-200 ">
                <div class="pt-2">
                    <div>
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Personal Information
                        </h3>
                        <p class="mt-1 text-sm text-gray-500">
                            Use a permanent address where you can receive mail.
                        </p>
                    </div>
                    <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <label for="donor_name" class="block text-sm font-medium text-gray-700">
                                Donor Name
                            </label>
                            <div class="mt-1">
                                <input type="text" name="donor_name" value="{{ $appointment->donor_name }}" class="shadow-sm focus:ring-teal-500 focus:border-teal-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>
                        <div class="sm:col-span-3">
                            <label for="donor_email" class="block text-sm font-medium text-gray-700">
                                Donor Email
                            </label>
                            <div class="mt-1">
                                <input type="email" name="donor_email" value="{{ $appointment->donor_email }}" class="shadow-sm focus:ring-teal-500 focus:border-teal-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>
                        <div class="sm:col-span-3">
                            <label for="donor_contact" class="block text-sm font-medium text-gray-700">
                                Donor Contact
                            </label>
                            <div class="mt-1">
                                <input type="text" name="donor_contact" value="{{ $appointment->donor_contact }}" class="shadow-sm focus:ring-teal-500 focus:border-teal-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>
                         <div class="sm:col-span-3">
                            <label for="date" class="block text-sm font-medium text-gray-700">
                                Date
                            </label>
                            <div class="mt-1">
                                <input type="datetime-local" name="date" value="{{ date_format($appointment->date, 'Y-m-d\TH:i') }}" class="shadow-sm focus:ring-teal-500 focus:border-teal-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>
                        <div class="sm:col-span-3">
                            <label for="donation_type_id" class="block text-sm font-medium text-gray-700">
                                Donation Type
                            </label>
                            <div class="mt-1">
                                <select name="donation_type_id" class="shadow-sm focus:ring-teal-500 focus:border-teal-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                    @foreach ($donationTypes as $donationType)
                                    <option value="{{ $donationType->id }}" {{ $appointment->donation_type_id === $donationType->id ? 'selected' : '' }}>{{ $donationType->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="sm:col-span-3">
                            <label for="status" class="block text-sm font-medium text-gray-700">
                                Status
                            </label>
                            <div class="mt-1">
                                <select name="status_id" class="shadow-sm focus:ring-teal-500 focus:border-teal-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                    @foreach ($statuses as $status)
                                    <option value="{{ $status->id }}" {{ $appointment->status_id === $status->id ? 'selected' : '' }}>{{ $status->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="sm:col-span-3">
                            <label for="remark" class="block text-sm font-medium text-gray-700">
                                Remark
                            </label>
                            <div class="mt-1">
                                <input type="text" name="remark" value="{{ $appointment->remark }}" class="shadow-sm focus:ring-teal-500 focus:border-teal-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pt-5">
                <div class="flex justify-end">
                    <a href="{{ route('appointments.index') }}" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                        Cancel
                    </a>
                    <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-teal-600 hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                        Save
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>