<?php
    $module = 'users';
    $title = 'Просмотр пользователя';
?>
<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header"><?php echo e($title); ?></h5>
            <div class="card-body">
                <a href="<?php echo e(route('users.fields', $record->id)); ?>" type="button" class="btn btn-outline-secondary mr-1">Поля</a>
                <a href="<?php echo e(route('users.conversions', $record->id)); ?>" type="button" class="btn btn-outline-secondary mr-1">Переработки</a>
                <a href="<?php echo e(route('users.stocks', $record->id)); ?>" type="button" class="btn btn-outline-secondary mr-1">Склад</a>
                <div class="mt-3 form-control">
                    <div class="mt-3">
                        <div class="image-container">
                            <img src="<?php echo e($record->image_path ? asset($record->image_path) : asset('assets/img/no-image.png')); ?>"
                                 alt="<?php echo e($record->image_path ? '' : 'Default Image'); ?>" class="img-fluid"
                                 style="min-width: 50px; height: 50px;object-fit: cover">
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <label for="name" class="form-label">Имя</label>
                    <div class="form-control"><?php echo e($record->name); ?></div>
                </div>
                <div class="mt-3">
                    <label for="surname" class="form-label">Фамилия</label>
                    <div class="form-control"><?php echo e($record->surname); ?></div>
                </div>
                <div class="mt-3">
                    <label for="phone" class="form-label">Телефон</label>
                    <div class="form-control"><?php echo e($record->phone); ?></div>
                </div>
                <div class="mt-3">
                    <label for="born_in" class="form-label">Дата рождения</label>
                    <div class="form-control"><?php echo e($record->born_in); ?></div>
                </div>
                <div class="mt-3">
                    <label for="gender" class="form-label">Пол</label>
                    <div class="form-control">
                        <?php echo e($record->gender == 1 ? 'Мужчина' : 'Женщина'); ?>

                    </div>
                </div>
                <?php if(Auth::user()->role == 1): ?>
                    <div class="mt-3">
                        <label for="role" class="form-label">Роль</label><div class="form-control">
                            <?php switch($record->role):
                                case (1): ?>
                                    Администратор
                                    <?php break; ?>
                                <?php case (0): ?>
                                    Пользователь
                                    <?php break; ?>
                                <?php case (2): ?>
                                    Агроном
                                    <?php break; ?>
                            <?php endswitch; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="mt-3">
                    <label for="currency" class="form-label">Органиция</label>
                    <div class="form-control"> <?php echo e(optional($record->organization)->title ?? 'Без организации'); ?></div>
                </div>
                <div class="mt-3">
                    <label for="currency" class="form-label">Валюта</label>
                    <div class="form-control"><?php echo e($record->currency); ?></div>
                </div>
                <?php if(Auth::user()->role == 1): ?>
                    <a href="<?php echo e(route($module . '.edit', $record->id)); ?>" class="btn btn-primary mt-3">Редактировать</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dehqon\resources\views\admin\users\show.blade.php ENDPATH**/ ?>