<x-layout>
    @isset($title)
        <h1 class="text-4xl mb-8 font-semibold">{{ $title }}</h1>
    @endisset

    @isset($category)
        <h1 class="text-2xl text-gray-600 mb-8 font-semibold">Categoria: <span class="text-4xl text-black">
                {{ $category[0]['name'] }}</span></h1>
    @endisset

    <div class="">
        <div class="flex flex-col space-y-5">
            @foreach ($products as $product)
                <x-product-card-wide :$product></x-product-card-wide>
            @endforeach
        </div>
    </div>
</x-layout>
