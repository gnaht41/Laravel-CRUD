<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Product Details') }}
            </h2>
            <div class="flex space-x-2">
                <a href="{{ route('products.edit', $product->id) }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow transition duration-200">
                    Edit Product
                </a>
                <a href="{{ route('products.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded shadow transition duration-200">
                    Back to List
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-8 bg-white border-b border-gray-200">

                    <div class="flex flex-col md:flex-row gap-8">
                        <div class="md:w-1/2">
                            @if($product->image)
                                <img src="{{ asset($product->image) }}" class="w-full h-auto object-cover rounded-lg shadow-md border border-gray-200" alt="{{ $product->title }}">
                            @else
                                <div class="w-full h-64 bg-gray-100 flex items-center justify-center text-gray-500 rounded-lg shadow-inner border border-gray-200 text-lg">
                                    No Image Available
                                </div>
                            @endif
                        </div>
                        
                        <div class="md:w-1/2 space-y-6">
                            <div>
                                <h3 class="text-3xl font-bold text-gray-900">{{ $product->title }}</h3>
                                <p class="text-xl font-semibold text-blue-600 mt-2">${{ number_format($product->price, 2) }}</p>
                            </div>

                            <div class="border-t border-gray-200 pt-4">
                                <h4 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Date</h4>
                                <p class="text-gray-900">{{ \Carbon\Carbon::parse($product->date)->format('F d, Y') }}</p>
                            </div>

                            <div class="border-t border-gray-200 pt-4">
                                <h4 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Description</h4>
                                <div class="prose max-w-none text-gray-700">
                                    {!! nl2br(e($product->description)) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
