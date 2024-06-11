@extends('admin.layouts.index')
@php
    $module = 'rotations';
    $title = 'Просмотр севооборота';
@endphp
@section('title', $title)
@section('content')
    @include('admin.layouts.components.messages')
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header">{{ $title }}</h5>
            <div class="card-body">
                <div class="mt-3">
                    <label class="form-label">Поле*</label>
                    <input type="text" class="form-control" value="{{ $record->field->title }}" readonly>
                </div>

                <div class="mt-3">
                    <label class="form-label">Культура*</label>
                    <input type="text" class="form-control" value="{{ $record->culture->title }}" readonly>
                </div>

                <div class="mt-3">
                    <label class="form-label">Сорт культуры*</label>
                    <input type="text" class="form-control" value="{{ $record->culture_sort }}" readonly>
                </div>

                <div class="mt-3">
                    <label class="form-label">Дата посева*</label>
                    <input type="text" class="form-control" value="{{ $record->sowing_date }}" readonly>
                </div>

                <div class="mt-3">
                    <label class="form-label">Дата сбора*</label>
                    <input type="text" class="form-control" value="{{ $record->harvesting_date }}" readonly>
                </div>

                <div class="mt-3">
                    <label class="form-label">Средний урожай*</label>
                    <input type="text" class="form-control" value="{{ $record->average_yield }}" readonly>
                </div>

                <div class="mt-3">
                    <label class="form-label">Единица измерения урожая*</label>
                    <input type="text" class="form-control" value="{{ $record->average_yield_unit }}" readonly>
                </div>

                @if(Auth::user()->role == 1)
                    <a href="{{ route($module . '.edit', $record->id) }}" class="btn btn-primary mt-3">Редактировать</a>
                @endif
            </div>
        </div>
    </div>
@endsection
