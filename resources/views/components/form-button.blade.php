<div class="text-center">
    <button {{$attributes->merge([
        'class' => 'px-10 py-3 bg-omblue rounded-lg hover:bg-[#0e5589] text-white font-semibold transition-colors duration-200'
    ])}}>
        {{$slot}}
    </button>
</div>