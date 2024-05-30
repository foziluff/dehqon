@extends('admin.layouts.index')
@php
    $module = 'workStages';
    $title = 'Добавление этапа работ';
@endphp
@section('title', $title)
@section('content')
    @include('admin.layouts.components.messages')
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header">{{ $title }}</h5>
            <div class="card-body">
                <form action="{{ route($module . '.store') }}" method="POST">
                    @csrf
                    <div class="mt-3">
                        <label class="form-label">Дата*</label>
                        <input value="{{ \Carbon\Carbon::parse(old('date'))->format('Y-m-d') }}" name="date" placeholder="Дата" type="date" class="form-control" required>
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Работа*</label>
                        <select id="work_id" class="form-select" name="work_id" required>
                            <option disabled selected>Выбрать работу</option>
                            @foreach($works as $work)
                                <option value="{{ $work->id }}" {{ old('work_id') == $work->id ? 'selected' : '' }}>{{ $work->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Планы работ*</label>
                        <select id="work_plan_id" class="form-select" name="work_plan_id" required>
                            <option disabled selected>Выбрать план</option>
                            @foreach($workPlans as $workPlan)
                                <option value="{{ $workPlan->id }}" {{ old('work_plan_id') == $workPlan->id ? 'selected' : '' }}>{{ $workPlan->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Материал*</label>
                        <input value="{{ old('material') }}" name="material" placeholder="Материал" type="text" class="form-control" required>
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Количество материала*</label>
                        <input value="{{ old('material_quantity') }}" name="material_quantity" placeholder="Количество материала" type="number" class="form-control" required>
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Единица измерения материала*</label>
                        <input value="{{ old('material_quantity_unit') }}" name="material_quantity_unit" placeholder="Единица измерения материала" type="text" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Добавить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
