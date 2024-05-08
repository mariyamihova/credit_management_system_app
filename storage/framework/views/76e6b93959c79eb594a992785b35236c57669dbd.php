<?php $__env->startSection('content'); ?>
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
    <?php if(Session::has('success')): ?>
        <div class="alert alert-success">
            <?php echo e(Session::get('success')); ?>

        </div>
    <?php endif; ?>

    <?php if(count($allActiveCredits) > 0): ?>
        <h2 style="text-align: center">Total count of active credits at the moment:  <?php echo e(count($allActiveCredits)); ?></h2>
    <?php else: ?>
        <h2 style="text-align: center">There are no active credits at the moment</h2>
    <?php endif; ?>

    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
        <tr>
            <th>Credit number</th>
            <th>Borrower name</th>
            <th>Requested amount</th>
            <th>Period</th>
            <th>Monthly payment</th>
        </tr>
        </thead>
        <tbody>

        <?php $__currentLoopData = $allActiveCredits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $credit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td> <?php echo e($credit['credit_number']); ?> </td>
                <td> <?php echo e($credit['name']); ?> </td>
                <td> <?php echo e($credit['requested_amount']); ?> </td>
                <td> <?php echo e($credit['credit_period']); ?> </td>
                <td> <?php echo e(round($credit['total_amount'] / $credit['credit_period'], 2)); ?> </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-right">
                <a class="btn btn-success" href="<?php echo e(route("credit.create")); ?>">Request new credit</a>
                <a class="btn btn-success" href="<?php echo e(route("payment.create")); ?>">Make payment</a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\mimihova\PhpstormProjects\credit_management_system\resources\views/credits/index.blade.php ENDPATH**/ ?>