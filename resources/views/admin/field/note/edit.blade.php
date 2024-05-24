@extends('admin.layouts.index')
@php
    $modul = 'notes';
    $title = 'Редактирование заметки';
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
                                    <form action="{{ route('noteImages.destroy', $image->id) }}" method="POST">
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
                <form action="{{ route($modul . '.update', $record->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="mt-3">
                        <label class="form-label">Поля*</label>
                        <select id="field_id" class="form-select" name="field_id" required>
                            <option disabled selected>Выбрать поле</option>
                            @foreach($fields as $field)
                                <option value="{{ $field->id }}" {{ $record->field_id == $field->id ? 'selected' : '' }}>{{ $field->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Дата*</label>
                        <input value="{{ \Carbon\Carbon::parse($record->date)->format('Y-m-d') }}" name="date" type="date" class="form-control" required>
                    </div>

                    <div class="mt-3">
                        <label for="problem_id" class="form-label">Проблема*</label>
                        <select id="problem_id" class="form-select" name="problem_id" required>
                            <option disabled selected>Выбрать проблему</option>
                            @foreach($problems as $problem)
                                <option value="{{ $problem->id }}" {{ $record->problem_id == $problem->id ? 'selected' : '' }}>{{ $problem->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Описание*</label>
                        <textarea name="description" class="form-control" rows="3" required>{{ $record->description }}</textarea>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Площадь поражения*</label>
                        <input value="{{ $record->defeated_area }}" name="defeated_area" placeholder="Площадь поражения" type="number" class="form-control" required>
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
