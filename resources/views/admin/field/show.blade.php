@extends('admin.layouts.index')
@php
    $module = 'fields';
    $title = 'Просмотр поля';
@endphp
@section('title', $title)
@section('content')
    @include('admin.layouts.components.messages')
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header">{{ $title }}</h5>
            <div class="card-body">
                <a href="{{ route('fields.notes', $record->id) }}" type="button" class="btn btn-outline-secondary mr-1">Заметки</a>
                <a href="{{ route('fields.rotations', $record->id) }}" type="button" class="btn btn-outline-secondary mr-1">Севооборот</a>
                <a href="{{ route('fields.productQuantities', $record->id) }}" type="button" class="btn btn-outline-secondary mr-1">Количество продукции</a>
                @if(Auth::user()->role == 1)
                <a href="{{ route('fields.incomes', $record->id) }}" type="button" class="btn btn-outline-secondary mr-1">Доходы</a>
                <a href="{{ route('fields.consumptions', $record->id) }}" type="button" class="btn btn-outline-secondary mr-1">Расходы</a>
                <a href="{{ route('fields.workPlans', $record->id) }}" type="button" class="btn btn-outline-secondary mr-1">План работ</a>
                @endif
                <div class="mt-3">
                    <label class="form-label">Название</label>
                    <div class="form-control">{{ $record->title }}</div>
                </div>

                <div class="mt-3">
                    <label class="form-label">Культура</label>
                    <div class="form-control">{{ $record->culture->title }}</div>
                </div>

                <div class="mt-3">
                    <label class="form-label">Сорт</label>
                    <div class="form-control">{{ $record->sort }}</div>
                </div>

                <div class="mt-3">
                    <label class="form-label">Площадь</label>
                    <div class="form-control">{{ $record->area }}</div>
                </div>

                <div class="mt-3">
                    <label class="form-label">Тип полива</label>
                    <div class="form-control">{{ $record->irrigation->title }}</div>
                </div>

                <div class="mt-3">
                    <label class="form-label">Год Посева</label>
                    <div class="form-control">{{ $record->sowing_year }}</div>
                </div>

                <div class="mt-3">
                    <label class="form-label">Предыдущая культура</label>
                    <div class="form-control">{{ $record->prevCulture->title }}</div>
                </div>

                <div class="mt-3">
                    <label class="form-label">Предыдущий Сорт</label>
                    <div class="form-control">{{ $record->prev_sort }}</div>
                </div>

                <div class="mt-3">
                    <label class="form-label">Год Посева Предыдущей Культуры</label>
                    <div class="form-control">{{ $record->prev_sowing_year }}</div>
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

                    <input type="hidden" id="coordinates" value='{{ json_encode($record->coordinates) }}'>

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

                @if(Auth::user()->role == 1)
                <a href="{{ route($module . '.edit', $record->id) }}" class="btn btn-primary mt-3">Редактировать</a>
                @endif
            </div>
        </div>
    </div>
@endsection
