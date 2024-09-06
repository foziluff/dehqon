<?php
    $module = 'questions';
    $title = 'Редактирование вопроса';
?>

<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header"><?php echo e($title); ?></h5>
            <div class="card-body">
                <form action="<?php echo e(route($module . '.update', $record->id)); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PATCH'); ?>

                    <div class="mt-3">
                        <label class="form-label">Вопрос (Русский)</label>
                        <input value="<?php echo e($record->question_ru); ?>" name="question_ru" placeholder="Вопрос на русском" type="text" class="form-control">
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Вопрос (Узбекский)</label>
                        <input value="<?php echo e($record->question_uz); ?>" name="question_uz" placeholder="Вопрос на узбекском" type="text" class="form-control">
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Вопрос (Таджикский)</label>
                        <input value="<?php echo e($record->question_tj); ?>" name="question_tj" placeholder="Вопрос на таджикском" type="text" class="form-control">
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Ответ (Русский)</label>
                        <textarea name="answer_ru" placeholder="Ответ на русском" class="form-control"><?php echo e($record->answer_ru); ?></textarea>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Ответ (Узбекский)</label>
                        <textarea name="answer_uz" placeholder="Ответ на узбекском" class="form-control"><?php echo e($record->answer_uz); ?></textarea>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Ответ (Таджикский)</label>
                        <textarea name="answer_tj" placeholder="Ответ на таджикском" class="form-control"><?php echo e($record->answer_tj); ?></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dehqon\resources\views\admin\question\edit.blade.php ENDPATH**/ ?>