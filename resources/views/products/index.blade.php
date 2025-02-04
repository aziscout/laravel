<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2">
        <div class="mt-4 flex items-center justify-between">
            <h2 class="font-semibold text-xl">List Products</h2>
            <a href="{{ route('products.create') }}">
                <button class="bg-red-500 text-white font-semibold rounded-md px-10 py-2">Add</button>
            </a>
        </div>

        @if (session()->has('success'))
        <x-alert message="{{ session('success') }}" />
        @endif

        <div class="grid md:grid-cols-3 grid-cols-1 gap-8 mt-4">
            @foreach ($products as $product )
                <div>
                    <img src="{{ url('storage/'. $product->foto) }}" alt="" class="aspect-square object-cover">
                    <div class="my-2">
                        <p>{{ $product->nama }}</p>
                        <p>Rp. {{ number_format($product->harga) }}</p>
                    </div>
                    <a href="{{ route('products.edit', $product) }}">
                        <button class="bg-gray-300 rounded-md px-10 py-2 w-full">Edit</button>
                    </a>
                </div>
            @endforeach
        </div>

        <div class="mt-4">
            {{ $products->links() }}
        </div>
    </div>

</x-app-layout>