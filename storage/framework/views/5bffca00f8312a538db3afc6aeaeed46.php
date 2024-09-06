<?php
    $module = 'rotations';
    $title = 'Добавление севооборота';
?>
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header"><?php echo e($title); ?></h5>
            <div class="card-body">
                <form action="<?php echo e(route($module . '.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>

                    <div class="mt-3">
                        <label class="form-label">Поле*</label>
                        <select id="field_id" class="form-select" name="field_id" required>
                            <option disabled selected>Выбрать поле</option>
                            <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($field->id); ?>" <?php echo e(old('field_id') == $field->id ? 'selected' : ''); ?>><?php echo e($field->title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Культура*</label>
                        <select id="culture_id" class="form-select" name="culture_id" required>
                            <option disabled selected>Выбрать культуру</option>
                            <?php $__currentLoopData = $cultures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $culture): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($culture->id); ?>" <?php echo e(old('culture_id') == $culture->id ? 'selected' : ''); ?>><?php echo e($culture->title_ru); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Сорт культуры*</label>
                        <input value="<?php echo e(old('culture_sort')); ?>" name="culture_sort" type="text" class="form-control" required>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Дата посева*</label>
                        <input value="<?php echo e(\Carbon\Carbon::parse(old('sowing_date'))->format('Y-m-d')); ?>" name="sowing_date" type="date" class="form-control" required>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Дата сбора*</label>
                        <input value="<?php echo e(\Carbon\Carbon::parse(old('harvesting_date'))->format('Y-m-d')); ?>" name="harvesting_date" type="date" class="form-control" required>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Средний урожай*</label>
                        <input value="<?php echo e(old('average_yield')); ?>" name="average_yield" type="number" class="form-control" required>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Единица измерения урожая*</label>
                        <input value="<?php echo e(old('average_yield_unit')); ?>" name="average_yield_unit" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Добавить</button>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dehqon\resources\views\admin\field\rotation\create.blade.php ENDPATH**/ ?>