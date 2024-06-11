<?php
    $module = 'stocks';
    $title = 'Просмотр прихода';
?>

<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header"><?php echo e($title); ?></h5>
            <div class="card-body">
                <div class="mt-3">
                    <label class="form-label">Дата</label>
                    <div class="form-control"><?php echo e(\Carbon\Carbon::parse($record->date)->format('d-m-Y')); ?></div>
                </div>

                <div class="mt-3">
                    <label class="form-label">Название</label>
                    <div class="form-control"><?php echo e($record->title); ?></div>
                </div>

                <div class="mt-3">
                    <label class="form-label">Средство производства</label>
                    <div class="form-control"><?php echo e($record->consumptionProductionMean->title); ?></div>
                </div>

                <div class="mt-3">
                    <label class="form-label">Количество</label>
                    <div class="form-control"><?php echo e($record->quantity); ?></div>
                </div>

                <div class="mt-3">
                    <label class="form-label">Единица измерения</label>
                    <div class="form-control"><?php echo e($record->quantity_unit); ?></div>
                </div>

                <div class="mt-3">
                    <label class="form-label">Цена</label>
                    <div class="form-control"><?php echo e($record->price); ?></div>
                </div>

                <a href="<?php echo e(route($module . '.edit', $record->id)); ?>" class="btn btn-primary mt-3">Редактировать</a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dehqon\resources\views\admin\stock\show.blade.php ENDPATH**/ ?>