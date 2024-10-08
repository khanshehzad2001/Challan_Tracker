<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create New Challan') }}
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
                        <!-- <script>
                            document.addEventListener('DOMContentLoaded', function () {
                                alert('{{ session('success') }}');
                            });
                        </script> -->
                    @endif
                    @if ($errors->any())
                        <div class="mb-4">
                        <div class="block p-4 rounded-md 
                            bg-red-500 text-sm text-gray-700 
                            dark:bg-red-700 dark:text-gray-300 
                            font-medium">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('challans.store') }}">
                        @csrf
                        <div>
                            <x-input-label for="challan_number" :value="__('Challan Number *')" />
                            <x-text-input id="challan_number" class="block mt-1 w-full text-black dark:text-white dark:bg-gray-700 rounded-lg" type="text" name="challan_number" required autofocus />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="bill_number" :value="__('Bill Number *')" />
                            <x-text-input id="bill_number" class="block mt-1 w-full text-black dark:text-white dark:bg-gray-700 rounded-lg" type="text" name="bill_number" required />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="customer_name" :value="__('Customer Name')" />
                            <x-text-input id="customer_name" class="block mt-1 w-full text-black dark:text-white dark:bg-gray-700 rounded-lg" type="text" name="customer_name" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="issue_date" :value="__('Issue Date *')" />
                            <x-text-input id="issue_date" class="block mt-1 w-full text-black dark:text-white dark:bg-gray-700 rounded-lg" type="date" name="issue_date" required />
                        </div>

                        <!-- <div class="mt-4">
                            <x-input-label for="description" :value="__('Description')" />
                            <x-textarea-input id="description" name="description" class="block mt-1 w-full"></x-textarea-input>
                        </div> -->

                        <div class="mt-4">
                            <x-primary-button>
                                {{ __('Create Challan') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
