<?php
    $module = 'notes';
    $title = 'Добавление заметки';
?>
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header"><?php echo e($title); ?></h5>
            <div class="card-body">
                <form action="<?php echo e(route($module . '.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>

                    <div class="mt-3">
                        <label class="form-label">Мои поли*</label>
                        <select id="field_id" class="form-select" name="field_id" required>
                            <option disabled selected>Выбрать поле</option>
                            <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($field->id); ?>" <?php echo e(old('field_id') == $field->id ? 'selected' : ''); ?>><?php echo e($field->title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Дата*</label>
                        <input value="<?php echo e(\Carbon\Carbon::parse(old('date'))->format('Y-m-d')); ?>" name="date" type="date" class="form-control" required>
                    </div>

                    <div class="mt-3">
                        <label for="problem_id" class="form-label">Проблема*</label>
                        <select id="problem_id" class="form-select" name="problem_id" required>
                            <option disabled selected>Выбрать проблему</option>
                            <?php $__currentLoopData = $problems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $problem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($problem->id); ?>" <?php echo e(old('problem_id') == $problem->id ? 'selected' : ''); ?>><?php echo e($problem->title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Описание*</label>
                        <textarea name="description" class="form-control" rows="3" required><?php echo e(old('description')); ?></textarea>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Площадь поражения*</label>
                        <input value="<?php echo e(old('defeated_area')); ?>" name="defeated_area" placeholder="Площадь поражения" type="number" class="form-control" required>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Изображения</label>
                        <input type="file" name="images[]" class="form-control" multiple>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Добавить</button>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dehqon\resources\views\admin\field\note\create.blade.php ENDPATH**/ ?>