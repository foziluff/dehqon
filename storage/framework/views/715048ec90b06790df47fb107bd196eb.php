<?php
    $module = 'news';
    $title = 'Просмотр новости';
?>

<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header"><?php echo e($title); ?></h5>
            <div class="card-body">
                <div class="mt-3">
                    <label class="form-label">Заголовок (Русский)</label>
                    <input type="text" class="form-control" value="<?php echo e($record->title_ru); ?>" readonly>
                </div>

                <div class="mt-3">
                    <label class="form-label">Заголовок (Узбекский)</label>
                    <input type="text" class="form-control" value="<?php echo e($record->title_uz); ?>" readonly>
                </div>

                <div class="mt-3">
                    <label class="form-label">Заголовок (Таджикский)</label>
                    <input type="text" class="form-control" value="<?php echo e($record->title_tj); ?>" readonly>
                </div>

                <div class="mt-3">
                    <label class="form-label">Описание (Русский)</label>
                    <textarea class="form-control" rows="3" readonly><?php echo e($record->description_ru); ?></textarea>
                </div>

                <div class="mt-3">
                    <label class="form-label">Описание (Узбекский)</label>
                    <textarea class="form-control" rows="3" readonly><?php echo e($record->description_uz); ?></textarea>
                </div>

                <div class="mt-3">
                    <label class="form-label">Описание (Таджикский)</label>
                    <textarea class="form-control" rows="3" readonly><?php echo e($record->description_tj); ?></textarea>
                </div>

                <div class="mt-3">
                    <label class="form-label">Дата</label>
                    <input type="date" class="form-control" value="<?php echo e(\Carbon\Carbon::parse($record->date)->format('Y-m-d')); ?>" readonly>
                </div>

                <div class="mt-3">
                    <label class="form-label">URL</label>
                    <input type="text" class="form-control" value="<?php echo e($record->url); ?>" readonly>
                </div>

                <div class="mt-3">
                    <label class="form-label">Изображения</label>
                    <div class="form-control">
                        <div class="mt-3">
                            <?php $__currentLoopData = $record->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="image-container">
                                    <img src="<?php echo e(asset($image->image_path)); ?>" alt="Изображение" class="img-fluid">
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

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dehqon\resources\views\admin\news\show.blade.php ENDPATH**/ ?>