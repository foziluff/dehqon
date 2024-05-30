@extends('admin.layouts.index')
@php
    $module = 'conversions';
    $title = 'Просмотр переработки';
@endphp
@section('title', $title)

@section('content')
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header">{{ $title }}</h5>
            <div class="card-body">
                <a href="{{ route('conversions.incomes', $record->id) }}" type="button" class="btn btn-outline-secondary mr-1">Доходы</a>
                <a href="{{ route('conversions.consumptions', $record->id) }}" type="button" class="btn btn-outline-secondary mr-1">Расходы</a>
                <a href="{{ route('conversions.quantities', $record->id) }}" type="button" class="btn btn-outline-secondary mr-1">Количество</a>
                <div class="mt-3">
                    <label class="form-label">Название</label>
                    <div class="form-control">{{ $record->title }}</div>
                </div>

                <a href="{{ route($module . '.edit', $record->id) }}" class="btn btn-primary mt-3">Редактировать</a>
            </div>
        </div>
    </div>
@endsection
