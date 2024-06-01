@extends('admin.layouts.index')
@php
    $module = 'cultureSeasonWorks';
    $title = 'Редактирование работы сезона';
@endphp
@section('title', $title)

@section('content')
    @include('admin.layouts.components.messages')
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header">{{ $title }}</h5>
            <div class="card-body">
                <form action="{{ route($module . '.update', $record->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')@csrf

                    <div class="mt-3">
                        <label class="form-label">Время</label>
                        <input value="{{ $record->time }}" name="time" placeholder="Время" type="text" class="form-control">
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Работа</label>
                        <input value="{{ $record->work }}" name="work" placeholder="Работа" type="text" class="form-control">
                    </div>

                    <input type="hidden" value="{{ $record->cultureSeason->id }}" name="culture_season_id">

                    <button type="submit" class="btn btn-primary mt-3 mr-1">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
