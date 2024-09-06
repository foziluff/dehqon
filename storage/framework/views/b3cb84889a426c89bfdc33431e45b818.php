<?php
    $module = 'organizations';
    $title = 'Добавление организатора';
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

                    <!-- Title Fields -->
                    <div class="mb-3">
                        <label class="form-label">Название (RU)</label>
                        <input value="<?php echo e(old('title_ru')); ?>" name="title_ru" placeholder="Название" type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Название (UZ)</label>
                        <input value="<?php echo e(old('title_uz')); ?>" name="title_uz" placeholder="Название" type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Название (TJ)</label>
                        <input value="<?php echo e(old('title_tj')); ?>" name="title_tj" placeholder="Название" type="text" class="form-control">
                    </div>

                    <!-- Description Fields -->
                    <div class="mt-3">
                        <label class="form-label">Описание (RU)*</label>
                        <textarea name="description_ru" class="form-control" placeholder="Описание" rows="3" required><?php echo e(old('description_ru')); ?></textarea>
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Описание (UZ)*</label>
                        <textarea name="description_uz" class="form-control" placeholder="Описание" rows="3" required><?php echo e(old('description_uz')); ?></textarea>
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Описание (TJ)*</label>
                        <textarea name="description_tj" class="form-control" placeholder="Описание" rows="3" required><?php echo e(old('description_tj')); ?></textarea>
                    </div>

                    <!-- Address Fields -->
                    <div class="mb-3">
                        <label class="form-label">Адрес (RU)</label>
                        <input value="<?php echo e(old('address_ru')); ?>" name="address_ru" placeholder="Адрес" type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Адрес (UZ)</label>
                        <input value="<?php echo e(old('address_uz')); ?>" name="address_uz" placeholder="Адрес" type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Адрес (TJ)</label>
                        <input value="<?php echo e(old('address_tj')); ?>" name="address_tj" placeholder="Адрес" type="text" class="form-control">
                    </div>

                    <!-- Common Fields -->
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

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dehqon\resources\views\admin\organization\create.blade.php ENDPATH**/ ?>