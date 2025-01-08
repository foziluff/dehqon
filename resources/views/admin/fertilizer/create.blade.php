@extends('admin.layouts.index')

@php
    $module = 'fertilizers';
    $title = 'Добавление';
@endphp

@section('title', $title)

@section('content')
    @include('admin.layouts.components.messages')
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header">{{ $title }}</h5>
            <div class="card-body">
                <form id="newsForm" action="{{ route($module . '.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mt-3">
                        <label class="form-label">Заголовок (Русский)*</label>
                        <input value="{{ old('title_ru') }}" name="title_ru" placeholder="Заголовок на русском" type="text" class="form-control" required>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Заголовок (Узбекский)*</label>
                        <input value="{{ old('title_uz') }}" name="title_uz" placeholder="Заголовок на узбекском" type="text" class="form-control" required>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Заголовок (Таджикский)*</label>
                        <input value="{{ old('title_tj') }}" name="title_tj" placeholder="Заголовок на таджикском" type="text" class="form-control" required>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Описание (Русский)*</label>
                        <textarea name="description_ru" class="form-control" rows="3" required>{{ old('description_ru') }}</textarea>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Описание (Узбекский)*</label>
                        <textarea name="description_uz" class="form-control" rows="3" required>{{ old('description_uz') }}</textarea>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Описание (Таджикский)*</label>
                        <textarea name="description_tj" class="form-control" rows="3" required>{{ old('description_tj') }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Добавить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
