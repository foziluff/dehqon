<?php
    $module = 'workStages';
    $title = 'Просмотр этапа работ';
?>
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header"><?php echo e($title); ?></h5>
            <div class="card-body">
                <div class="mt-3">
                    <label class="form-label">Дата</label>
                    <div class="form-control"><?php echo e($record->date); ?></div>
                </div>
                <div class="mt-3">
                    <label class="form-label">Работа</label>
                    <div class="form-control"><?php echo e($record->work->title); ?></div>
                </div>
                <div class="mt-3">
                    <label class="form-label">Материал</label>
                    <div class="form-control"><?php echo e($record->material); ?></div>
                </div>
                <div class="mt-3">
                    <label class="form-label">Количество материала</label>
                    <div class="form-control"><?php echo e($record->material_quantity); ?></div>
                </div>
                <div class="mt-3">
                    <label class="form-label">Единица измерения материала</label>
                    <div class="form-control"><?php echo e($record->material_quantity_unit); ?></div>
                </div>
                <a href="<?php echo e(route($module . '.edit', $record->id)); ?>" class="btn btn-primary mt-3">Редактировать</a>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dehqon\resources\views\admin\field\work\workStage\show.blade.php ENDPATH**/ ?>