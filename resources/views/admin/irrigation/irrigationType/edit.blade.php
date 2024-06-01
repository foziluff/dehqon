@extends('admin.layouts.index')
@php
    $module = 'irrigationTypes';
    $title = 'Редактирование типа орощения';
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
                                        <img src="{{ $image->image_path }}" alt="Изображение" class="img-fluid">
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
                        <label class="form-label">Название</label>
                        <input value="{{ $record->title }}" name="title" placeholder="Название" type="text" class="form-control">
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Описание</label>
                        <textarea name="description" placeholder="Описание"class="form-control">{{ $record->description }}</textarea>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Орощении*</label>
                        <select id="irrigation_id" class="form-select" name="irrigation_id" required>
                            <option disabled selected>Выбрать</option>
                            @foreach($irrigations as $irrigation)
                                <option value="{{ $irrigation->id }}" {{ $record->irrigation_id == $irrigation->id ? 'selected' : '' }}>{{ $irrigation->title }}</option>
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
