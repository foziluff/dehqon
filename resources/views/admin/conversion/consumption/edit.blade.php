@extends('admin.layouts.index')

@php
    $modul = 'conversionConsumptions';
    $title = 'Редактирование расхода';
@endphp

@section('title', $title)

@section('content')
    @include('admin.layouts.components.messages')
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header">{{ $title }}</h5>
            <div class="card-body">
                <form action="{{ route($modul . '.update', $record->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="mt-3">
                        <label class="form-label">Дата*</label>
                        <input value="{{ \Carbon\Carbon::parse($record->date)->format('Y-m-d') }}" name="date" type="date" class="form-control" required>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Переработка*</label>
                        <select name="conversion_id" class="form-select" required>
                            <option disabled selected>Select conversion</option>
                            @foreach($conversions as $conversion)
                                <option value="{{ $conversion->id }}" {{ $record->conversion_id == $conversion->id ? 'selected' : '' }}>{{ $conversion->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Тип продукта*</label>
                        <select name="product_type_id" class="form-select" required>
                            <option disabled selected>Select Product Type</option>
                            @foreach($productTypes as $productType)
                                <option value="{{ $productType->id }}" {{ $record->product_type_id == $productType->id ? 'selected' : '' }}>{{ $productType->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Тип переработки*</label>
                        <select name="conversion_type_id" class="form-select" required>
                            <option disabled selected>Select Product Type</option>
                            @foreach($conversionTypes as $conversionType)
                                <option value="{{ $conversionType->id }}" {{ $record->conversion_type_id == $conversionType->id ? 'selected' : '' }}>{{ $conversionType->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Культура*</label>
                        <select name="culture_id" class="form-select" required>
                            <option disabled selected>Select Culture</option>
                            @foreach($cultures as $culture)
                                <option value="{{ $culture->id }}" {{ $record->culture_id == $culture->id ? 'selected' : '' }}>{{ $culture->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Категория*</label>
                        <select name="conversion_category_id" class="form-select" required>
                            <option disabled selected>Select conversion Category</option>
                            @foreach($conversionCategories as $category)
                                <option value="{{ $category->id }}" {{ $record->conversion_category_id == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Операция*</label>
                        <select name="conversion_operation_id" class="form-select" required>
                            <option disabled selected>Select conversion Operation</option>
                            @foreach($conversionOperations as $operation)
                                <option value="{{ $operation->id }}" {{ $record->conversion_operation_id == $operation->id ? 'selected' : '' }}>{{ $operation->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Средство производства*</label>
                        <select name="conversion_production_mean_id" class="form-select" required>
                            <option disabled selected>Select conversion Production Mean</option>
                            @foreach($conversionProductionMeans as $mean)
                                <option value="{{ $mean->id }}" {{ $record->conversion_production_mean_id == $mean->id ? 'selected' : '' }}>{{ $mean->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Наименование*</label>
                        <select name="conversion_naming_id" class="form-select" required>
                            <option disabled selected>Select conversion Naming</option>
                            @foreach($conversionNamings as $naming)
                                <option value="{{ $naming->id }}" {{ $record->conversion_naming_id == $naming->id ? 'selected' : '' }}>{{ $naming->title }}</option>
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
