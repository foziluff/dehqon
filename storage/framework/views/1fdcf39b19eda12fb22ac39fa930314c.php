<?php if(session('success')): ?>
    <div class="alert alert-success mt-3" role="alert">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>
<?php if($errors->any()): ?>
    <div class="alert alert-danger mt-3" role="alert">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\dehqon\resources\views\admin\layouts\components\messages.blade.php ENDPATH**/ ?>