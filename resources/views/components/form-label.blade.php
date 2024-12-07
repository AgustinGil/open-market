@props(['name', 'label'])

<div class="inline-flex items-center gap-x-2">
    <label class="font-semibold" for="{{ $name }}">{{ $label }}</label>
</div>