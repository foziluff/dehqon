@extends('admin.layouts.index')

@php
    $modul = 'consumptions';
    $title = 'Добавление расхода';
@endphp

@section('title', $title)

@section('content')
    @include('admin.layouts.components.messages')
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header">{{ $title }}</h5>
            <div class="card-body">
                <form action="{{ route($modul . '.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mt-3">
                        <label class="form-label">Дата*</label>
                        <input value="{{ \Carbon\Carbon::parse(old('date'))->format('Y-m-d') }}" name="date" type="date" class="form-control" required>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Поле*</label>
                        <select name="field_id" class="form-select" required>
                            <option disabled selected>Выберите поле</option>
                            @foreach($fields as $field)
                                <option value="{{ $field->id }}" {{ old('field_id') == $field->id ? 'selected' : '' }}>{{ $field->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Тип продукта*</label>
                        <select name="product_type_id" class="form-select" required>
                            <option disabled selected>Выберите тип продукта</option>
                            @foreach($productTypes as $productType)
                                <option value="{{ $productType->id }}" {{ old('product_type_id') == $productType->id ? 'selected' : '' }}>{{ $productType->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Культура*</label>
                        <select name="culture_id" class="form-select" required>
                            <option disabled selected>Выберите культуру</option>
                            @foreach($cultures as $culture)
                                <option value="{{ $culture->id }}" {{ old('culture_id') == $culture->id ? 'selected' : '' }}>{{ $culture->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Категория*</label>
                        <select name="consumption_category_id" class="form-select" required>
                            <option disabled selected>Выберите категорию расхода</option>
                            @foreach($consumptionCategories as $category)
                                <option value="{{ $category->id }}" {{ old('consumption_category_id') == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Операция*</label>
                        <select name="consumption_operation_id" class="form-select" required>
                            <option disabled selected>Выберите операцию расхода</option>
                            @foreach($consumptionOperations as $operation)
                                <option value="{{ $operation->id }}" {{ old('consumption_operation_id') == $operation->id ? 'selected' : '' }}>{{ $operation->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Средство производства*</label>
                        <select name="consumption_production_mean_id" class="form-select" required>
                            <option disabled selected>Выберите средство производства</option>
                            @foreach($consumptionProductionMeans as $mean)
                                <option value="{{ $mean->id }}" {{ old('consumption_production_mean_id') == $mean->id ? 'selected' : '' }}>{{ $mean->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Наименование*</label>
                        <select name="consumption_naming_id" class="form-select" required>
                            <option disabled selected>Выберите наименование</option>
                            @foreach($consumptionNamings as $naming)
                                <option value="{{ $naming->id }}" {{ old('consumption_naming_id') == $naming->id ? 'selected' : '' }}>{{ $naming->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Количество*</label>
                        <input value="{{ old('quantity') }}" name="quantity" type="number" class="form-control" required>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Единица измерения*</label>
                        <input value="{{ old('quantity_unit') }}" name="quantity_unit" type="text" class="form-control" required>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Цена*</label>
                        <input value="{{ old('price') }}" name="price" type="number" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Добавить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
