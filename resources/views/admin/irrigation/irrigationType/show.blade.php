@extends('admin.layouts.index')
@php
    $module = 'irrigationTypes';
    $title = 'Просмотр типа орошения';
@endphp
@section('title', $title)

@section('content')
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header">{{ $title }}</h5>
            <div class="card-body">
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
                    <label class="form-label">Описание (RU)</label>
                    <div class="form-control">{{ $record->description_ru }}</div>
                </div>
                <div class="mt-3">
                    <label class="form-label">Описание (UZ)</label>
                    <div class="form-control">{{ $record->description_uz }}</div>
                </div>
                <div class="mt-3">
                    <label class="form-label">Описание (TJ)</label>
                    <div class="form-control">{{ $record->description_tj }}</div>
                </div>

                <div class="mt-3">
                    <label class="form-label">Орошение</label>
                    <div class="form-control">{{ $record->irrigation->title_ru }}</div>
                </div>

                <div class="mt-3">
                    <label class="form-label">Изображения</label>
                    <div class="form-control">
                        <div class="mt-3">
                            @foreach($record->images as $image)
                                <div class="image-container">
                                    <img src="{{ asset($image->image_path) }}" alt="Изображение" class="img-fluid">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <a href="{{ route($module . '.edit', $record->id) }}" class="btn btn-primary mt-3">Редактировать</a>
            </div>
        </div>
    </div>
@endsection
