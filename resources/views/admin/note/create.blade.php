@extends('admin.layouts.index')
@php
    $modul = 'notes';
    $title = 'Добавление заметки';
@endphp
@section('title', $title)
@section('content')
    @include('admin.layouts.components.messages')
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header">{{ $title }}</h5>
            <div class="card-body">
                <form action="{{ route($modul . '.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mt-3">
                        <label class="form-label">Мои поли*</label>
                        <select id="field_id" class="form-select" name="field_id" required>
                            <option disabled selected>Выбрать поле</option>
                            @foreach($fields as $field)
                                <option value="{{ $field->id }}" {{ old('field_id') == $field->id ? 'selected' : '' }}>{{ $field->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Дата*</label>
                        <input value="{{ \Carbon\Carbon::parse(old('date'))->format('Y-m-d') }}" name="date" type="date" class="form-control" required>
                    </div>

                    <div class="mt-3">
                        <label for="problem_id" class="form-label">Проблема*</label>
                        <select id="problem_id" class="form-select" name="problem_id" required>
                            <option disabled selected>Выбрать проблему</option>
                            @foreach($problems as $problem)
                                <option value="{{ $problem->id }}" {{ old('problem_id') == $problem->id ? 'selected' : '' }}>{{ $problem->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Описание*</label>
                        <textarea name="description" class="form-control" rows="3" required>{{ old('description') }}</textarea>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Площадь поражения*</label>
                        <input value="{{ old('defeated_area') }}" name="defeated_area" placeholder="Площадь поражения" type="number" class="form-control" required>
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
