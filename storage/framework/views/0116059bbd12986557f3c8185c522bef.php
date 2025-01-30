<?php
    $module = 'protectiveEquipmentItems';
    $title = 'Просмотр';
?>
<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header"><?php echo e($title); ?></h5>
            <div class="card-body">

                <div class="image-container">
                    <img src="<?php echo e(asset($record->image_path)); ?>" alt="Изображение" class="img-fluid">
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
                    <label class="form-label">Средство защиты*</label>
                    <div class="form-control"><?php echo e($record->protectiveEquipment->title_ru); ?></div>
                </div>

                <div class="mt-3">
                    <label class="form-label">Описание (Русский)</label>
                    <textarea class="form-control" rows="3" readonly><?php echo e($record->description_ru); ?></textarea>
                </div>

                <div class="mt-3">
                    <label class="form-label">Описание (Узбекский)</label>
                    <textarea class="form-control" rows="3" readonly><?php echo e($record->description_uz); ?></textarea>
                </div>

                <div class="mt-3">
                    <label class="form-label">Описание (Таджикский)</label>
                    <textarea class="form-control" rows="3" readonly><?php echo e($record->description_tj); ?></textarea>
                </div>

                <a href="<?php echo e(route($module . '.edit', $record->id)); ?>" class="btn btn-primary mt-3">Редактировать</a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/dehqon/resources/views/admin/protectiveEquipment/protectiveEquipmentItem/show.blade.php ENDPATH**/ ?>