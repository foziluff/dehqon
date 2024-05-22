@extends('admin.layouts.index')
@php
    $modul = 'notes';
    $title = 'Просмотр заметки';
@endphp
@section('title', $title)
@section('content')
    @include('admin.layouts.components.messages')
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header">{{ $title }}</h5>
            <div class="card-body">
                <div class="mt-3">
                    <label class="form-label">Поля*</label>
                    <input type="text" class="form-control" value="{{ $record->field->title }}" readonly>
                </div>

                <div class="mt-3">
                    <label class="form-label">Дата*</label>
                    <input type="text" class="form-control" value="{{ $record->date }}" readonly>
                </div>

                <div class="mt-3">
                    <label class="form-label">Проблема*</label>
                    <input type="text" class="form-control" value="{{ $record->problem->title }}" readonly>
                </div>

                <div class="mt-3">
                    <label class="form-label">Описание*</label>
                    <textarea class="form-control" rows="3" readonly>{{ $record->description }}</textarea>
                </div>

                <div class="mt-3">
                    <label class="form-label">Площадь поражения*</label>
                    <input type="number" class="form-control" value="{{ $record->defeated_area }}" readonly>
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

                <a href="{{ route($modul . '.edit', $record->id) }}" class="btn btn-primary mt-3">Редактировать</a>
            </div>
        </div>
    </div>
@endsection
