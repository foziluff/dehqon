@extends('admin.layouts.index')
@php
    $modul = 'questions';
    $title = 'Добавления вопроса';
@endphp
@section('title', $title)
@section('content')
    @include('admin.layouts.components.messages')
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header">{{ $title }}</h5>
            <div class="card-body">
                <form action="{{ route($modul . '.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mt-3">
                        <label class="form-label">Вопрос*</label>
                        <input value="{{ old('question') }}" name="question" placeholder="Вопрос" type="text" class="form-control">
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Ответ*</label>
                        <textarea name="answer" placeholder="Ответ" class="form-control">{{ old('answer') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Добавить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
