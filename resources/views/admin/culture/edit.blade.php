@extends('admin.layouts.index')

@php
    $module = 'cultures';
    $title = 'Редактирование культуры';
@endphp

@section('title', $title)

@section('content')
    @include('admin.layouts.components.messages')
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header">{{ $title }}</h5>
            <div class="card-body">
                <form action="{{ route($module . '.update', $record->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PATCH') @csrf

                    <div class="mt-3 form-control">
                        <div class="mt-3">
                            <div class="image-container">
                                <img src="{{ asset($record->image_path) }}" alt="Изображение" class="img-fluid">
                            </div>
                        </div>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Название (Русский)</label>
                        <input value="{{ $record->title_ru }}" name="title_ru" placeholder="Название на русском" type="text" class="form-control @error('title_ru') is-invalid @enderror">
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Название (Узбекский)</label>
                        <input value="{{ $record->title_uz }}" name="title_uz" placeholder="Название на узбекском" type="text" class="form-control @error('title_uz') is-invalid @enderror">
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Название (Таджикский)</label>
                        <input value="{{ $record->title_tj }}" name="title_tj" placeholder="Название на таджикском" type="text" class="form-control @error('title_tj') is-invalid @enderror">
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Изображение</label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                    </div>

                    <button type="submit" class="btn btn-primary mt-3 mr-1">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
