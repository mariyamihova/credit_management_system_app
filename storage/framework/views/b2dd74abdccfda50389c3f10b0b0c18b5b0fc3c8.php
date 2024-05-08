<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Make payment</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="<?php echo e(route('credit.index')); ?>">Back</a>
            </div>
        </div>
    </div>
    <form action="<?php echo e(route('payment.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <select name="credit_id" id="credit_id" class="form-control">
                    <option value="-1">Select credit</option>
                    <?php $__currentLoopData = $activeCredits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $credit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($credit['id']); ?>">
                            <?php echo e($credit['credit_number']); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('credit_id')): ?>
                    <div class="alert alert-danger"><?php echo e($errors->first('credit_id')); ?></div>
                <?php endif; ?>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Payment amount</strong>
                    <input type="number" name="amount" class="form-control" value="<?php echo e(old('amount')); ?>" placeholder="Payment amount">
                    <?php if($errors->has('amount')): ?>
                        <div class="alert alert-danger"><?php echo e($errors->first('amount')); ?></div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\mimihova\PhpstormProjects\credit_management_system\resources\views/payments/create.blade.php ENDPATH**/ ?>