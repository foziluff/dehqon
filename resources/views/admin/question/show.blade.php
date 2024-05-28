@extends('admin.layouts.index')
@php
    $module = 'questions';
    $title = 'Просмотр вопроса';
@endphp
@section('title', $title)

@section('content')
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header">{{ $title }}</h5>
            <div class="card-body">
                <div class="mt-3">
                    <label class="form-label">Вопрос</label>
                    <div class="form-control">{{ $record->question }}</div>
                </div>
                <div class="mt-3">
                    <label class="form-label">Ответ</label>
                    <div class="form-control">{{ $record->answer }}</div>
                </div>

                <a href="{{ route($module . '.edit', $record->id) }}" class="btn btn-primary mt-3">Редактировать</a>
            </div>
        </div>
    </div>
@endsection
