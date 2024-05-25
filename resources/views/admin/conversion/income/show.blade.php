@extends('admin.layouts.index')

@php
    $modul = 'conversionIncomes';
    $title = 'Просмотр дохода';
@endphp

@section('title', $title)

@section('content')
    @include('admin.layouts.components.messages')
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header">{{ $title }}</h5>
            <div class="card-body">
                <div class="mt-3">
                    <label class="form-label">Дата</label>
                    <div class="form-control">{{ $record->date }}</div>
                </div>

                <div class="mt-3">
                    <label class="form-label">Переработка</label>
                    <div class="form-control">{{ $record->conversion->title }}</div>
                </div>

                <div class="mt-3">
                    <label class="form-label">Тип переработки</label>
                    <div class="form-control">{{ $record->conversionType->title }}</div>
                </div>

                <div class="mt-3">
                    <label class="form-label">Наименование</label>
                    <div class="form-control">{{ $record->conversionNaming->title }}</div>
                </div>

                <div class="mt-3">
                    <label class="form-label">Количество</label>
                    <div class="form-control">{{ $record->quantity }}</div>
                </div>

                <div class="mt-3">
                    <label class="form-label">Единица измерения</label>
                    <div class="form-control">{{ $record->quantity_unit }}</div>
                </div>

                <div class="mt-3">
                    <label class="form-label">Цена</label>
                    <div class="form-control">{{ $record->price }}</div>
                </div>

                <a href="{{ route($modul . '.edit', $record->id) }}" class="btn btn-primary mt-3">Редактировать</a>

            </div>
        </div>
    </div>
@endsection
