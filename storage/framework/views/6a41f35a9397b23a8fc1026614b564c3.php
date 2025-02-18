<?php
    $module = 'cultureSeasonWorks';
    $title = 'Просмотр работы сезона';
?>
<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header"><?php echo e($title); ?></h5>
            <div class="card-body">

                <div class="mt-3">
                    <label class="form-label">Время</label>
                    <div class="form-control"><?php echo e($record->time); ?></div>
                </div>

                <div class="mt-3">
                    <label class="form-label">Работа (RU)</label>
                    <div class="form-control"><?php echo e($record->work_ru); ?></div>
                </div>

                <div class="mt-3">
                    <label class="form-label">Работа (UZ)</label>
                    <div class="form-control"><?php echo e($record->work_uz); ?></div>
                </div>

                <div class="mt-3">
                    <label class="form-label">Работа (TJ)</label>
                    <div class="form-control"><?php echo e($record->work_tj); ?></div>
                </div>

                <a href="<?php echo e(route($module . '.edit', $record->id)); ?>" class="btn btn-primary mt-3">Редактировать</a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/dehqon/resources/views/admin/culture/cultureSeasonWork/show.blade.php ENDPATH**/ ?>