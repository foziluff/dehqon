@extends('admin.layouts.index')
@php
    $module = 'cultureSeasons';
    $title = 'Просмотр сезона';
@endphp
@section('title', $title)

@section('content')
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header">{{ $title }}</h5>
            <div class="card-body">
                <a href="{{ route('cultureSeasons.works', $record->id) }}" type="button" class="btn btn-outline-secondary mr-1">Работы</a>
                <div class="mt-3">
                    <label class="form-label">Название</label>
                    <div class="form-control">{{ $record->title }}</div>
                </div>
                <div class="mt-3">
                    <label class="form-label">Культура*</label>
                    <div class="form-control">{{ $record->culture->title }}</div>
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

                <a href="{{ route($module . '.edit', $record->id) }}" class="btn btn-primary mt-3">Редактировать</a>
            </div>
        </div>
    </div>
@endsection
