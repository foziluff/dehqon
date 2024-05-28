@extends('admin.layouts.index')
@php
    $module = 'fields';
    $title = 'Редактирование поля';
@endphp
@section('title', $title)
@section('content')
    @include('admin.layouts.components.messages')
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header">{{ $title }}</h5>
            <div class="card-body">
                <form action="{{ route($module . '.update', $record->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="mt-3">
                        <label class="form-label">Название*</label>
                        <input value="{{ $record->title }}" name="title" placeholder="Название" type="text" class="form-control" required>
                    </div>

                    <div class="mt-3">
                        <label for="culture_id" class="form-label">Культура*</label>
                        <select id="culture_id" class="form-select" name="culture_id" required>
                            <option disabled selected>Выбрать культуру</option>
                            @foreach($cultures as $culture)
                                <option value="{{ $culture->id }}" {{ $record->culture_id == $culture->id ? 'selected' : '' }}>{{ $culture->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Сорт*</label>
                        <input value="{{ $record->sort }}" name="sort" placeholder="Сорт" type="text" class="form-control" required>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Площадь*</label>
                        <input value="{{ $record->area }}" name="area" placeholder="Площадь" type="number" class="form-control" required>
                    </div>

                    <div class="mt-3">
                        <label for="fuel_type_id" class="form-label">Тип топлива*</label>
                        <select id="fuel_type_id" class="form-select" name="fuel_type_id" required>
                            <option disabled selected>Выбрать тип топлива</option>
                            @foreach($fuelTypes as $fuelType)
                                <option value="{{ $fuelType->id }}" {{ $record->fuel_type_id == $fuelType->id ? 'selected' : '' }}>{{ $fuelType->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Год Посева*</label>
                        <input value="{{ $record->sowing_year }}" name="sowing_year" placeholder="Год Посева" type="number" class="form-control" required>
                    </div>

                    <div class="mt-3">
                        <label for="prev_culture_id" class="form-label">Предыдущая культура*</label>
                        <select id="prev_culture_id" class="form-select" name="prev_culture_id">
                            <option disabled selected>Выбрать предыдущую культуру</option>
                            @foreach($cultures as $culture)
                                <option value="{{ $culture->id }}" {{ $record->prev_culture_id == $culture->id ? 'selected' : '' }}>{{ $culture->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Предыдущий Сорт*</label>
                        <input value="{{ $record->prev_sort }}" name="prev_sort" placeholder="Предыдущий Сорт" type="text" class="form-control">
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Год Посева Предыдущей Культуры*</label>
                        <input value="{{ $record->prev_sowing_year }}" name="prev_sowing_year" placeholder="Год Посева Предыдущей Культуры" type="number" class="form-control">
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Координаты*</label>
                        <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css">

                        <div class="form-control leaflet-container leaflet-touch leaflet-retina leaflet-fade-anim leaflet-grab leaflet-touch-drag leaflet-touch-zoom" id="map" style="height: 400px; position: relative;" tabindex="0">
                            <div class="leaflet-pane leaflet-map-pane" style="transform: translate3d(0px, 0px, 0px);">
                                <div class="leaflet-pane leaflet-tile-pane">
                                    <div class="leaflet-layer " style="z-index: 1; opacity: 1;">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" id="coordinates" name="coordinates[]" value='{{ json_encode($record->coordinates) }}'>

                        <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
                        <script>
                            var coordinatesString = document.getElementById('coordinates').value;
                            var coordinates = JSON.parse(coordinatesString);
                            var points = JSON.parse(coordinates[0]);

                            var centerLatitude = (points[0].latitude + points[1].latitude) / 2;
                            var centerLongitude = (points[0].longitude + points[1].longitude) / 2;

                            var map = L.map('map').setView([centerLatitude, centerLongitude], 13);
                            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                maxZoom: 19
                            }).addTo(map);

                            points.forEach(function(point) {
                                L.marker([point.latitude, point.longitude], { draggable: true }).addTo(map);
                            });
                        </script>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
