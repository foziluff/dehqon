<?php
    $module = 'users';
    $title = 'Редактирование пользователя';
?>
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header"><?php echo e($title); ?></h5>
            <div class="card-body">
                <form action="<?php echo e(route($module . '.update', $record->id)); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo method_field('PATCH'); ?>
                    <?php echo csrf_field(); ?>
                    <div class="mt-3 form-control">
                        <div class="mt-3">
                            <div class="image-container">
                                <img src="<?php echo e($record->image_path ? $record->image_path : asset('assets/img/no-image.png')); ?>"
                                     alt="<?php echo e($record->image_path ? '' : 'Default Image'); ?>" class="img-fluid"
                                     style="min-width: 50px; height: 50px;object-fit: cover">
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <label for="name" class="form-label">Имя*</label>
                        <input value="<?php echo e($record->name); ?>" name="name" placeholder="Имя" type="text" class="form-control" required>
                    </div>
                    <div class="mt-3">
                        <label for="surname" class="form-label">Фамилия*</label>
                        <input value="<?php echo e($record->surname); ?>" name="surname" placeholder="Фамилия" type="text" class="form-control" required>
                    </div>
                    <div class="mt-3">
                        <label for="phone" class="form-label">Телефон*</label>
                        <input value="<?php echo e($record->phone); ?>" name="phone" placeholder="Телефон" type="text" class="form-control" required>
                    </div>
                    <div class="mt-3">
                        <label for="born_in" class="form-label">Дата рождения*</label>
                        <input value="<?php echo e(\Carbon\Carbon::parse($record->born_in)->format('Y-m-d')); ?>" name="born_in" placeholder="Дата рождения" type="date" class="form-control" required>
                    </div>
                    <div class="mt-3">
                        <label for="password" class="form-label">Пароль</label>
                        <input name="password" placeholder="Пароль" type="password" class="form-control">
                    </div>
                    <div class="mt-3">
                        <label for="gender" class="form-label">Пол*</label>
                        <select name="gender" class="form-control" required>
                            <option value="1" <?php echo e($record->gender == 1 ? 'selected' : ''); ?>>Мужской</option>
                            <option value="0" <?php echo e($record->gender == 0 ? 'selected' : ''); ?>>Женский</option>
                        </select>
                    </div>
                    <div class="mt-3">
                        <label for="role" class="form-label">Роль*</label>
                        <select name="role" class="form-control" required>
                            <option value="1" <?php echo e($record->role == 1 ? 'selected' : ''); ?>>Администратор</option>
                            <option value="0" <?php echo e($record->role != 1 ? 'selected' : ''); ?>>Пользователь</option>
                        </select>
                    </div>
                    <div class="mt-3">
                        <label for="currency" class="form-label">Валюта*</label>
                        <input value="<?php echo e($record->currency); ?>" name="currency" placeholder="Валюта" type="text" class="form-control" required>
                    </div>
                    <div class="mt-3">
                        <label for="organization_id" class="form-label">Организация*</label>
                        <select id="organization_id" class="form-select" name="organization_id" required>
                            <option value="0" <?php echo e(old('organization_id', $record->organization_id) == 0 ? 'selected' : ''); ?>>Без организации</option>
                            <?php $__currentLoopData = $organizations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $organization): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($organization->id); ?>" <?php echo e(old('organization_id', $record->organization_id) == $organization->id ? 'selected' : ''); ?>><?php echo e($organization->title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="mt-3">
                        <label for="image" class="form-label">Фото профиля*</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dehqon\resources\views\admin\users\edit.blade.php ENDPATH**/ ?>