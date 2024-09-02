@extends('admin.layouts.index')

@php
    $module = 'news';
    $title = 'Просмотр новости';
@endphp

@section('title', $title)

@section('content')
    @include('admin.layouts.components.messages')
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header">{{ $title }}</h5>
            <div class="card-body">
                <div class="mt-3">
                    <label class="form-label">Заголовок (Русский)</label>
                    <input type="text" class="form-control" value="{{ $record->title_ru }}" readonly>
                </div>

                <div class="mt-3">
                    <label class="form-label">Заголовок (Узбекский)</label>
                    <input type="text" class="form-control" value="{{ $record->title_uz }}" readonly>
                </div>

                <div class="mt-3">
                    <label class="form-label">Заголовок (Таджикский)</label>
                    <input type="text" class="form-control" value="{{ $record->title_tj }}" readonly>
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

                <div class="mt-3">
                    <label class="form-label">Дата</label>
                    <input type="date" class="form-control" value="{{ \Carbon\Carbon::parse($record->date)->format('Y-m-d') }}" readonly>
                </div>

                <div class="mt-3">
                    <label class="form-label">URL</label>
                    <input type="text" class="form-control" value="{{ $record->url }}" readonly>
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
