<?php
    $module = 'workStages';
    $title = 'Добавление этапа работ';
?>
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header"><?php echo e($title); ?></h5>
            <div class="card-body">
                <form action="<?php echo e(route($module . '.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="mt-3">
                        <label class="form-label">Дата*</label>
                        <input value="<?php echo e(\Carbon\Carbon::parse(old('date'))->format('Y-m-d')); ?>" name="date" placeholder="Дата" type="date" class="form-control" required>
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Работа*</label>
                        <select id="work_id" class="form-select" name="work_id" required>
                            <option disabled selected>Выбрать работу</option>
                            <?php $__currentLoopData = $works; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $work): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($work->id); ?>" <?php echo e(old('work_id') == $work->id ? 'selected' : ''); ?>><?php echo e($work->title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Планы работ*</label>
                        <select id="work_plan_id" class="form-select" name="work_plan_id" required>
                            <option disabled selected>Выбрать план</option>
                            <?php $__currentLoopData = $workPlans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $workPlan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($workPlan->id); ?>" <?php echo e(old('work_plan_id') == $workPlan->id ? 'selected' : ''); ?>><?php echo e($workPlan->title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Материал*</label>
                        <input value="<?php echo e(old('material')); ?>" name="material" placeholder="Материал" type="text" class="form-control" required>
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Количество материала*</label>
                        <input value="<?php echo e(old('material_quantity')); ?>" name="material_quantity" placeholder="Количество материала" type="number" class="form-control" required>
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Единица измерения материала*</label>
                        <input value="<?php echo e(old('material_quantity_unit')); ?>" name="material_quantity_unit" placeholder="Единица измерения материала" type="text" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Добавить</button>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dehqon\resources\views\admin\field\work\workStage\create.blade.php ENDPATH**/ ?>