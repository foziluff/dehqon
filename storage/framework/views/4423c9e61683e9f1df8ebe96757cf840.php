<?php
    $module = 'users';
    $title = 'Пользователи';
?>
<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="card">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="card-header"><?php echo e($title); ?></h5>
            <?php if(Auth::user()->role == 1): ?>
                <div style="padding-right: 1.25rem;">
                    <a class="btn btn-primary" href="<?php echo e(route($module . '.create')); ?>">Добавить</a>
                </div>
            <?php endif; ?>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover mb-2">
                <thead>
                <tr>
                    <th style="width:6%">№</th>
                    <th style="width: 0%">Фото</th>
                    <th>Название</th>
                    <?php if(Auth::user()->role == 1): ?>
                        <th class="text-right">Действия</th>
                    <?php endif; ?>
                </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($records->firstItem() + $key); ?></td>
                        <td>
                            <div>
                                <img src="<?php echo e($record->image_path ? asset($record->image_path) : asset('assets/img/no-image.png')); ?>"
                                     alt="<?php echo e($record->image_path ? '' : 'Default Image'); ?>" class="img-fluid rounded-circle"
                                     style="min-width: 50px; height: 50px;object-fit: cover">
                            </div>
                        </td>
                        <td>
                            <a class="td-title" href="<?php echo e(route($module . '.show', $record->id)); ?>">
                                <span class="fw-medium"><?php echo e($record->name); ?> <?php echo e($record->surname); ?></span>
                            </a>
                        </td>
                            <?php if(Auth::user()->role == 1): ?>
                                <td class="text-right">
                                    <?php echo $__env->make('admin.layouts.components.actions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </td>
                            <?php endif; ?>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <?php echo $__env->make('admin.layouts.components.pagination', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/dehqon/resources/views/admin/users/index.blade.php ENDPATH**/ ?>