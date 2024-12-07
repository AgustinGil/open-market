<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['title','subtitle']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['title','subtitle']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<div>
    <div class="flex items-center justify-start space-x-2 ">
        <span class="bg-omblue bgblue block w-4 h-9  rounded-md"></span>
        <p class="text-sm font-semibold"><?php echo e($subtitle); ?></p>
    </div>

    <h2 class="text-4xl mt-2 font-semibold "><?php echo e($title); ?></h2>
</div><?php /**PATH /var/www/html/resources/views/components/section-heading.blade.php ENDPATH**/ ?>