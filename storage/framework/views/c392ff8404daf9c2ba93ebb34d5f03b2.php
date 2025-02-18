<?php
    $module = 'cultureSeasonWorks';
    $title = 'Работы сезона';
?>
<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="card">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="card-header"><?php echo e($title); ?></h5>
            <div style="padding-right: 1.25rem;">
                <a class="btn btn-primary" href="<?php echo e(route($module . '.create')); ?>?culture_season_id=<?php echo e(Request::segment(3)); ?>">Добавить</a>
            </div>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover mb-2">
                <thead>
                <tr>
                    <th style="width:6%">№</th>
                    <th>Название</th>
                    <th class="text-right">Действия</th>
                </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($records->firstItem() + $key); ?></td>
                        <td>
                            <a class="td-title" href="<?php echo e(route($module . '.show', $record->id)); ?>">
                                <span class="fw-medium"><?php echo e($record->time); ?> - <?php echo e($record->work_ru); ?></span>
                            </a>
                        </td>
                        <td class="text-right">
                            <?php echo $__env->make('admin.layouts.components.actions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/dehqon/resources/views/admin/culture/cultureSeasonWork/index.blade.php ENDPATH**/ ?>