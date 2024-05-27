@extends('admin.layouts.index')

@php
    $modul = 'news';
    $title = 'Добавление новости';
@endphp

@section('title', $title)

@section('content')
    @include('admin.layouts.components.messages')
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header">{{ $title }}</h5>
            <div class="card-body">
                <form action="{{ route($modul . '.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mt-3">
                        <label class="form-label">Заголовок*</label>
                        <input value="{{ old('title') }}" name="title" type="text" class="form-control" required>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Описание*</label>
                        <textarea name="description" class="form-control" rows="3" required>{{ old('description') }}</textarea>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">URL*</label>
                        <input value="{{ old('url') }}" name="url" type="text" class="form-control" required>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Дата*</label>
                        <input value="{{ \Carbon\Carbon::parse(old('date'))->format('Y-m-d') }}" name="date" type="date" class="form-control" required>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Изображения (максимальный размер: 2MB каждое)</label>
                        <input type="file" name="images[]" class="form-control" multiple>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Добавить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
