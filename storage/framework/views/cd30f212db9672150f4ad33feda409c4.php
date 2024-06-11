<?php
    $module = 'irrigationTypes';
    $title = 'Добавления типа орощения';
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
                        <label class="form-label">Название</label>
                        <input value="<?php echo e(old('title')); ?>" name="title" placeholder="Название" type="text" class="form-control">
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Описание</label>
                        <textarea name="description" placeholder="Описание"class="form-control"><?php echo e(old('description')); ?></textarea>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Орощении*</label>
                        <select id="irrigation_id" class="form-select" name="irrigation_id" required>
                            <option disabled selected>Выбрать</option>
                            <?php $__currentLoopData = $irrigations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $irrigation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($irrigation->id); ?>" <?php echo e(old('irrigation_id') == $irrigation->id ? 'selected' : ''); ?>><?php echo e($irrigation->title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
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

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dehqon\resources\views\admin\irrigation\irrigationType\create.blade.php ENDPATH**/ ?>