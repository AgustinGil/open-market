@props(['title','subtitle'])

<div>
    <div class="flex items-center justify-start space-x-2 ">
        <span class="bg-omblue bgblue block w-4 h-9  rounded-md"></span>
        <p class="text-sm font-semibold">{{$subtitle}}</p>
    </div>

    <h2 class="text-4xl mt-2 font-semibold ">{{$title}}</h2>
</div>