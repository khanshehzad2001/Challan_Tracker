<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                @if (session('success'))
                        <div class="mb-4">
                        <div class="block p-4 rounded-md 
                            bg-green-500 text-sm text-gray-700 
                            dark:bg-green-700 dark:text-gray-300 
                            font-medium">
                                {{ session('success') }}
                            </div>
                        </div>
                    @endif
                    <!-- Header Section -->
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-medium">{{ __('Last 10 Challans') }}</h3>
                        <x-primary-button>
                            <a href="{{ route('challans.create') }}">
                                {{ __('Add New Challan') }}
                            </a>
                        </x-primary-button>
                    </div>

                    <!-- Challans Table -->
                    <div class="relative overflow-x-auto">
                        <div class="relative overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gray-50 dark:bg-gray-900">
                                    <tr class="text-left">
                                        <th class="py-3 px-4 text-gray-500 dark:text-gray-400">{{ __('Challan Number') }}</th>
                                        <th class="py-3 px-4 text-gray-500 dark:text-gray-400">{{ __('Bill Number') }}</th>
                                        <th class="py-3 px-4 text-gray-500 dark:text-gray-400">{{ __('Customer Name') }}</th>
                                        <th class="py-3 px-4 text-gray-500 dark:text-gray-400">{{ __('Issue Date') }}</th>
                                        <!-- <th class="py-3 px-4 text-gray-500 dark:text-gray-400">{{ __('Description') }}</th> -->
                                    </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                    @foreach($challans as $challan)
                                        <tr>
                                            <td class="py-2 px-4 text-gray-700 dark:text-gray-300">{{ $challan->challan_number }}</td>
                                            <td class="py-2 px-4 text-gray-700 dark:text-gray-300">{{ $challan->bill_number }}</td>
                                            <td class="py-2 px-4 text-gray-700 dark:text-gray-300">{{ $challan->customer_name }}</td>
                                            <td class="py-2 px-4 text-gray-700 dark:text-gray-300">{{ $challan->issue_date->format('m-d-Y') }}</td>
                                            <!-- <td class="py-2 px-4 text-gray-700 dark:text-gray-300">{{ $challan->description }}</td> -->
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
