@extends('admin.layouts.index')
@php
    $module = 'irrigationTypes';
    $title = 'Добавления типа орощения';
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
                        <label class="form-label">Название</label>
                        <input value="{{ old('title') }}" name="title" placeholder="Название" type="text" class="form-control">
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Описание</label>
                        <textarea name="description" placeholder="Описание"class="form-control">{{ old('description') }}</textarea>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Орощении*</label>
                        <select id="irrigation_id" class="form-select" name="irrigation_id" required>
                            <option disabled selected>Выбрать</option>
                            @foreach($irrigations as $irrigation)
                                <option value="{{ $irrigation->id }}" {{ old('irrigation_id') == $irrigation->id ? 'selected' : '' }}>{{ $irrigation->title }}</option>
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
