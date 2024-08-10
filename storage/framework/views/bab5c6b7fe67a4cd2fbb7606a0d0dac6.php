<?php
    $module = 'agroCredits';
    $title = 'Редактирование агрокредита';
?>
<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header"><?php echo e($title); ?></h5>
            <div class="card-body">
                <form action="<?php echo e(route($module . '.update', $record->id)); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo method_field('PATCH'); ?> <?php echo csrf_field(); ?>

                    <!-- Existing Image -->
                    <div class="mt-3 form-control">
                        <div class="mt-3">
                            <div class="image-container">
                                <img src="<?php echo e(asset($record->image_path)); ?>" alt="Изображение" class="img-fluid">
                            </div>
                        </div>
                    </div>

                    <!-- Title Fields -->
                    <div class="mt-3">
                        <label class="form-label">Название (RU)</label>
                        <input value="<?php echo e($record->title_ru); ?>" name="title_ru" placeholder="Название" type="text" class="form-control">
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Название (UZ)</label>
                        <input value="<?php echo e($record->title_uz); ?>" name="title_uz" placeholder="Название" type="text" class="form-control">
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Название (TJ)</label>
                        <input value="<?php echo e($record->title_tj); ?>" name="title_tj" placeholder="Название" type="text" class="form-control">
                    </div>

                    <!-- Description Fields -->
                    <div class="mt-3">
                        <label class="form-label">Описание (RU)</label>
                        <textarea name="description_ru" class="form-control" rows="3"><?php echo e($record->description_ru); ?></textarea>
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Описание (UZ)</label>
                        <textarea name="description_uz" class="form-control" rows="3"><?php echo e($record->description_uz); ?></textarea>
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Описание (TJ)</label>
                        <textarea name="description_tj" class="form-control" rows="3"><?php echo e($record->description_tj); ?></textarea>
                    </div>

                    <!-- Address Fields -->
                    <div class="mt-3">
                        <label class="form-label">Адрес (RU)</label>
                        <input value="<?php echo e($record->address_ru); ?>" name="address_ru" placeholder="Адрес" type="text" class="form-control">
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Адрес (UZ)</label>
                        <input value="<?php echo e($record->address_uz); ?>" name="address_uz" placeholder="Адрес" type="text" class="form-control">
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Адрес (TJ)</label>
                        <input value="<?php echo e($record->address_tj); ?>" name="address_tj" placeholder="Адрес" type="text" class="form-control">
                    </div>

                    <!-- Common Fields -->
                    <div class="mt-3">
                        <label class="form-label">Телефон</label>
                        <input value="<?php echo e($record->phone); ?>" name="phone" placeholder="Телефон" type="text" class="form-control">
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Email</label>
                        <input value="<?php echo e($record->email); ?>" name="email" placeholder="Email" type="email" class="form-control">
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Сайт</label>
                        <input value="<?php echo e($record->site); ?>" name="site" placeholder="Сайт" type="text" class="form-control">
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Изображение</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary mt-3 mr-1">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dehqon\resources\views/admin/agroCredit/edit.blade.php ENDPATH**/ ?>