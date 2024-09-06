<?php
    $module = 'conversionConsumptions';
    $title = 'Редактирование расхода';
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
                            <option disabled selected>Select conversion</option>
                            <?php $__currentLoopData = $conversions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $conversion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($conversion->id); ?>" <?php echo e($record->conversion_id == $conversion->id ? 'selected' : ''); ?>><?php echo e($conversion->title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Тип продукта*</label>
                        <select name="product_type_id" class="form-select" required>
                            <option disabled selected>Select Product Type</option>
                            <?php $__currentLoopData = $productTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($productType->id); ?>" <?php echo e($record->product_type_id == $productType->id ? 'selected' : ''); ?>><?php echo e($productType->title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Тип переработки*</label>
                        <select name="conversion_type_id" class="form-select" required>
                            <option disabled selected>Select Product Type</option>
                            <?php $__currentLoopData = $conversionTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $conversionType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($conversionType->id); ?>" <?php echo e($record->conversion_type_id == $conversionType->id ? 'selected' : ''); ?>><?php echo e($conversionType->title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Культура*</label>
                        <select name="culture_id" class="form-select" required>
                            <option disabled selected>Select Culture</option>
                            <?php $__currentLoopData = $cultures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $culture): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($culture->id); ?>" <?php echo e($record->culture_id == $culture->id ? 'selected' : ''); ?>><?php echo e($culture->title_ru); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Категория*</label>
                        <select name="conversion_category_id" class="form-select" required>
                            <option disabled selected>Select conversion Category</option>
                            <?php $__currentLoopData = $conversionCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->id); ?>" <?php echo e($record->conversion_category_id == $category->id ? 'selected' : ''); ?>><?php echo e($category->title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Операция*</label>
                        <select name="conversion_operation_id" class="form-select" required>
                            <option disabled selected>Select conversion Operation</option>
                            <?php $__currentLoopData = $conversionOperations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $operation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($operation->id); ?>" <?php echo e($record->conversion_operation_id == $operation->id ? 'selected' : ''); ?>><?php echo e($operation->title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Средство производства*</label>
                        <select name="conversion_production_mean_id" class="form-select" required>
                            <option disabled selected>Select conversion Production Mean</option>
                            <?php $__currentLoopData = $conversionProductionMeans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mean): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($mean->id); ?>" <?php echo e($record->conversion_production_mean_id == $mean->id ? 'selected' : ''); ?>><?php echo e($mean->title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Наименование*</label>
                        <select name="conversion_naming_id" class="form-select" required>
                            <option disabled selected>Select conversion Naming</option>
                            <?php $__currentLoopData = $conversionNamings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $naming): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($naming->id); ?>" <?php echo e($record->conversion_naming_id == $naming->id ? 'selected' : ''); ?>><?php echo e($naming->title); ?></option>
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

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dehqon\resources\views\admin\conversion\consumption\edit.blade.php ENDPATH**/ ?>