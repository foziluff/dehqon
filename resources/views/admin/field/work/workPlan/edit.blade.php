@extends('admin.layouts.index')
@php
    $modul = 'workPlans';
    $title = 'Редактирование плана работ';
@endphp
@section('title', $title)
@section('content')
    @include('admin.layouts.components.messages')
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header">{{ $title }}</h5>
            <div class="card-body">
                <form action="{{ route($modul . '.update', $record->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="mt-3">
                        <label class="form-label">Название*</label>
                        <input value="{{ old('title', $record->title) }}" name="title" placeholder="Название" type="text" class="form-control" required>
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Поле*</label>
                        <select id="field_id" class="form-select" name="field_id" required>
                            <option disabled selected>Выбрать поле</option>
                            @foreach($fields as $field)
                                <option value="{{ $field->id }}" {{ old('field_id', $record->field_id) == $field->id ? 'selected' : '' }}>{{ $field->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
