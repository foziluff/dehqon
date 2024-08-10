<?php
    $module = 'irrigationTypes';
    $title = 'Добавления типа орошения';
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
                        <label class="form-label">Название (RU)</label>
                        <input value="<?php echo e(old('title_ru')); ?>" name="title_ru" placeholder="Название на русском" type="text" class="form-control">
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Название (UZ)</label>
                        <input value="<?php echo e(old('title_uz')); ?>" name="title_uz" placeholder="Название на узбекском" type="text" class="form-control">
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Название (TJ)</label>
                        <input value="<?php echo e(old('title_tj')); ?>" name="title_tj" placeholder="Название на таджикском" type="text" class="form-control">
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Описание (RU)</label>
                        <textarea name="description_ru" placeholder="Описание на русском" class="form-control"><?php echo e(old('description_ru')); ?></textarea>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Описание (UZ)</label>
                        <textarea name="description_uz" placeholder="Описание на узбекском" class="form-control"><?php echo e(old('description_uz')); ?></textarea>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Описание (TJ)</label>
                        <textarea name="description_tj" placeholder="Описание на таджикском" class="form-control"><?php echo e(old('description_tj')); ?></textarea>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Орошение*</label>
                        <select id="irrigation_id" class="form-select" name="irrigation_id" required>
                            <option disabled selected>Выбрать</option>
                            <?php $__currentLoopData = $irrigations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $irrigation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($irrigation->id); ?>" <?php echo e(old('irrigation_id') == $irrigation->id ? 'selected' : ''); ?>><?php echo e($irrigation->title_ru); ?></option>
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

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dehqon\resources\views/admin/irrigation/irrigationType/create.blade.php ENDPATH**/ ?>