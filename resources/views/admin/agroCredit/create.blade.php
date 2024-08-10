@extends('admin.layouts.index')
@php
    $module = 'agroCredits';
    $title = 'Добавление агрокредита';
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

                    <!-- Title Fields -->
                    <div class="mb-3">
                        <label class="form-label">Название (RU)</label>
                        <input value="{{ old('title_ru') }}" name="title_ru" placeholder="Название" type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Название (UZ)</label>
                        <input value="{{ old('title_uz') }}" name="title_uz" placeholder="Название" type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Название (TJ)</label>
                        <input value="{{ old('title_tj') }}" name="title_tj" placeholder="Название" type="text" class="form-control">
                    </div>

                    <!-- Description Fields -->
                    <div class="mt-3">
                        <label class="form-label">Описание (RU)</label>
                        <textarea name="description_ru" class="form-control" placeholder="Описание" rows="3">{{ old('description_ru') }}</textarea>
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Описание (UZ)</label>
                        <textarea name="description_uz" class="form-control" placeholder="Описание" rows="3">{{ old('description_uz') }}</textarea>
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Описание (TJ)</label>
                        <textarea name="description_tj" class="form-control" placeholder="Описание" rows="3">{{ old('description_tj') }}</textarea>
                    </div>

                    <!-- Address Fields -->
                    <div class="mb-3">
                        <label class="form-label">Адрес (RU)</label>
                        <input value="{{ old('address_ru') }}" name="address_ru" placeholder="Адрес" type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Адрес (UZ)</label>
                        <input value="{{ old('address_uz') }}" name="address_uz" placeholder="Адрес" type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Адрес (TJ)</label>
                        <input value="{{ old('address_tj') }}" name="address_tj" placeholder="Адрес" type="text" class="form-control">
                    </div>

                    <!-- Common Fields -->
                    <div class="mb-3">
                        <label class="form-label">Телефон</label>
                        <input value="{{ old('phone') }}" name="phone" placeholder="Телефон" type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input value="{{ old('email') }}" name="email" placeholder="Email" type="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Сайт</label>
                        <input value="{{ old('site') }}" name="site" placeholder="Сайт" type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Изображение</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Добавить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
