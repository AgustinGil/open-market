<?php
    $rating = [];
    foreach ($product->reviews as $review) {
        $rating[] = $review['rating'];
    }
    $reviews = sizeOf($rating);
    $rating = floor(array_sum($rating) / sizeOf($rating));
?>

<?php if (isset($component)) { $__componentOriginal23a33f287873b564aaf305a1526eada4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal23a33f287873b564aaf305a1526eada4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <h3><span class="text-gray-500">Products / <a href="http://localhost/search?category=<?php echo e($product->category->id); ?>">
                <?php echo e($product->category->name); ?></a> / </span><?php echo e($product->title); ?></h3>
    <div class="grid grid-cols-[60%_40%] mt-5">
        <div class="flex justify-center items-center">
            <img class="max-h-[40rem]" draggable="false" src="<?php echo e(Vite::asset($product->images->first()->url)); ?>"
                alt="">
        </div>
        <div class="flex flex-col justify-between">
            <div>
                <h1 class="font-semibold text-3xl mb-2"><?php echo e($product->title); ?></h1>

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

                <p class="font-base text-2xl mt-4 mb-2">$<?php echo e($product->price); ?></p>

                <p><?php echo e($product->description); ?></p>
            </div>

            <form action="/order/<?php echo e($product->id); ?>" method="GET" class="mb-16">
                <?php if (isset($component)) { $__componentOriginalbb660c7d3380b22758129b879204cbaa = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbb660c7d3380b22758129b879204cbaa = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form-button','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Comprar <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbb660c7d3380b22758129b879204cbaa)): ?>
<?php $attributes = $__attributesOriginalbb660c7d3380b22758129b879204cbaa; ?>
<?php unset($__attributesOriginalbb660c7d3380b22758129b879204cbaa); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbb660c7d3380b22758129b879204cbaa)): ?>
<?php $component = $__componentOriginalbb660c7d3380b22758129b879204cbaa; ?>
<?php unset($__componentOriginalbb660c7d3380b22758129b879204cbaa); ?>
<?php endif; ?>
            </form>
        </div>
    </div>

    <div class="mt-8">
        <h2 class="mb-4 text-2xl font-bold">Reviews</h2>
        <ul class="space-y-8">
            <?php $__currentLoopData = $product->reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="bg-gray-200 p-8 rounded-lg">
                    <div class="mb-4 ">
                        <h4 class="text-lg font-semibold"><?php echo e($review->user->name); ?></h4>
                        <h4 class=""><?php echo e($review->user->email); ?></h4>
                    </div>
                    <?php if (isset($component)) { $__componentOriginaldaaa4f7e4868d5d2754fc46560cdd197 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldaaa4f7e4868d5d2754fc46560cdd197 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.rating','data' => ['rating' => $review->rating]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('rating'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['rating' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($review->rating)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldaaa4f7e4868d5d2754fc46560cdd197)): ?>
<?php $attributes = $__attributesOriginaldaaa4f7e4868d5d2754fc46560cdd197; ?>
<?php unset($__attributesOriginaldaaa4f7e4868d5d2754fc46560cdd197); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldaaa4f7e4868d5d2754fc46560cdd197)): ?>
<?php $component = $__componentOriginaldaaa4f7e4868d5d2754fc46560cdd197; ?>
<?php unset($__componentOriginaldaaa4f7e4868d5d2754fc46560cdd197); ?>
<?php endif; ?>
                    <p class="mt-2"><?php echo e($review->comment); ?></p>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $attributes = $__attributesOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__attributesOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $component = $__componentOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__componentOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?>
<?php /**PATH /var/www/html/resources/views/products/show.blade.php ENDPATH**/ ?>