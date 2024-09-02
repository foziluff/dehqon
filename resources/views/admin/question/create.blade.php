@extends('admin.layouts.index')

@php
    $module = 'questions';
    $title = 'Добавление вопроса';
@endphp

@section('title', $title)

@section('content')
    @include('admin.layouts.components.messages')
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header">{{ $title }}</h5>
            <div class="card-body">
                <form action="{{ route($module . '.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mt-3">
                        <label class="form-label">Вопрос (Русский)</label>
                        <input value="{{ old('question_ru') }}" name="question_ru" placeholder="Вопрос на русском" type="text" class="form-control">
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Вопрос (Узбекский)</label>
                        <input value="{{ old('question_uz') }}" name="question_uz" placeholder="Вопрос на узбекском" type="text" class="form-control">
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Вопрос (Таджикский)</label>
                        <input value="{{ old('question_tj') }}" name="question_tj" placeholder="Вопрос на таджикском" type="text" class="form-control">
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Ответ (Русский)</label>
                        <textarea name="answer_ru" placeholder="Ответ на русском" class="form-control">{{ old('answer_ru') }}</textarea>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Ответ (Узбекский)</label>
                        <textarea name="answer_uz" placeholder="Ответ на узбекском" class="form-control">{{ old('answer_uz') }}</textarea>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Ответ (Таджикский)</label>
                        <textarea name="answer_tj" placeholder="Ответ на таджикском" class="form-control">{{ old('answer_tj') }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Добавить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
