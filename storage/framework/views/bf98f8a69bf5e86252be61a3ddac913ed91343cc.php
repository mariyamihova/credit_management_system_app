<!DOCTYPE html>
<html>
<head>
    <?php echo $__env->make('head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body>
<div class="container">
    <header class="row">
        <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </header>
    <div id="main" class="row">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
    <footer class="row">
        <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </footer>
</div>
</body>
</html>
<?php /**PATH C:\Users\mimihova\PhpstormProjects\credit_management_system\resources\views/layout.blade.php ENDPATH**/ ?>