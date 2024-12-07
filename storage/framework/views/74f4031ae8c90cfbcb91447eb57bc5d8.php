<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['product']));

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

foreach (array_filter((['product']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>
<?php
    $rating = [];
    foreach ($product->reviews as $review) {
        $rating[] = $review['rating'];
    }
    $reviews = sizeOf($rating);
    $rating = floor( array_sum($rating) / sizeOf($rating) );
?>

<a href="products/<?php echo e($product->id); ?>" class="flex group w-full bg-gray-200/50 space-x-4 rounded-lg">
    <div class=" bg-gray-200">
        <img class="flex w-56 h-56 aspect-square object-contain bg-gray-200 p-4 group-hover:bg-gray-200/40 transition-colors duration-200" src="<?php echo e(Vite::asset($product->images->last()->url)); ?>" alt="">

    </div>
    <div class="transition-colors duration-400 rounded-sm flex-1">
        <div class="my-2 mr-4">
            <h3 class="font-inter font-semibold text-2xl group-hover:text-omblue transition-colors overflow-ellipsis  duration-200 line-clamp-2"><?php echo e($product->title); ?></h3>
            <p class="mb-1 mt-2 font-medium text-3xl">$<?php echo e($product->price); ?></p>
            <?php if (isset($component)) { $__componentOriginaldaaa4f7e4868d5d2754fc46560cdd197 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldaaa4f7e4868d5d2754fc46560cdd197 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.rating','data' => ['rating' => $rating,'reviews' => $reviews]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('rating'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['rating' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($rating),'reviews' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($reviews)]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldaaa4f7e4868d5d2754fc46560cdd197)): ?>
<?php $attributes = $__attributesOriginaldaaa4f7e4868d5d2754fc46560cdd197; ?>
<?php unset($__attributesOriginaldaaa4f7e4868d5d2754fc46560cdd197); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldaaa4f7e4868d5d2754fc46560cdd197)): ?>
<?php $component = $__componentOriginaldaaa4f7e4868d5d2754fc46560cdd197; ?>
<?php unset($__componentOriginaldaaa4f7e4868d5d2754fc46560cdd197); ?>
<?php endif; ?>
            <p class="mt-4 line-clamp-2"><?php echo e($product->description); ?></p>
        </div>
    </div>
</a><?php /**PATH /var/www/html/resources/views/components/product-card-wide.blade.php ENDPATH**/ ?>