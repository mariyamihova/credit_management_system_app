<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Request new credit</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="<?php echo e(route('credit.index')); ?>">Back</a>
            </div>
        </div>
    </div>
    <form action="<?php echo e(route('credit.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Borrower name:</strong>
                    <input type="text" name="borrower_name" class="form-control" value="<?php echo e(old('borrower_name')); ?>" placeholder="Borrower name">
                    <?php if($errors->has('borrower_name')): ?>
                        <div class="alert alert-danger"><?php echo e($errors->first('borrower_name')); ?></div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Requested amount</strong>
                    <input type="number" name="requested_amount" class="form-control" value="<?php echo e(old('requested_amount')); ?>" placeholder="Requested amount">
                    <?php if($errors->has('requested_amount')): ?>
                        <div class="alert alert-danger"><?php echo e($errors->first('requested_amount')); ?></div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Period</strong>
                    <input type="number" name="credit_period" class="form-control" value="<?php echo e(old('credit_period')); ?>" placeholder="Period">
                    <?php if($errors->has('credit_period')): ?>
                        <div class="alert alert-danger"><?php echo e($errors->first('credit_period')); ?></div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12" >
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\mimihova\PhpstormProjects\credit_management_system\resources\views/credits/create.blade.php ENDPATH**/ ?>