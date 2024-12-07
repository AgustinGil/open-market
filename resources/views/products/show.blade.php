@php
    $rating = [];
    foreach ($product->reviews as $review) {
        $rating[] = $review['rating'];
    }
    $reviews = sizeOf($rating);
    $rating = floor(array_sum($rating) / sizeOf($rating));
@endphp

<x-layout>
    <h3><span class="text-gray-500">Products / <a href="http://localhost/search?category={{ $product->category->id }}">
                {{ $product->category->name }}</a> / </span>{{ $product->title }}</h3>
    <div class="grid grid-cols-[60%_40%] mt-5">
        <div class="flex justify-center items-center">
            <img class="max-h-[40rem]" draggable="false" src="{{ Vite::asset($product->images->first()->url) }}"
                alt="">
        </div>
        <div class="flex flex-col justify-between">
            <div>
                <h1 class="font-semibold text-3xl mb-2">{{ $product->title }}</h1>

                <x-rating :$rating :$reviews></x-rating>

                <p class="font-base text-2xl mt-4 mb-2">${{ $product->price }}</p>

                <p>{{ $product->description }}</p>
            </div>

            <form action="/order/{{ $product->id }}" method="GET" class="mb-16">
                <x-form-button>Comprar</x-form-button>
            </form>
        </div>
    </div>

    <div class="mt-8">
        <h2 class="mb-4 text-2xl font-bold">Reviews</h2>
        <ul class="space-y-8">
            @foreach ($product->reviews as $review)
                <li class="bg-gray-200 p-8 rounded-lg">
                    <div class="mb-4 ">
                        <h4 class="text-lg font-semibold">{{ $review->user->name }}</h4>
                        <h4 class="">{{ $review->user->email }}</h4>
                    </div>
                    <x-rating :rating="$review->rating" />
                    <p class="mt-2">{{ $review->comment }}</p>
                </li>
            @endforeach
        </ul>
    </div>
</x-layout>
