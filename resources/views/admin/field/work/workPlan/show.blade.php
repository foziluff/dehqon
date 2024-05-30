@extends('admin.layouts.index')
@php
    $module = 'workPlans';
    $title = 'Просмотр плана работ';
@endphp
@section('title', $title)

@section('content')
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header">{{ $title }}</h5>
            <div class="card-body">
                <a href="{{ route('workPlans.workStages', $record->id) }}" type="button" class="btn btn-outline-secondary mr-1">Этап работ</a>
                <div class="mt-3">
                    <label class="form-label">Название</label>
                    <div class="form-control">{{ $record->title }}</div>
                </div>

                <div class="mt-3">
                    <label class="form-label">Поле</label>
                    <div class="form-control">{{ $record->field->title }}</div>
                </div>

                <a href="{{ route($module . '.edit', $record->id) }}" class="btn btn-primary mt-3">Редактировать</a>
            </div>
        </div>
    </div>
@endsection
