<?php
    $module = 'protectiveEquipments';
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
                    <?php echo method_field('PATCH'); ?> <?php echo csrf_field(); ?>

                    <div class="mt-3 form-control">
                        <div class="mt-3">
                            <div class="image-container">
                                <img src="<?php echo e(asset($record->image_path)); ?>" alt="Изображение" class="img-fluid">
                            </div>
                        </div>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Название (Русский)</label>
                        <input value="<?php echo e($record->title_ru); ?>" name="title_ru" placeholder="Название на русском" type="text" class="form-control <?php $__errorArgs = ['title_ru'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Название (Узбекский)</label>
                        <input value="<?php echo e($record->title_uz); ?>" name="title_uz" placeholder="Название на узбекском" type="text" class="form-control <?php $__errorArgs = ['title_uz'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Название (Таджикский)</label>
                        <input value="<?php echo e($record->title_tj); ?>" name="title_tj" placeholder="Название на таджикском" type="text" class="form-control <?php $__errorArgs = ['title_tj'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Изображение</label>
                        <input type="file" name="image" class="form-control <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    </div>

                    <button type="submit" class="btn btn-primary mt-3 mr-1">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/dehqon/resources/views/admin/protectiveEquipment/edit.blade.php ENDPATH**/ ?>