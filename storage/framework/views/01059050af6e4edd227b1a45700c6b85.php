<?php
    $module = 'cultureSeasonWorks';
    $title = 'Добавления работы сезона';
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
                        <label class="form-label">Время*</label>
                        <input value="<?php echo e(old('time')); ?>" name="time" placeholder="Дата" type="text" class="form-control" required>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Работа (RU)*</label>
                        <textarea name="work_ru" placeholder="Работа (RU)" class="form-control" required><?php echo e(old('work_ru')); ?></textarea>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Работа (UZ)*</label>
                        <textarea name="work_uz" placeholder="Работа (UZ)" class="form-control" required><?php echo e(old('work_uz')); ?></textarea>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Работа (TJ)*</label>
                        <textarea name="work_tj" placeholder="Работа (TJ)" class="form-control" required><?php echo e(old('work_tj')); ?></textarea>
                    </div>

                    <?php if(request()->has('culture_season_id')): ?>
                        <input type="hidden" name="culture_season_id" value="<?php echo e(request('culture_season_id')); ?>">
                    <?php endif; ?>

                    <button type="submit" class="btn btn-primary mt-3">Добавить</button>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/dehqon/resources/views/admin/culture/cultureSeasonWork/create.blade.php ENDPATH**/ ?>