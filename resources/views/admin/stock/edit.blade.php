@extends('admin.layouts.index')

@php
    $module = 'stocks';
    $title = 'Редактирование прихода';
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
                        <label class="form-label">Дата*</label>
                        <input value="{{ \Carbon\Carbon::parse($record->date)->format('Y-m-d') }}" name="date" type="date" class="form-control" required>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Название*</label>
                        <input value="{{ old('title', $record->title) }}" name="title" type="text" class="form-control" required>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Средство производства*</label>
                        <select name="consumption_production_mean_id" class="form-select" required>
                            <option disabled selected>Выберите средство</option>
                            @foreach($consumptionProductionMeans as $mean)
                                <option value="{{ $mean->id }}" {{ $record->consumption_production_mean_id == $mean->id ? 'selected' : '' }}>{{ $mean->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Количество*</label>
                        <input value="{{ old('quantity', $record->quantity) }}" name="quantity" type="number" class="form-control" required>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Единица измерения*</label>
                        <input value="{{ old('quantity_unit', $record->quantity_unit) }}" name="quantity_unit" type="text" class="form-control" required>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Цена*</label>
                        <input value="{{ old('price', $record->price) }}" name="price" type="number" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
