@extends('admin.layouts.index')

@php
    $module = 'fertilizers';
    $title = 'Просмотр';
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

                <a href="{{ route($module . '.edit', $record->id) }}" class="btn btn-primary mt-3">Редактировать</a>
            </div>
        </div>
    </div>
@endsection
