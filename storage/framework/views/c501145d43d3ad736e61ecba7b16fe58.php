<?php
    $module = 'agroMarkets';
    $title = 'Редактирование агромаркета';
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
                    <div class="mt-3 form-control">
                        <div class="mt-3">
                            <div class="image-container">
                                <img src="<?php echo e(asset($record->image_path)); ?>" alt="Изображение" class="img-fluid">
                            </div>
                        </div>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Название (RU)</label>
                        <input value="<?php echo e($record->title_ru); ?>" name="title_ru" placeholder="Название (RU)" type="text" class="form-control">
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Название (UZ)</label>
                        <input value="<?php echo e($record->title_uz); ?>" name="title_uz" placeholder="Название (UZ)" type="text" class="form-control">
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Название (TJ)</label>
                        <input value="<?php echo e($record->title_tj); ?>" name="title_tj" placeholder="Название (TJ)" type="text" class="form-control">
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Адрес (RU)</label>
                        <input value="<?php echo e($record->address_ru); ?>" name="address_ru" placeholder="Адрес (RU)" type="text" class="form-control">
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Адрес (UZ)</label>
                        <input value="<?php echo e($record->address_uz); ?>" name="address_uz" placeholder="Адрес (UZ)" type="text" class="form-control">
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Адрес (TJ)</label>
                        <input value="<?php echo e($record->address_tj); ?>" name="address_tj" placeholder="Адрес (TJ)" type="text" class="form-control">
                    </div>

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

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dehqon\resources\views/admin/agroMarket/edit.blade.php ENDPATH**/ ?>