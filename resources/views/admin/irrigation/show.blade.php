@extends('admin.layouts.index')
@php
    $module = 'irrigations';
    $title = 'Просмотр ирригации';
@endphp
@section('title', $title)

@section('content')
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header">{{ $title }}</h5>
            <div class="card-body">
                <a href="{{ route('irrigations.irrigationTypes', $record->id) }}" type="button" class="btn btn-outline-secondary mr-1">Типы</a>
                <div class="mt-3 form-control">
                    <div class="mt-3">
                        <div class="image-container">
                            <img src="{{ $record->image_path }}" alt="Изображение" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <label class="form-label">Название</label>
                    <div class="form-control">{{ $record->title }}</div>
                </div>

                <a href="{{ route($module . '.edit', $record->id) }}" class="btn btn-primary mt-3">Редактировать</a>
            </div>
        </div>
    </div>
@endsection
