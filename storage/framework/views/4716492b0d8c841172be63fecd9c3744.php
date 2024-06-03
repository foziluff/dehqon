<?php
    $module = 'agroCredits';
    $title = 'Добавления агрокредита';
?>
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header"><?php echo e($title); ?></h5>
            <div class="card-body">
                <form action="<?php echo e(route($module . '.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="mb-3">
                        <label class="form-label">Название</label>
                        <input value="<?php echo e(old('title')); ?>" name="title" placeholder="Название" type="text" class="form-control">
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Описание*</label>
                        <textarea name="description" class="form-control" placeholder="Описание" rows="3" required><?php echo e(old('description')); ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Адрес</label>
                        <input value="<?php echo e(old('address')); ?>" name="address" placeholder="Адрес" type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Телефон</label>
                        <input value="<?php echo e(old('phone')); ?>" name="phone" placeholder="Телефон" type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input value="<?php echo e(old('email')); ?>" name="email" placeholder="Email" type="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Сайт</label>
                        <input value="<?php echo e(old('site')); ?>" name="site" placeholder="Сайт" type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Изображение</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Добавить</button>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dehqon\resources\views/admin/agroCredit/create.blade.php ENDPATH**/ ?>