@extends('admin.layouts.index')

@php
    $module = 'conversionQuantities';
    $title = 'Редактирование количество переработки';
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
                        <label class="form-label">Переработка*</label>
                        <select name="conversion_id" class="form-select" required>
                            <option disabled selected>Выберите переработку</option>
                            @foreach($conversions as $conversion)
                                <option value="{{ $conversion->id }}" {{ $record->conversion_id == $conversion->id ? 'selected' : '' }}>{{ $conversion->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Тип переработки*</label>
                        <select name="conversion_type_id" class="form-select" required>
                            <option disabled selected>Выберите тип переработки</option>
                            @foreach($conversionTypes as $conversionType)
                                <option value="{{ $conversionType->id }}" {{ $record->conversion_type_id == $conversionType->id ? 'selected' : '' }}>{{ $conversionType->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Название переработки*</label>
                        <select name="conversion_naming_id" class="form-select" required>
                            <option disabled selected>Выберите название переработки</option>
                            @foreach($conversionNamings as $conversionNaming)
                                <option value="{{ $conversionNaming->id }}" {{ $record->conversion_naming_id == $conversionNaming->id ? 'selected' : '' }}>{{ $conversionNaming->title }}</option>
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

                    <button type="submit" class="btn btn-primary mt-3">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
