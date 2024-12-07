@props(['section'])

<section class="">
    <x-section-heading title="{{ $section['title'][0]['name'] }}" :subtitle="$section['subtitle']"></x-section-heading>
    <div class="grid grid-cols-1 mt-5 lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 xs:grid-cols-1 gap-y-8">
        @if (sizeOf($section['products']) < 8 and sizeOf($section['products']) > 4)
            @for ($i = 0; $i < 4; $i++)
                <x-product-card :product="$section['products'][$i]"></x-product-card>
            @endfor
        @else
            @foreach ($section['products'] as $product)
                <x-product-card :$product></x-product-card>
            @endforeach
        @endif
    </div>
    <div class="flex justify-center mt-10">
        <form method="GET" action="search">
            <input type="hidden" name="category" value="{{ $section['id'] }}">
            <x-form-button>Ver mas</x-form-button>
        </form>
    </div>
</section>
