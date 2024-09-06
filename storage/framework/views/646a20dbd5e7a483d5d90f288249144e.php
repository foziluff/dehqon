<?php
    $module = 'irrigationTypes';
    $title = 'Редактирование типа орошения';
?>
<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header"><?php echo e($title); ?></h5>
            <div class="card-body">

                <?php if(!$images->isEmpty()): ?>
                    <div class="mt-3 form-control">
                        <div class="mt-3">
                            <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="image-container">
                                    <form action="<?php echo e(route('irrigationTypeImages.destroy', $image->id)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <img src="<?php echo e(asset($image->image_path)); ?>" alt="Изображение" class="img-fluid">
                                        <button type="submit" class="btn btn-icon btn-outline-danger">
                                            <span class="tf-icons bx bx-trash"></span>
                                        </button>
                                    </form>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php endif; ?>
                <form action="<?php echo e(route($module . '.update', $record->id)); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo method_field('PATCH'); ?><?php echo csrf_field(); ?>
                    <div class="mt-3">
                        <label class="form-label">Название (RU)</label>
                        <input value="<?php echo e($record->title_ru); ?>" name="title_ru" placeholder="Название на русском" type="text" class="form-control">
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Название (UZ)</label>
                        <input value="<?php echo e($record->title_uz); ?>" name="title_uz" placeholder="Название на узбекском" type="text" class="form-control">
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Название (TJ)</label>
                        <input value="<?php echo e($record->title_tj); ?>" name="title_tj" placeholder="Название на таджикском" type="text" class="form-control">
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Описание (RU)</label>
                        <textarea name="description_ru" placeholder="Описание на русском" class="form-control"><?php echo e($record->description_ru); ?></textarea>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Описание (UZ)</label>
                        <textarea name="description_uz" placeholder="Описание на узбекском" class="form-control"><?php echo e($record->description_uz); ?></textarea>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Описание (TJ)</label>
                        <textarea name="description_tj" placeholder="Описание на таджикском" class="form-control"><?php echo e($record->description_tj); ?></textarea>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Орошение*</label>
                        <select id="irrigation_id" class="form-select" name="irrigation_id" required>
                            <option disabled selected>Выбрать</option>
                            <?php $__currentLoopData = $irrigations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $irrigation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($irrigation->id); ?>" <?php echo e($record->irrigation_id == $irrigation->id ? 'selected' : ''); ?>><?php echo e($irrigation->title_ru); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Изображения</label>
                        <input type="file" name="images[]" class="form-control" multiple>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3 mr-1">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dehqon\resources\views\admin\irrigation\irrigationType\edit.blade.php ENDPATH**/ ?>