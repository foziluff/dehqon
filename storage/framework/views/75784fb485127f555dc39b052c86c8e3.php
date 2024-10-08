<?php
    $module = 'productQuantities';
    $title = 'Просмотр количество продукции';
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
                    <div class="form-control"><?php echo e($record->date); ?></div>
                </div>

                <div class="mt-3">
                    <label class="form-label">Поле</label>
                    <div class="form-control"><?php echo e($record->field->title); ?></div>
                </div>

                <div class="mt-3">
                    <label class="form-label">Тип продукта</label>
                    <div class="form-control"><?php echo e($record->productType->title); ?></div>
                </div>

                <div class="mt-3">
                    <label class="form-label">Культура</label>
                    <div class="form-control"><?php echo e($record->culture->title); ?></div>
                </div>

                <div class="mt-3">
                    <label class="form-label">Количество</label>
                    <div class="form-control"><?php echo e($record->quantity); ?></div>
                </div>

                <div class="mt-3">
                    <label class="form-label">Единица измерения</label>
                    <div class="form-control"><?php echo e($record->quantity_unit); ?></div>
                </div>
                <?php if(Auth::user()->role == 1): ?>
                <a href="<?php echo e(route($module . '.edit', $record->id)); ?>" class="btn btn-primary mt-3">Редактировать</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dehqon\resources\views\admin\field\productQuantity\show.blade.php ENDPATH**/ ?>