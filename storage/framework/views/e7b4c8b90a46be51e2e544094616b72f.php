<?php
    $module = 'workStages';
    $title = 'Редактирование этапа работ';
?>
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header"><?php echo e($title); ?></h5>
            <div class="card-body">
                <form action="<?php echo e(route($module . '.update', $record->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PATCH'); ?>
                    <div class="mt-3">
                        <label class="form-label">Дата*</label>
                        <input value="<?php echo e(\Carbon\Carbon::parse($record->date)->format('Y-m-d')); ?>" name="date" placeholder="Дата" type="date" class="form-control" required>
                    </div>









                    <div class="mt-3">
                        <label class="form-label">Работа*</label>
                        <input value="<?php echo e($record->work); ?>" name="work" placeholder="Работа" type="text" class="form-control" required>
                    </div>
                    <div class="mt-3">
                        <label class="form-label">План*</label>
                        <select id="work_plan_id" class="form-select" name="work_plan_id" required>
                            <option disabled selected>Выбрать план</option>
                            <?php $__currentLoopData = $workPlans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $workPlan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($workPlan->id); ?>" <?php echo e(old('work_plan_id', $record->work_plan_id) == $workPlan->id ? 'selected' : ''); ?>><?php echo e($workPlan->title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Материал*</label>
                        <input value="<?php echo e($record->material); ?>" name="material" placeholder="Материал" type="text" class="form-control" required>
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Количество материала*</label>
                        <input value="<?php echo e($record->material_quantity); ?>" name="material_quantity" placeholder="Количество материала" type="number" class="form-control" required>
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Единица измерения материала*</label>
                        <input value="<?php echo e($record->material_quantity_unit); ?>" name="material_quantity_unit" placeholder="Единица измерения материала" type="text" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dehqon\resources\views/admin/field/work/workStage/edit.blade.php ENDPATH**/ ?>