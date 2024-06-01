@extends('admin.layouts.index')
@php
    $module = 'cultureSeasonWorks';
    $title = 'Добавления работы сезона';
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
                        <label class="form-label">Время*</label>
                        <input value="{{ old('time') }}" name="time" placeholder="Дата" type="text" class="form-control" required>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Работа*</label>
                        <input value="{{ old('work') }}" name="work" placeholder="Работа" type="text" class="form-control" required>
                    </div>

                    @if(request()->has('culture_season_id'))
                        <input type="hidden" name="culture_season_id" value="{{ request('culture_season_id') }}">
                    @endif

                    <button type="submit" class="btn btn-primary mt-3">Добавить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
