@extends('admin.layouts.index')
@php
    $module = 'protectiveEquipmentItems';
    $title = 'Просмотр';
@endphp
@section('title', $title)

@section('content')
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header">{{ $title }}</h5>
            <div class="card-body">

                <div class="image-container">
                    <img src="{{ asset($record->image_path) }}" alt="Изображение" class="img-fluid">
                </div>
                <div class="mt-3">
                    <label class="form-label">Название (RU)</label>
                    <div class="form-control">{{ $record->title_ru }}</div>
                </div>

                <div class="mt-3">
                    <label class="form-label">Название (UZ)</label>
                    <div class="form-control">{{ $record->title_uz }}</div>
                </div>

                <div class="mt-3">
                    <label class="form-label">Название (TJ)</label>
                    <div class="form-control">{{ $record->title_tj }}</div>
                </div>

                <div class="mt-3">
                    <label class="form-label">Средство защиты*</label>
                    <div class="form-control">{{ $record->protectiveEquipment->title_ru }}</div>
                </div>

                <div class="mt-3">
                    <label class="form-label">Описание (Русский)</label>
                    <textarea class="form-control" rows="3" readonly>{{ $record->description_ru }}</textarea>
                </div>

                <div class="mt-3">
                    <label class="form-label">Описание (Узбекский)</label>
                    <textarea class="form-control" rows="3" readonly>{{ $record->description_uz }}</textarea>
                </div>

                <div class="mt-3">
                    <label class="form-label">Описание (Таджикский)</label>
                    <textarea class="form-control" rows="3" readonly>{{ $record->description_tj }}</textarea>
                </div>

                <a href="{{ route($module . '.edit', $record->id) }}" class="btn btn-primary mt-3">Редактировать</a>
            </div>
        </div>
    </div>
@endsection
