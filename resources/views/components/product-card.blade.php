@props(['product'])
@php
    try {
        //code...
        $rating = [];
        foreach ($product->reviews as $review) {
            $rating[] = $review['rating'];
        }
        $reviews = sizeOf($rating);
        $rating = floor(array_sum($rating) / sizeOf($rating));
    } catch (\Throwable $th) {
        dd($product);
    }
@endphp

<a href="products/{{ $product->id }}" class="flex group max-w-[225px]">
    <div class=" bg-gray-100  transition-colors duration-400 rounded-sm">
        <img class="flex w-56 h-56 aspect-square object-contain bg-gray-200 p-4 group-hover:bg-gray-200/40 transition-colors duration-200"
            src="{{ Vite::asset($product->images->last()->url) }}" alt="">
        <div class="mt-2">
            <h3
                class="font-inter font-semibold  group-hover:text-omblue transition-colors overflow-ellipsis  duration-200 line-clamp-2">
                {{ $product->title }}</h3>
            <p class="text-sm mb-1 text-gray-600 font-medium">${{ $product->price }}</p>
            <x-rating :rating="$rating" :reviews="$reviews"></x-rating>
        </div>
    </div>
</a>
