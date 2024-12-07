<x-layout>

    <div class="relative text-center group">
        <a href="http://localhost/products/78">
            <img class="mb-20" draggable="false" src="{{ Vite::asset('resources/images/banners/general.png') }}"
                alt="">
        </a>
    </div>
    <div class="space-y-20">
        @foreach ($sections as $section)
            <x-products-section :section="$section"></x-product-section>
        @endforeach
    </div>
</x-layout>
