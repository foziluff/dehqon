<?php
    $module = 'workPlans';
    $title = 'Просмотр плана работ';
?>
<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header"><?php echo e($title); ?></h5>
            <div class="card-body">
                <a href="<?php echo e(route('workPlans.workStages', $record->id)); ?>" type="button" class="btn btn-outline-secondary mr-1">Этап работ</a>
                <div class="mt-3">
                    <label class="form-label">Название</label>
                    <div class="form-control"><?php echo e($record->title); ?></div>
                </div>

                <div class="mt-3">
                    <label class="form-label">Поле</label>
                    <div class="form-control"><?php echo e($record->field->title); ?></div>
                </div>

                <a href="<?php echo e(route($module . '.edit', $record->id)); ?>" class="btn btn-primary mt-3">Редактировать</a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dehqon\resources\views/admin/field/work/workPlan/show.blade.php ENDPATH**/ ?>