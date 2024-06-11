<?php
    $module = 'questions';
    $title = 'Добавления вопроса';
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
                        <label class="form-label">Вопрос*</label>
                        <input value="<?php echo e(old('question')); ?>" name="question" placeholder="Вопрос" type="text" class="form-control">
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Ответ*</label>
                        <textarea name="answer" placeholder="Ответ" class="form-control"><?php echo e(old('answer')); ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Добавить</button>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dehqon\resources\views\admin\question\create.blade.php ENDPATH**/ ?>