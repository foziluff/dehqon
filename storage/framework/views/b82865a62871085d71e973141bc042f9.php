<?php
    $module = 'irrigations';
    $title = 'Просмотр ирригации';
?>
<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header"><?php echo e($title); ?></h5>
            <div class="card-body">
                <a href="<?php echo e(route('irrigations.irrigationTypes', $record->id)); ?>" type="button" class="btn btn-outline-secondary mr-1">Типы</a>

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

                <a href="<?php echo e(route($module . '.edit', $record->id)); ?>" class="btn btn-primary mt-3">Редактировать</a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dehqon\resources\views\admin\irrigation\show.blade.php ENDPATH**/ ?>