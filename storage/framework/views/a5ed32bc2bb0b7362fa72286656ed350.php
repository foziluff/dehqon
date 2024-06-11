<?php
    $module = 'fields';
    $title = 'Добавления поля';
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
                        <label class="form-label">Название*</label>
                        <input value="<?php echo e(old('title')); ?>" name="title" placeholder="Название" type="text" class="form-control" required>
                    </div>

                    <div class="mt-3">
                        <label for="culture_id" class="form-label">Культура*</label>
                        <select id="culture_id" class="form-select" name="culture_id" required>
                            <option disabled selected>Выбрать культуру</option>
                            <?php $__currentLoopData = $cultures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $culture): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($culture->id); ?>" <?php echo e(old('culture_id') == $culture->id ? 'selected' : ''); ?>><?php echo e($culture->title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Сорт*</label>
                        <input value="<?php echo e(old('sort')); ?>" name="sort" placeholder="Сорт" type="text" class="form-control" required>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Площадь*</label>
                        <input value="<?php echo e(old('area')); ?>" name="area" placeholder="Площадь" type="number" class="form-control" required>
                    </div>

                    <div class="mt-3">
                        <label for="fuel_type_id" class="form-label">Тип топлива*</label>
                        <select id="fuel_type_id" class="form-select" name="fuel_type_id" required>
                            <option disabled selected>Выбрать тип топлива</option>
                            <?php $__currentLoopData = $fuelTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fuelType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($fuelType->id); ?>" <?php echo e(old('fuel_type_id') == $fuelType->id ? 'selected' : ''); ?>><?php echo e($fuelType->title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Год Посева*</label>
                        <input value="<?php echo e(old('sowing_year')); ?>" name="sowing_year" placeholder="Год Посева" type="number" class="form-control" required>
                    </div>

                    <div class="mt-3">
                        <label for="prev_culture_id" class="form-label">Предыдущая культура*</label>
                        <select id="prev_culture_id" class="form-select" name="prev_culture_id">
                            <option disabled selected>Выбрать предыдущую культуру</option>
                            <?php $__currentLoopData = $cultures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $culture): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($culture->id); ?>" <?php echo e(old('prev_culture_id') == $culture->id ? 'selected' : ''); ?>><?php echo e($culture->title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Предыдущий Сорт*</label>
                        <input value="<?php echo e(old('prev_sort')); ?>" name="prev_sort" placeholder="Предыдущий Сорт" type="text" class="form-control">
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Год Посева Предыдущей Культуры*</label>
                        <input value="<?php echo e(old('prev_sowing_year')); ?>" name="prev_sowing_year" placeholder="Год Посева Предыдущей Культуры" type="number" class="form-control">
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Координаты*</label>
                        <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css"/>

                        <div class="form-control" id="map" style="height: 400px;"></div>

                        <input type="hidden" id="coordinates" name="coordinates[]" required>

                        <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
                        <script>
                            var map = L.map('map').setView([40.2707, 69.6108], 13);
                            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                maxZoom: 19
                            }).addTo(map);
                            var selectedPoints = [];
                            map.on('click', function (e) {
                                var marker = L.marker(e.latlng, { draggable: true }).addTo(map);
                                selectedPoints.push({ latitude: e.latlng.lat, longitude: e.latlng.lng });
                                document.getElementById('coordinates').value = JSON.stringify(selectedPoints);
                                if (selectedPoints.length >= 10) {
                                    map.off('click');
                                    marker.dragging.disable();
                                }
                            });
                        </script>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Добавить</button>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dehqon\resources\views\admin\field\create.blade.php ENDPATH**/ ?>