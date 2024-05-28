@extends('admin.layouts.index')
@php
    $module = 'questions';
    $title = 'Редактирование вопроса';
@endphp
@section('title', $title)

@section('content')
    @include('admin.layouts.components.messages')
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header">{{ $title }}</h5>
            <div class="card-body">
                <form action="{{ route($module . '.update', $record->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="mt-3">
                        <label class="form-label">Вопрос*</label>
                        <input value="{{ $record->question }}" name="question" placeholder="Вопрос" type="text" class="form-control">
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Ответ*</label>
                        <textarea name="answer" placeholder="Ответ" class="form-control">{{ $record->answer }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
