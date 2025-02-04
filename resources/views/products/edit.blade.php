<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2">
        <div class="flex mt-4 justify-between items-center">
            <h2 class="font-semibold text-xl">Edit Products</h2>
            @include('products.partials.delete-product')
        </div>

        <div class="mt-4" x-data="{ imageUrl: '/storage/{{ $product->foto }}' }">
            <form enctype="multipart/form-data" action="{{ route('products.update', $product) }}" method="post" class="flex gap-8">
                @csrf
                @method('PUT')
                
                <div class="w-1/2">
                    <img :src="imageUrl" alt="" class="aspect-aquare" width="500" height="500">
                </div>

                <div class="w-1/2">
                    <div class="mt-4">
                        <x-input-label for="foto" :value="__('Foto')" />
                        <x-text-input accept="image/*" id="foto" class="block mt-1 w-full border p-2" type="file" name="foto" :value="$product->foto" 
                        @change="imageUrl = URL.createObjectURL($event.target.files[0])"
                        />
                        <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="nama" :value="__('Nama')" />
                        <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama" :value="$product->nama" required />
                        <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="harga" :value="__('Harga')" />
                        <x-text-input id="harga" class="block mt-1 w-full" type="text" name="harga" :value="$product->harga" x-mask:dynamic="$money($input, ',')" required />
                        <x-input-error :messages="$errors->get('harga')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="deskripsi" :value="__('Deskripsi')" />
                        <x-text-area id="deskripsi" class="block mt-1 w-full" type="text" name="deskripsi">{{ $product->deskripsi }}</x-text-area>
                        <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
                    </div>

                    <x-primary-button class="mt-4 w-full justify-center">
                        {{ __('Submit') }}
                    </x-primary-button>
                </div>

            </form>
        </div>
    </div>

</x-app-layout>