@props(['rating' => 4 , 'reviews' => 0])

<div class="flex  items-center align-center space-x-2">
    <div class="flex space-x-0.5">

        @for ($i = 0; $i < $rating; $i++)
            <img src="{{Vite::asset('resources/images/star-on.svg')}}" alt="">
        @endfor
        @for ($i = 0; $i < 5 -$rating ; $i++)
            <img src="{{Vite::asset('resources/images/star-off.svg')}}" alt="">
        @endfor
    </div>
    @if ($reviews > 0)
    <span class="text-sm text-gray-400">({{$reviews}})</span>
        
    @endif
</div>
