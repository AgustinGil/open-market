<x-layout>
    <x-heading>Pago</x-heading>
    <div class="grid grid-cols-[70%_30%] mx-0">

        <x-form method="POST" action="/order/{{ $product->id }}" class="mx-0 w-full px-8">
            <x-form-input label="" name="user_id" type="hidden" value="{{ Auth::user()->id }}"></x-form-input>
            <x-form-input label="" name="product_id" type="hidden" value="{{ $product->id }}"></x-form-input>
            <x-form-input label="" name="amount" type="hidden" value="{{ $product->price }}"></x-form-input>
            <x-form-input label="Calle" name="street_address"></x-form-input>
            <x-form-input label="Ciudad" name="city"></x-form-input>
            <x-form-input label="Telefono" type="phone" name="phone"></x-form-input>

            <x-divider></x-divider>

            <x-form-button class="text-center">Pagar</x-form-button>
        </x-form>
        <div class="pl-4 ">
            <div class="border-b border-black/10 p-4">
                <div class="flex items-center content-between justify-between bg-gray-300 px-4 py-2 rounded-md ">
                    <div>
                        <h3 class="font-bold">{{ $product->title }}</h3>
                        <p>${{ $product->price }}</p>
                    </div>
                    <img class="h-20" src="{{ Vite::asset($product->images->last()->url) }}" alt="">
                </div>
            </div>
            <p class="flex justify-between"><span class="font-bold">Total</span> <span>${{ $product->price }}</span>
            </p>
            <div class="flex items-center space-x-2 mt-8">
                <span class="block w-2 h-2 bg-gray-400 rounded-lg"></span>
                <p class="text-gray-600">Pago en entrega</p>
            </div>
        </div>
    </div>

</x-layout>
