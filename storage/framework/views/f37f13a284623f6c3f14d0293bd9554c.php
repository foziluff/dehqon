<?php
    $module = 'workPlans';
    $title = 'Редактирование плана работ';
?>
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header"><?php echo e($title); ?></h5>
            <div class="card-body">
                <form action="<?php echo e(route($module . '.update', $record->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PATCH'); ?>
                    <div class="mt-3">
                        <label class="form-label">Название*</label>
                        <input value="<?php echo e(old('title', $record->title)); ?>" name="title" placeholder="Название" type="text" class="form-control" required>
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Поле*</label>
                        <select id="field_id" class="form-select" name="field_id" required>
                            <option disabled selected>Выбрать поле</option>
                            <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($field->id); ?>" <?php echo e(old('field_id', $record->field_id) == $field->id ? 'selected' : ''); ?>><?php echo e($field->title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dehqon\resources\views\admin\field\work\workPlan\edit.blade.php ENDPATH**/ ?>