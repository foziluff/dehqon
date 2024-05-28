@extends('admin.layouts.index')
@php
    $module = 'news';
    $title = 'Редактирование новости';
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
                                    <form action="{{ route($module . 'Images.destroy', $image->id) }}" method="POST">
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
                    @csrf
                    @method('PATCH')

                    <div class="mt-3">
                        <label class="form-label">Заголовок*</label>
                        <input value="{{ $record->title }}" name="title" type="text" class="form-control" required>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Описание*</label>
                        <textarea name="description" class="form-control" rows="3" required>{{ $record->description }}</textarea>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Дата*</label>
                        <input value="{{ \Carbon\Carbon::parse($record->date)->format('Y-m-d') }}" name="date" type="date" class="form-control" required>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">URL*</label>
                        <input value="{{ $record->url }}" name="url" type="text" class="form-control" required>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Изображения</label>
                        <input type="file" name="images[]" class="form-control" multiple>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
