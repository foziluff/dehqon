@extends('admin.layouts.index')
@php
    $module = 'consumptionNamings';
    $title = 'Добавления наименовании';
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
                        <label class="form-label">Название (Русский)</label>
                        <input value="{{ old('title_ru') }}" name="title_ru" placeholder="Название на русском" type="text" class="form-control @error('title_ru') is-invalid @enderror">
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Название (Узбекский)</label>
                        <input value="{{ old('title_uz') }}" name="title_uz" placeholder="Название на узбекском" type="text" class="form-control @error('title_uz') is-invalid @enderror">
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Название (Таджикский)</label>
                        <input value="{{ old('title_tj') }}" name="title_tj" placeholder="Название на таджикском" type="text" class="form-control @error('title_tj') is-invalid @enderror">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Добавить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
