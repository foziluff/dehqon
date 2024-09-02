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
                        <label class="form-label">Вопрос (Русский)</label>
                        <input value="{{ $record->question_ru }}" name="question_ru" placeholder="Вопрос на русском" type="text" class="form-control">
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Вопрос (Узбекский)</label>
                        <input value="{{ $record->question_uz }}" name="question_uz" placeholder="Вопрос на узбекском" type="text" class="form-control">
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Вопрос (Таджикский)</label>
                        <input value="{{ $record->question_tj }}" name="question_tj" placeholder="Вопрос на таджикском" type="text" class="form-control">
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Ответ (Русский)</label>
                        <textarea name="answer_ru" placeholder="Ответ на русском" class="form-control">{{ $record->answer_ru }}</textarea>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Ответ (Узбекский)</label>
                        <textarea name="answer_uz" placeholder="Ответ на узбекском" class="form-control">{{ $record->answer_uz }}</textarea>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Ответ (Таджикский)</label>
                        <textarea name="answer_tj" placeholder="Ответ на таджикском" class="form-control">{{ $record->answer_tj }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
