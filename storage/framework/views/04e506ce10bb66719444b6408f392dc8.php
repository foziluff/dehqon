<?php
    $module = 'cultures';
    $title = 'Просмотр культуры';
?>
<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header"><?php echo e($title); ?></h5>
            <div class="card-body">
                <a href="<?php echo e(route('cultures.cultureSeasons', $record->id)); ?>" type="button" class="btn btn-outline-secondary mr-1">Сезоны</a>
                <div class="mt-3 form-control">
                    <div class="mt-3">
                        <div class="image-container">
                            <img src="<?php echo e(asset($record->image_path)); ?>" alt="Изображение" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <label class="form-label">Название (Русский)</label>
                    <div class="form-control"><?php echo e($record->title_ru); ?></div>
                </div>

                <div class="mt-3">
                    <label class="form-label">Название (Узбекский)</label>
                    <div class="form-control"><?php echo e($record->title_uz); ?></div>
                </div>

                <div class="mt-3">
                    <label class="form-label">Название (Таджикский)</label>
                    <div class="form-control"><?php echo e($record->title_tj); ?></div>
                </div>

                <a href="<?php echo e(route($module . '.edit', $record->id)); ?>" class="btn btn-primary mt-3">Редактировать</a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dehqon\resources\views\admin\culture\show.blade.php ENDPATH**/ ?>