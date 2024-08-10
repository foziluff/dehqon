@extends('admin.layouts.index')
@php
    $module = 'organizations';
    $title = 'Редактирование организатора';
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

                    <!-- Title Fields -->
                    <div class="mt-3">
                        <label class="form-label">Название (RU)</label>
                        <input value="{{ $record->title_ru }}" name="title_ru" placeholder="Название" type="text" class="form-control">
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Название (UZ)</label>
                        <input value="{{ $record->title_uz }}" name="title_uz" placeholder="Название" type="text" class="form-control">
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Название (TJ)</label>
                        <input value="{{ $record->title_tj }}" name="title_tj" placeholder="Название" type="text" class="form-control">
                    </div>

                    <!-- Description Fields -->
                    <div class="mt-3">
                        <label class="form-label">Описание (RU)</label>
                        <textarea name="description_ru" class="form-control" rows="3">{{ $record->description_ru }}</textarea>
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Описание (UZ)</label>
                        <textarea name="description_uz" class="form-control" rows="3">{{ $record->description_uz }}</textarea>
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Описание (TJ)</label>
                        <textarea name="description_tj" class="form-control" rows="3">{{ $record->description_tj }}</textarea>
                    </div>

                    <!-- Address Fields -->
                    <div class="mt-3">
                        <label class="form-label">Адрес (RU)</label>
                        <input value="{{ $record->address_ru }}" name="address_ru" placeholder="Адрес" type="text" class="form-control">
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Адрес (UZ)</label>
                        <input value="{{ $record->address_uz }}" name="address_uz" placeholder="Адрес" type="text" class="form-control">
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Адрес (TJ)</label>
                        <input value="{{ $record->address_tj }}" name="address_tj" placeholder="Адрес" type="text" class="form-control">
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Телефон</label>
                        <input value="{{ $record->phone }}" name="phone" placeholder="Телефон" type="text" class="form-control">
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Email</label>
                        <input value="{{ $record->email }}" name="email" placeholder="Email" type="email" class="form-control">
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Сайт</label>
                        <input value="{{ $record->site }}" name="site" placeholder="Сайт" type="text" class="form-control">
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Изображение</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3 mr-1">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
