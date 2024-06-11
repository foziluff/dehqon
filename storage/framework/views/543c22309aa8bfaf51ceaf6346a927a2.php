<?php
    $module = 'chats';
    $title = 'Чаты';
?>
<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="card">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="card-header"><?php echo e($title); ?></h5>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover mb-2">
                <thead>
                <tr>
                    <th style="width:6%">№</th>
                    <th style="width: 0%">Фото</th>
                    <th>Название</th>
                </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($records->firstItem() + $key); ?></td>
                        <td>
                            <div>
                                <img src="<?php echo e($record->image_path ? $record->image_path : asset('assets/img/no-image.png')); ?>"
                                     alt="<?php echo e($record->image_path ? '' : 'Default Image'); ?>" class="img-fluid rounded-circle"
                                     style="min-width: 50px; height: 50px;object-fit: cover">
                            </div>
                        </td>
                        <td>
                            <a class="td-title" href="<?php echo e(route($module . '.show', $record->id)); ?>">
                                <span class="fw-medium"><?php echo e($record->user->name); ?> - <?php echo e($record->field->title); ?></span>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <?php echo $__env->make('admin.layouts.components.pagination', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dehqon\resources\views\admin\chat\index.blade.php ENDPATH**/ ?>