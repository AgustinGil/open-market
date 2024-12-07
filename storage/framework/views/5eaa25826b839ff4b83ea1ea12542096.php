<form <?php echo e($attributes(["class" => "max-w-2xl mx-auto min-y-4xl space-y-6", "method" => "GET"])); ?>>
    <?php if($attributes->get('method', 'GET') !== 'GET'): ?>
    <?php echo csrf_field(); ?>
    <?php echo method_field($attributes->get('method')); ?>
    <?php endif; ?>

    <?php echo e($slot); ?>

</form><?php /**PATH /var/www/html/resources/views/components/form.blade.php ENDPATH**/ ?>