@props(['product'])
@php
    $rating = [];
    foreach ($product->reviews as $review) {
        $rating[] = $review['rating'];
    }
    $reviews = sizeOf($rating);
    $rating = floor( array_sum($rating) / sizeOf($rating) );
@endphp

<a href="products/{{$product->id}}" class="flex group w-full bg-gray-200/50 space-x-4 rounded-lg">
    <div class=" bg-gray-200">
        <img class="flex w-56 h-56 aspect-square object-contain bg-gray-200 p-4 group-hover:bg-gray-200/40 transition-colors duration-200" src="{{Vite::asset($product->images->last()->url)}}" alt="">

    </div>
    <div class="transition-colors duration-400 rounded-sm flex-1">
        <div class="my-2 mr-4">
            <h3 class="font-inter font-semibold text-2xl group-hover:text-omblue transition-colors overflow-ellipsis  duration-200 line-clamp-2">{{$product->title}}</h3>
            <p class="mb-1 mt-2 font-medium text-3xl">${{$product->price}}</p>
            <x-rating :rating="$rating" :reviews="$reviews"></x-rating>
            <p class="mt-4 line-clamp-2">{{$product->description}}</p>
        </div>
    </div>
</a>