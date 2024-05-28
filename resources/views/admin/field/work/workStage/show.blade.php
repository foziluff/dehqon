@extends('admin.layouts.index')
@php
    $module = 'workStages';
    $title = 'Просмотр этапа работ';
@endphp
@section('title', $title)
@section('content')
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header">{{ $title }}</h5>
            <div class="card-body">
                <div class="mt-3">
                    <label class="form-label">Дата</label>
                    <div class="form-control">{{ $record->date }}</div>
                </div>
                <div class="mt-3">
                    <label class="form-label">Работа</label>
                    <div class="form-control">{{ $record->work->title }}</div>
                </div>
                <div class="mt-3">
                    <label class="form-label">Материал</label>
                    <div class="form-control">{{ $record->material }}</div>
                </div>
                <div class="mt-3">
                    <label class="form-label">Количество материала</label>
                    <div class="form-control">{{ $record->material_quantity }}</div>
                </div>
                <div class="mt-3">
                    <label class="form-label">Единица измерения материала</label>
                    <div class="form-control">{{ $record->material_quantity_unit }}</div>
                </div>
                <a href="{{ route($module . '.edit', $record->id) }}" class="btn btn-primary mt-3">Редактировать</a>

            </div>
        </div>
    </div>
@endsection
