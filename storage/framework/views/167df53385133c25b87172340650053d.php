<?php
    $module = 'conversionIncomes';
    $title = 'Редактирование дохода';
?>

<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header"><?php echo e($title); ?></h5>
            <div class="card-body">
                <form action="<?php echo e(route($module . '.update', $record->id)); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PATCH'); ?>
                    <div class="mt-3">
                        <label class="form-label">Дата*</label>
                        <input value="<?php echo e(\Carbon\Carbon::parse($record->date)->format('Y-m-d')); ?>" name="date" type="date" class="form-control" required>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Переработка*</label>
                        <select name="conversion_id" class="form-select" required>
                            <option disabled selected>Select Conversion</option>
                            <?php $__currentLoopData = $conversions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $conversion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($conversion->id); ?>" <?php echo e($record->conversion_id == $conversion->id ? 'selected' : ''); ?>><?php echo e($conversion->title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Тип переработки*</label>
                        <select name="conversion_type_id" class="form-select" required>
                            <option disabled selected>Select Conversion Type</option>
                            <?php $__currentLoopData = $conversionTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $conversionType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($conversionType->id); ?>" <?php echo e($record->conversion_type_id == $conversionType->id ? 'selected' : ''); ?>><?php echo e($conversionType->title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Наименование*</label>
                        <select name="conversion_naming_id" class="form-select" required>
                            <option disabled selected>Select Conversion Naming</option>
                            <?php $__currentLoopData = $conversionNamings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $conversionNaming): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($conversionNaming->id); ?>" <?php echo e($record->conversion_naming_id == $conversionNaming->id ? 'selected' : ''); ?>><?php echo e($conversionNaming->title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Количество*</label>
                        <input value="<?php echo e(old('quantity', $record->quantity)); ?>" name="quantity" type="number" class="form-control" required>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Единица измерения*</label>
                        <input value="<?php echo e(old('quantity_unit', $record->quantity_unit)); ?>" name="quantity_unit" type="text" class="form-control" required>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Цена*</label>
                        <input value="<?php echo e(old('price', $record->price)); ?>" name="price" type="number" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dehqon\resources\views/admin/conversion/income/edit.blade.php ENDPATH**/ ?>