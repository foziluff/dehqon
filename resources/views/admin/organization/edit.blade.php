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
                                <img src="{{ $record->image_path }}" alt="Изображение" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Название</label>
                        <input value="{{ $record->title }}" name="title" placeholder="Название" type="text" class="form-control">
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Описание*</label>
                        <textarea name="description" class="form-control" rows="3" required>{{ $record->description }}</textarea>
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Адрес</label>
                        <input value="{{ $record->address }}" name="address" placeholder="Адрес" type="text" class="form-control">
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
