@extends('admin.layouts.index')
@php
    $module = 'irrigationTypes';
    $title = 'Добавления типа орошения';
@endphp
@section('title', $title)
@section('content')
    @include('admin.layouts.components.messages')
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header">{{ $title }}</h5>
            <div class="card-body">
                <form action="{{ route($module . '.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mt-3">
                        <label class="form-label">Название (RU)</label>
                        <input value="{{ old('title_ru') }}" name="title_ru" placeholder="Название на русском" type="text" class="form-control">
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Название (UZ)</label>
                        <input value="{{ old('title_uz') }}" name="title_uz" placeholder="Название на узбекском" type="text" class="form-control">
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Название (TJ)</label>
                        <input value="{{ old('title_tj') }}" name="title_tj" placeholder="Название на таджикском" type="text" class="form-control">
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Описание (RU)</label>
                        <textarea name="description_ru" placeholder="Описание на русском" class="form-control">{{ old('description_ru') }}</textarea>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Описание (UZ)</label>
                        <textarea name="description_uz" placeholder="Описание на узбекском" class="form-control">{{ old('description_uz') }}</textarea>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Описание (TJ)</label>
                        <textarea name="description_tj" placeholder="Описание на таджикском" class="form-control">{{ old('description_tj') }}</textarea>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Орошение*</label>
                        <select id="irrigation_id" class="form-select" name="irrigation_id" required>
                            <option disabled selected>Выбрать</option>
                            @foreach($irrigations as $irrigation)
                                <option value="{{ $irrigation->id }}" {{ old('irrigation_id') == $irrigation->id ? 'selected' : '' }}>{{ $irrigation->title_ru }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Изображения</label>
                        <input type="file" name="images[]" class="form-control" multiple>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Добавить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
