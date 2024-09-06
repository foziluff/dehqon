<?php
    $module = 'cultureSeasonWorks';
    $title = 'Редактирование работы сезона';
?>
<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header"><?php echo e($title); ?></h5>
            <div class="card-body">
                <form action="<?php echo e(route($module . '.update', $record->id)); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo method_field('PATCH'); ?><?php echo csrf_field(); ?>

                    <div class="mt-3">
                        <label class="form-label">Время</label>
                        <input value="<?php echo e(old('time', $record->time)); ?>" name="time" placeholder="Время" type="text" class="form-control">
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Работа (RU)</label>
                        <textarea name="work_ru" placeholder="Работа (RU)" class="form-control"><?php echo e(old('work_ru', $record->work_ru)); ?></textarea>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Работа (UZ)</label>
                        <textarea name="work_uz" placeholder="Работа (UZ)" class="form-control"><?php echo e(old('work_uz', $record->work_uz)); ?></textarea>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Работа (TJ)</label>
                        <textarea name="work_tj" placeholder="Работа (TJ)" class="form-control"><?php echo e(old('work_tj', $record->work_tj)); ?></textarea>
                    </div>

                    <input type="hidden" value="<?php echo e($record->cultureSeason->id); ?>" name="culture_season_id">

                    <button type="submit" class="btn btn-primary mt-3 mr-1">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dehqon\resources\views\admin\culture\cultureSeasonWork\edit.blade.php ENDPATH**/ ?>