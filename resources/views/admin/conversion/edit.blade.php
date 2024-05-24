@extends('admin.layouts.index')
@php
    $modul = 'conversions';
    $title = 'Редактирование переработки';
@endphp
@section('title', $title)

@section('content')
    @include('admin.layouts.components.messages')
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header">{{ $title }}</h5>
            <div class="card-body">
                <form action="{{ route($modul . '.update', $record->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')@csrf
                    <div class="mt-3">
                        <label class="form-label">Название</label>
                        <input value="{{ $record->title }}" name="title" placeholder="Название" type="text" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3 mr-1">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
