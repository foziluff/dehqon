@extends('admin.layouts.index')
@php
    $module = 'consumptionCategories';
    $title = 'Просмотр категории';
@endphp
@section('title', $title)

@section('content')
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header">{{ $title }}</h5>
            <div class="card-body">
                <div>
                    <label class="form-label">Название</label>
                    <div class="form-control">{{ $record->title }}</div>
                </div>

                <a href="{{ route($module . '.edit', $record->id) }}" class="btn btn-primary mt-3">Редактировать</a>
            </div>
        </div>
    </div>
@endsection
