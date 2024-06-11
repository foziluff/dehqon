<?php
    $module = 'notes';
    $title = 'Просмотр заметки';
?>
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header"><?php echo e($title); ?></h5>
            <div class="card-body">
                <div class="mt-3">
                    <label class="form-label">Поля*</label>
                    <input type="text" class="form-control" value="<?php echo e($record->field->title); ?>" readonly>
                </div>

                <div class="mt-3">
                    <label class="form-label">Дата*</label>
                    <input type="text" class="form-control" value="<?php echo e($record->date); ?>" readonly>
                </div>

                <div class="mt-3">
                    <label class="form-label">Проблема*</label>
                    <input type="text" class="form-control" value="<?php echo e($record->problem->title); ?>" readonly>
                </div>

                <div class="mt-3">
                    <label class="form-label">Описание*</label>
                    <textarea class="form-control" rows="3" readonly><?php echo e($record->description); ?></textarea>
                </div>

                <div class="mt-3">
                    <label class="form-label">Площадь поражения*</label>
                    <input type="number" class="form-control" value="<?php echo e($record->defeated_area); ?>" readonly>
                </div>

                <div class="mt-3">
                    <label class="form-label">Изображения</label>
                    <div class="form-control">
                        <div class="mt-3">
                            <?php $__currentLoopData = $record->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="image-container">
                                    <img src="<?php echo e($image->image_path); ?>" alt="Изображение" class="img-fluid">
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>

                <a href="<?php echo e(route($module . '.edit', $record->id)); ?>" class="btn btn-primary mt-3">Редактировать</a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dehqon\resources\views\admin\field\note\show.blade.php ENDPATH**/ ?>