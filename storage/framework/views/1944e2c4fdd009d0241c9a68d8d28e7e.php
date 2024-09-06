<?php
    $module = 'agroMarkets';
    $title = 'Добавления агромаркета';
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
                    <div class="mb-3">
                        <label class="form-label">Название (RU)</label>
                        <input value="<?php echo e(old('title_ru')); ?>" name="title_ru" placeholder="Название (RU)" type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Название (UZ)</label>
                        <input value="<?php echo e(old('title_uz')); ?>" name="title_uz" placeholder="Название (UZ)" type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Название (TJ)</label>
                        <input value="<?php echo e(old('title_tj')); ?>" name="title_tj" placeholder="Название (TJ)" type="text" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Адрес (RU)</label>
                        <input value="<?php echo e(old('address_ru')); ?>" name="address_ru" placeholder="Адрес (RU)" type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Адрес (UZ)</label>
                        <input value="<?php echo e(old('address_uz')); ?>" name="address_uz" placeholder="Адрес (UZ)" type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Адрес (TJ)</label>
                        <input value="<?php echo e(old('address_tj')); ?>" name="address_tj" placeholder="Адрес (TJ)" type="text" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Телефон</label>
                        <input value="<?php echo e(old('phone')); ?>" name="phone" placeholder="Телефон" type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input value="<?php echo e(old('email')); ?>" name="email" placeholder="Email" type="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Сайт</label>
                        <input value="<?php echo e(old('site')); ?>" name="site" placeholder="Сайт" type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Изображение</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Добавить</button>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dehqon\resources\views\admin\agroMarket\create.blade.php ENDPATH**/ ?>