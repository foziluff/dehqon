@extends('admin.layouts.index')
@php
    $module = 'irrigations';
    $title = 'Добавления ирригации';
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
                    <div>
                        <label class="form-label">Название</label>
                        <input value="{{ old('title') }}" name="title" placeholder="Название" type="text" class="form-control">
                    </div>
                    <div class="mt-3">
                        <label for="defaultFormControlInput" class="form-label">Изображение</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Добавить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
