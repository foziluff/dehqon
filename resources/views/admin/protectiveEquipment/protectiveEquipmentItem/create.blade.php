@extends('admin.layouts.index')
@php
    $module = 'protectiveEquipmentItems';
    $title = 'Добавление';
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
                        <label class="form-label">Название (RU)</label>
                        <input value="{{ old('title_ru') }}" name="title_ru" placeholder="Название" type="text" class="form-control">
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Название (UZ)</label>
                        <input value="{{ old('title_uz') }}" name="title_uz" placeholder="Название" type="text" class="form-control">
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Название (TJ)</label>
                        <input value="{{ old('title_tj') }}" name="title_tj" placeholder="Название" type="text" class="form-control">
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Описание (Русский)*</label>
                        <textarea name="description_ru" class="form-control" rows="3" required>{{ old('description_ru') }}</textarea>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Описание (Узбекский)*</label>
                        <textarea name="description_uz" class="form-control" rows="3" required>{{ old('description_uz') }}</textarea>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Описание (Таджикский)*</label>
                        <textarea name="description_tj" class="form-control" rows="3" required>{{ old('description_tj') }}</textarea>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Средства защиты*</label>
                        <select id="protectiveEquipment_id" class="form-select" name="protective_equipment_id" required>
                            <option disabled selected>Выбрать</option>
                            @foreach($protectiveEquipments as $protectiveEquipment)
                                <option value="{{ $protectiveEquipment->id }}" {{ old('protectiveEquipment_id') == $protectiveEquipment->id ? 'selected' : '' }}>{{ $protectiveEquipment->title_ru }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Изображение</label>
                        <input type="file" name="image" class="form-control" >
                    </div>


                    <button type="submit" class="btn btn-primary mt-3">Добавить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
