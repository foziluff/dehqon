<?php
    $module = 'agroMarkets';
    $title = 'Просмотр агромаркета';
?>
<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header"><?php echo e($title); ?></h5>
            <div class="card-body">
                <div class="mt-3 form-control">
                    <div class="mt-3">
                        <div class="image-container">
                            <img src="<?php echo e(asset($record->image_path)); ?>" alt="Изображение" class="img-fluid">
                        </div>
                    </div>
                </div>

                <div class="mt-3">
                    <label class="form-label">Название (RU)</label>
                    <div class="form-control"><?php echo e($record->title_ru); ?></div>
                </div>
                <div class="mt-3">
                    <label class="form-label">Название (UZ)</label>
                    <div class="form-control"><?php echo e($record->title_uz); ?></div>
                </div>
                <div class="mt-3">
                    <label class="form-label">Название (TJ)</label>
                    <div class="form-control"><?php echo e($record->title_tj); ?></div>
                </div>

                <div class="mt-3">
                    <label class="form-label">Адрес (RU)</label>
                    <div class="form-control"><?php echo e($record->address_ru); ?></div>
                </div>
                <div class="mt-3">
                    <label class="form-label">Адрес (UZ)</label>
                    <div class="form-control"><?php echo e($record->address_uz); ?></div>
                </div>
                <div class="mt-3">
                    <label class="form-label">Адрес (TJ)</label>
                    <div class="form-control"><?php echo e($record->address_tj); ?></div>
                </div>

                <div class="mt-3">
                    <label class="form-label">Телефон</label>
                    <div class="form-control"><?php echo e($record->phone); ?></div>
                </div>
                <div class="mt-3">
                    <label class="form-label">Email</label>
                    <div class="form-control"><?php echo e($record->email); ?></div>
                </div>
                <div class="mt-3">
                    <label class="form-label">Сайт</label>
                    <div class="form-control"><?php echo e($record->site); ?></div>
                </div>

                <a href="<?php echo e(route($module . '.edit', $record->id)); ?>" class="btn btn-primary mt-3">Редактировать</a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dehqon\resources\views\admin\agroMarket\show.blade.php ENDPATH**/ ?>