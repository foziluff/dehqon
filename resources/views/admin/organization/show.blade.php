@extends('admin.layouts.index')
@php
    $module = 'organizations';
    $title = 'Просмотр организатора';
@endphp
@section('title', $title)

@section('content')
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header">{{ $title }}</h5>
            <div class="card-body">
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
                <div class="mt-3">
                    <label class="form-label">Описание</label>
                    <div class="form-control">{{ $record->description }}</div>
                </div>
                <div class="mt-3">
                    <label class="form-label">Адрес</label>
                    <div class="form-control">{{ $record->address }}</div>
                </div>
                <div class="mt-3">
                    <label class="form-label">Телефон</label>
                    <div class="form-control">{{ $record->phone }}</div>
                </div>
                <div class="mt-3">
                    <label class="form-label">Email</label>
                    <div class="form-control">{{ $record->email }}</div>
                </div>
                <div class="mt-3">
                    <label class="form-label">Сайт</label>
                    <div class="form-control">{{ $record->site }}</div>
                </div>

                <a href="{{ route($module . '.edit', $record->id) }}" class="btn btn-primary mt-3">Редактировать</a>
            </div>
        </div>
    </div>
@endsection
