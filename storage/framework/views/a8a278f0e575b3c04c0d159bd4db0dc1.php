<?php
    $module = 'cultureSeasons';
    $title = 'Просмотр сезона';
?>
<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header"><?php echo e($title); ?></h5>
            <div class="card-body">
                <a href="<?php echo e(route('cultureSeasons.works', $record->id)); ?>" type="button" class="btn btn-outline-secondary mr-1">Работы</a>
                <div class="mt-3">
                    <label class="form-label">Название</label>
                    <div class="form-control"><?php echo e($record->title); ?></div>
                </div>
                <div class="mt-3">
                    <label class="form-label">Культура*</label>
                    <div class="form-control"><?php echo e($record->culture->title); ?></div>
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

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dehqon\resources\views/admin/culture/cultureSeason/show.blade.php ENDPATH**/ ?>