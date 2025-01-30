<?php
    $module = 'protectiveEquipmentItems';
    $title = 'Редактирование';
?>
<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header"><?php echo e($title); ?></h5>
            <div class="card-body">
                <form action="<?php echo e(route($module . '.update', $record->id)); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo method_field('PATCH'); ?>
                    <?php echo csrf_field(); ?>
                    <div class="image-container">
                        <img src="<?php echo e(asset($record->image_path)); ?>" alt="Изображение" class="img-fluid">
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Название (RU)</label>
                        <input value="<?php echo e(old('title_ru', $record->title_ru)); ?>" name="title_ru" placeholder="Название (RU)" type="text" class="form-control">
                        <?php $__errorArgs = ['title_ru'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="text-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Название (UZ)</label>
                        <input value="<?php echo e(old('title_uz', $record->title_uz)); ?>" name="title_uz" placeholder="Название (UZ)" type="text" class="form-control">
                        <?php $__errorArgs = ['title_uz'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="text-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Название (TJ)</label>
                        <input value="<?php echo e(old('title_tj', $record->title_tj)); ?>" name="title_tj" placeholder="Название (TJ)" type="text" class="form-control">
                        <?php $__errorArgs = ['title_tj'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="text-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Описание (Русский)*</label>
                        <textarea name="description_ru" class="form-control" rows="3" required><?php echo e(old('description_ru', $record->description_ru)); ?></textarea>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Описание (Узбекский)*</label>
                        <textarea name="description_uz" class="form-control" rows="3" required><?php echo e(old('description_uz', $record->description_uz)); ?></textarea>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Описание (Таджикский)*</label>
                        <textarea name="description_tj" class="form-control" rows="3" required><?php echo e(old('description_tj', $record->description_tj)); ?></textarea>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Изображение</label>
                        <input type="file" name="image" class="form-control" >
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/dehqon/resources/views/admin/protectiveEquipment/protectiveEquipmentItem/edit.blade.php ENDPATH**/ ?>