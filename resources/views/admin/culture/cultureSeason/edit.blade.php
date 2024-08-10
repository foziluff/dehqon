@extends('admin.layouts.index')
@php
    $module = 'cultureSeasons';
    $title = 'Редактирование сезона';
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
                        <h6 class="mb-3">Существующие изображения:</h6>
                        <div class="row">
                            @foreach($images as $image)
                                <div class="col-md-3 mb-3">
                                    <div class="image-container">
                                        <form action="{{ route('cultureSeasonImages.destroy', $image->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="position-relative">
                                                <img src="{{ asset($image->image_path) }}" alt="Изображение" class="img-fluid">
                                                <button type="submit" class="btn btn-icon btn-outline-danger position-absolute top-0 end-0 m-2">
                                                    <span class="tf-icons bx bx-trash"></span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <form action="{{ route($module . '.update', $record->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf

                    <div class="mt-3">
                        <label class="form-label">Название (RU)</label>
                        <input value="{{ old('title_ru', $record->title_ru) }}" name="title_ru" placeholder="Название (RU)" type="text" class="form-control">
                        @error('title_ru')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Название (UZ)</label>
                        <input value="{{ old('title_uz', $record->title_uz) }}" name="title_uz" placeholder="Название (UZ)" type="text" class="form-control">
                        @error('title_uz')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Название (TJ)</label>
                        <input value="{{ old('title_tj', $record->title_tj) }}" name="title_tj" placeholder="Название (TJ)" type="text" class="form-control">
                        @error('title_tj')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Культура*</label>
                        <select id="culture_id" class="form-select" name="culture_id" required>
                            <option disabled selected>Выбрать культуру</option>
                            @foreach($cultures as $culture)
                                <option value="{{ $culture->id }}" {{ old('culture_id', $record->culture_id) == $culture->id ? 'selected' : '' }}>{{ $culture->title_ru }}</option>
                            @endforeach
                        </select>
                        @error('culture_id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Изображения</label>
                        <input type="file" name="images[]" class="form-control" multiple>
                        @error('images.*')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
