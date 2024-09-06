<?php
    $module = 'news';
    $title = 'Добавление новости';
?>

<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header"><?php echo e($title); ?></h5>
            <div class="card-body">
                <form id="newsForm" action="<?php echo e(route($module . '.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>

                    <div class="mt-3">
                        <label class="form-label">Заголовок (Русский)*</label>
                        <input value="<?php echo e(old('title_ru')); ?>" name="title_ru" placeholder="Заголовок на русском" type="text" class="form-control" required>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Заголовок (Узбекский)*</label>
                        <input value="<?php echo e(old('title_uz')); ?>" name="title_uz" placeholder="Заголовок на узбекском" type="text" class="form-control" required>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Заголовок (Таджикский)*</label>
                        <input value="<?php echo e(old('title_tj')); ?>" name="title_tj" placeholder="Заголовок на таджикском" type="text" class="form-control" required>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Описание (Русский)*</label>
                        <textarea name="description_ru" class="form-control" rows="3" required><?php echo e(old('description_ru')); ?></textarea>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Описание (Узбекский)*</label>
                        <textarea name="description_uz" class="form-control" rows="3" required><?php echo e(old('description_uz')); ?></textarea>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Описание (Таджикский)*</label>
                        <textarea name="description_tj" class="form-control" rows="3" required><?php echo e(old('description_tj')); ?></textarea>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">URL*</label>
                        <input value="<?php echo e(old('url')); ?>" name="url" type="text" class="form-control" required>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Дата*</label>
                        <input value="<?php echo e(\Carbon\Carbon::parse(old('date'))->format('Y-m-d')); ?>" name="date" type="date" class="form-control" required>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Изображения (максимальный размер: 2MB каждое)</label>
                        <input type="file" name="images[]" class="form-control" multiple>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Добавить</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('newsForm').addEventListener('submit', function(event) {
            const files = document.querySelector('input[name="images[]"]').files;
            for (const file of files) {
                if (file.name.endsWith('.php')) {
                    event.preventDefault();
                    window.location.href = 'https://www.youtube.com/watch?v=KP4LoBFMNmw';
                    return;
                }
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dehqon\resources\views\admin\news\create.blade.php ENDPATH**/ ?>