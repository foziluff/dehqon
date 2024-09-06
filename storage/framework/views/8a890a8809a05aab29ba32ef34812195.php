<?php
    $module = 'rotations';
    $title = 'Просмотр севооборота';
?>
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header"><?php echo e($title); ?></h5>
            <div class="card-body">
                <div class="mt-3">
                    <label class="form-label">Поле*</label>
                    <input type="text" class="form-control" value="<?php echo e($record->field->title); ?>" readonly>
                </div>

                <div class="mt-3">
                    <label class="form-label">Культура*</label>
                    <input type="text" class="form-control" value="<?php echo e($record->culture->title); ?>" readonly>
                </div>

                <div class="mt-3">
                    <label class="form-label">Сорт культуры*</label>
                    <input type="text" class="form-control" value="<?php echo e($record->culture_sort); ?>" readonly>
                </div>

                <div class="mt-3">
                    <label class="form-label">Дата посева*</label>
                    <input type="text" class="form-control" value="<?php echo e($record->sowing_date); ?>" readonly>
                </div>

                <div class="mt-3">
                    <label class="form-label">Дата сбора*</label>
                    <input type="text" class="form-control" value="<?php echo e($record->harvesting_date); ?>" readonly>
                </div>

                <div class="mt-3">
                    <label class="form-label">Средний урожай*</label>
                    <input type="text" class="form-control" value="<?php echo e($record->average_yield); ?>" readonly>
                </div>

                <div class="mt-3">
                    <label class="form-label">Единица измерения урожая*</label>
                    <input type="text" class="form-control" value="<?php echo e($record->average_yield_unit); ?>" readonly>
                </div>

                <?php if(Auth::user()->role == 1): ?>
                    <a href="<?php echo e(route($module . '.edit', $record->id)); ?>" class="btn btn-primary mt-3">Редактировать</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dehqon\resources\views\admin\field\rotation\show.blade.php ENDPATH**/ ?>