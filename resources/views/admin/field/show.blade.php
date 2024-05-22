@extends('admin.layouts.index')
@php
    $modul = 'cultures';
    $title = 'Страница культуры';
@endphp
@section('title', $title)

@section('content')
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header">Страница события</h5>
            <div class="card-body">
                <div>
                    <label class="form-label">Название</label>
                    <div class="form-control">{{ $record->title }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
