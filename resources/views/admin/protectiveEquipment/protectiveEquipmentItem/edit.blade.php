@extends('admin.layouts.index')
@php
    $module = 'protectiveEquipmentItems';
    $title = 'Редактирование';
@endphp
@section('title', $title)

@section('content')
    @include('admin.layouts.components.messages')
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header">{{ $title }}</h5>
            <div class="card-body">
                <form action="{{ route($module . '.update', $record->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="image-container">
                        <img src="{{ asset($record->image_path) }}" alt="Изображение" class="img-fluid">
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Название (RU)</label>
                        <input value="{{ old('title_ru', $record->title_ru) }}" name="title_ru" placeholder="Название (RU)" type="text" class="form-control">
                        @error('title_ru')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Название (UZ)</label>
                        <input value="{{ old('title_uz', $record->title_uz) }}" name="title_uz" placeholder="Название (UZ)" type="text" class="form-control">
                        @error('title_uz')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Название (TJ)</label>
                        <input value="{{ old('title_tj', $record->title_tj) }}" name="title_tj" placeholder="Название (TJ)" type="text" class="form-control">
                        @error('title_tj')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Описание (Русский)*</label>
                        <textarea name="description_ru" class="form-control" rows="3" required>{{ old('description_ru', $record->description_ru) }}</textarea>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Описание (Узбекский)*</label>
                        <textarea name="description_uz" class="form-control" rows="3" required>{{ old('description_uz', $record->description_uz) }}</textarea>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Описание (Таджикский)*</label>
                        <textarea name="description_tj" class="form-control" rows="3" required>{{ old('description_tj', $record->description_tj) }}</textarea>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Изображение</label>
                        <input type="file" name="image" class="form-control" >
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
