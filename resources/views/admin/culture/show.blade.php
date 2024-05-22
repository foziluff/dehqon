@extends('layouts.index')
@section('title', 'Страница события')
@section('content')
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header">Страница события</h5>
            <div class="card-body">
                <div>
                    <label for="defaultFormControlInput" class="form-label">Название(Tj)</label>
                    <div class="form-control">{{ $record->titleTj }}</div>
                </div>
                <div class="mt-3">
                    <label for="defaultFormControlInput" class="form-label">Описание(Tj)</label>
                    <div class="form-control">{{ $record->descriptionTj }}</div>
                </div>
                <div class="mt-3">
                    <label for="defaultFormControlInput" class="form-label">Название(Ru)</label>
                    <div class="form-control">{{ $record->titleRu }}</div>
                </div>
                <div class="mt-3">
                    <label for="defaultFormControlInput" class="form-label">Описание(Ru)</label>
                    <div class="form-control">{{ $record->descriptionRu }}</div>
                </div>
                <div class="mt-3">
                    <label for="defaultFormControlInput" class="form-label">Название(En)</label>
                    <div class="form-control">{{ $record->titleEn }}</div>
                </div>
                <div class="mt-3">
                    <label for="defaultFormControlInput" class="form-label">Описание(En)</label>
                    <div class="form-control">{{ $record->descriptionEn }}</div>
                </div>

                <div class="mt-3">
                    <label for="defaultFormControlInput" class="form-label">Время</label>
                    <div class="form-control">{{ \Carbon\Carbon::parse($record->time)->format('Y-m-d') }}</div>
                </div>
                <div class="mt-3">
                    <label for="defaultFormControlInput" class="form-label">Изображение
                        <a href="{{ $record->imagePath }}">{{ $record->imagePath }}</a>
                    </label>
                </div>
                <div class="mt-3">
                    <label for="isPublished" class="form-label">Опубликован?</label>
                    <div class="form-control">
                        @if($record->isPublished == 1) Да @else Нет @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
