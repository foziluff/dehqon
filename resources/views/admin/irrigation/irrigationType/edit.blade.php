@extends('admin.layouts.index')
@php
    $module = 'irrigationTypes';
    $title = 'Редактирование типа орошения';
@endphp
@section('title', $title)

@section('content')
    @include('admin.layouts.components.messages')
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header">{{ $title }}</h5>
            <div class="card-body">

                @if(!$images->isEmpty())
                    <div class="mt-3 form-control">
                        <div class="mt-3">
                            @foreach($images as $image)
                                <div class="image-container">
                                    <form action="{{ route('irrigationTypeImages.destroy', $image->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <img src="{{ asset($image->image_path) }}" alt="Изображение" class="img-fluid">
                                        <button type="submit" class="btn btn-icon btn-outline-danger">
                                            <span class="tf-icons bx bx-trash"></span>
                                        </button>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
                <form action="{{ route($module . '.update', $record->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')@csrf
                    <div class="mt-3">
                        <label class="form-label">Название (RU)</label>
                        <input value="{{ $record->title_ru }}" name="title_ru" placeholder="Название на русском" type="text" class="form-control">
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Название (UZ)</label>
                        <input value="{{ $record->title_uz }}" name="title_uz" placeholder="Название на узбекском" type="text" class="form-control">
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Название (TJ)</label>
                        <input value="{{ $record->title_tj }}" name="title_tj" placeholder="Название на таджикском" type="text" class="form-control">
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Описание (RU)</label>
                        <textarea name="description_ru" placeholder="Описание на русском" class="form-control">{{ $record->description_ru }}</textarea>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Описание (UZ)</label>
                        <textarea name="description_uz" placeholder="Описание на узбекском" class="form-control">{{ $record->description_uz }}</textarea>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Описание (TJ)</label>
                        <textarea name="description_tj" placeholder="Описание на таджикском" class="form-control">{{ $record->description_tj }}</textarea>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Орошение*</label>
                        <select id="irrigation_id" class="form-select" name="irrigation_id" required>
                            <option disabled selected>Выбрать</option>
                            @foreach($irrigations as $irrigation)
                                <option value="{{ $irrigation->id }}" {{ $record->irrigation_id == $irrigation->id ? 'selected' : '' }}>{{ $irrigation->title_ru }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Изображения</label>
                        <input type="file" name="images[]" class="form-control" multiple>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3 mr-1">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
