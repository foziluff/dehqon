@extends('admin.layouts.index')
@php
    $module = 'cultureSeasonWorks';
    $title = 'Просмотр работы сезона';
@endphp
@section('title', $title)

@section('content')
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header">{{ $title }}</h5>
            <div class="card-body">

                <div class="mt-3">
                    <label class="form-label">Время</label>
                    <div class="form-control">{{ $record->time }}</div>
                </div>

                <div class="mt-3">
                    <label class="form-label">Работа (RU)</label>
                    <div class="form-control">{{ $record->work_ru }}</div>
                </div>

                <div class="mt-3">
                    <label class="form-label">Работа (UZ)</label>
                    <div class="form-control">{{ $record->work_uz }}</div>
                </div>

                <div class="mt-3">
                    <label class="form-label">Работа (TJ)</label>
                    <div class="form-control">{{ $record->work_tj }}</div>
                </div>

                <a href="{{ route($module . '.edit', $record->id) }}" class="btn btn-primary mt-3">Редактировать</a>
            </div>
        </div>
    </div>
@endsection
