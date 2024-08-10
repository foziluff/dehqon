@extends('admin.layouts.index')
@php
    $module = 'rotations';
    $title = 'Редактирование севооборота';
@endphp
@section('title', $title)
@section('content')
    @include('admin.layouts.components.messages')
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header">{{ $title }}</h5>
            <div class="card-body">
                <form action="{{ route($module . '.update', $record->id) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="mt-3">
                        <label class="form-label">Поле*</label>
                        <select id="field_id" class="form-select" name="field_id" required>
                            <option disabled selected>Выбрать поле</option>
                            @foreach($fields as $field)
                                <option value="{{ $field->id }}" {{ old('field_id', $record->field_id) == $field->id ? 'selected' : '' }}>{{ $field->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Культура*</label>
                        <select id="culture_id" class="form-select" name="culture_id" required>
                            <option disabled selected>Выбрать культуру</option>
                            @foreach($cultures as $culture)
                                <option value="{{ $culture->id }}" {{ old('culture_id', $record->culture_id) == $culture->id ? 'selected' : '' }}>{{ $culture->title_ru_ru }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Сорт культуры*</label>
                        <input value="{{ old('culture_sort', $record->culture_sort) }}" name="culture_sort" type="text" class="form-control" required>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Дата посева*</label>
                        <input value="{{ \Carbon\Carbon::parse(old('sowing_date', $record->sowing_date))->format('Y-m-d') }}" name="sowing_date" type="date" class="form-control" required>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Дата сбора*</label>
                        <input value="{{ \Carbon\Carbon::parse(old('harvesting_date', $record->harvesting_date))->format('Y-m-d') }}" name="harvesting_date" type="date" class="form-control" required>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Средний урожай*</label>
                        <input value="{{ old('average_yield', $record->average_yield) }}" name="average_yield" type="number" class="form-control" required>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Единица измерения урожая*</label>
                        <input value="{{ old('average_yield_unit', $record->average_yield_unit) }}" name="average_yield_unit" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
