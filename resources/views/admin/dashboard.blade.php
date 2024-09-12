<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight text-center">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="h-screen flex items-center justify-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 text-center">
                    <h3 class="text-3xl font-bold text-blue-600 mb-4">
                        {{ __("You're logged in as an admin!") }}
                    </h3>
                    <p class="text-lg text-gray-700 mb-4">
                        {{ __("Now You can manage products!") }}
                    </p>
                    <p>
                        <a href="products" class="btn btn-primary bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                            Manage Products
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
