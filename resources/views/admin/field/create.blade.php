@extends('admin.layouts.index')
@php
    $module = 'fields';
    $title = 'Добавления поля';
@endphp
@section('title', $title)
@section('content')
    @include('admin.layouts.components.messages')
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header">{{ $title }}</h5>
            <div class="card-body">
                <form action="{{ route($module . '.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mt-3">
                        <label class="form-label">Название*</label>
                        <input value="{{ old('title') }}" name="title" placeholder="Название" type="text" class="form-control" required>
                    </div>

                    <div class="mt-3">
                        <label for="culture_id" class="form-label">Культура*</label>
                        <select id="culture_id" class="form-select" name="culture_id" required>
                            <option disabled selected>Выбрать культуру</option>
                            @foreach($cultures as $culture)
                                <option value="{{ $culture->id }}" {{ old('culture_id') == $culture->id ? 'selected' : '' }}>{{ $culture->title_ru }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Сорт*</label>
                        <input value="{{ old('sort') }}" name="sort" placeholder="Сорт" type="text" class="form-control" required>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Площадь*</label>
                        <input value="{{ old('area') }}" name="area" placeholder="Площадь" type="number" class="form-control" required>
                    </div>

                    <div class="mt-3">
                        <label for="irrigation_id" class="form-label">Тип полива*</label>
                        <select id="irrigation_id" class="form-select" name="irrigation_id" required>
                            <option disabled selected>Выбрать Тип полива</option>
                            @foreach($irrigations as $irrigation)
                                <option value="{{ $irrigation->id }}" {{ old('irrigation_id') == $irrigation->id ? 'selected' : '' }}>{{ $irrigation->title_ru }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Год Посева*</label>
                        <input value="{{ old('sowing_year') }}" name="sowing_year" placeholder="Год Посева" type="number" class="form-control" required>
                    </div>

                    <div class="mt-3">
                        <label for="prev_culture_id" class="form-label">Предыдущая культура*</label>
                        <select id="prev_culture_id" class="form-select" name="prev_culture_id">
                            <option disabled selected>Выбрать предыдущую культуру</option>
                            @foreach($cultures as $culture)
                                <option value="{{ $culture->id }}" {{ old('prev_culture_id') == $culture->id ? 'selected' : '' }}>{{ $culture->title_ru }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Предыдущий Сорт*</label>
                        <input value="{{ old('prev_sort') }}" name="prev_sort" placeholder="Предыдущий Сорт" type="text" class="form-control">
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Год Посева Предыдущей Культуры*</label>
                        <input value="{{ old('prev_sowing_year') }}" name="prev_sowing_year" placeholder="Год Посева Предыдущей Культуры" type="number" class="form-control">
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
@endsection
