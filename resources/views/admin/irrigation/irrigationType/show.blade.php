@extends('admin.layouts.index')
@php
    $module = 'irrigationTypes';
    $title = 'Просмотр типа орощения';
@endphp
@section('title', $title)

@section('content')
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header">{{ $title }}</h5>
            <div class="card-body">
                <div class="mt-3">
                    <label class="form-label">Название</label>
                    <div class="form-control">{{ $record->title }}</div>
                </div>
                <div class="mt-3">
                    <label class="form-label">Описание*</label>
                    <div class="form-control">{{ $record->description }}</div>
                </div>
                <div class="mt-3">
                    <label class="form-label">Орощение*</label>
                    <div class="form-control">{{ $record->irrigation->title }}</div>
                </div>

                <div class="mt-3">
                    <label class="form-label">Изображения</label>
                    <div class="form-control">
                        <div class="mt-3">
                            @foreach($record->images as $image)
                                <div class="image-container">
                                    <img src="{{ $image->image_path }}" alt="Изображение" class="img-fluid">
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
