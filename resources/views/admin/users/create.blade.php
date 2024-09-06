@extends('admin.layouts.index')
@php
    $module = 'users';
    $title = 'Добавление пользователя';
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
                        <label for="name" class="form-label">Имя*</label>
                        <input value="{{ old('name') }}" name="name" placeholder="Имя" type="text" class="form-control" required>
                    </div>
                    <div class="mt-3">
                        <label for="surname" class="form-label">Фамилия*</label>
                        <input value="{{ old('surname') }}" name="surname" placeholder="Фамилия" type="text" class="form-control" required>
                    </div>
                    <div class="mt-3">
                        <label for="phone" class="form-label">Телефон* (992XXXXXXXXX)</label>
                        <input value="{{ old('phone') }}" name="phone" placeholder="Телефон" type="text" class="form-control" required>
                    </div>
                    <div class="mt-3">
                        <label for="born_in" class="form-label">Дата рождения*</label>
                        <input value="{{ \Carbon\Carbon::parse(old('born_in'))->format('Y-m-d') }}" name="born_in" placeholder="Дата рождения" type="date" class="form-control" required>
                    </div>
                    <div class="mt-3">
                        <label for="password" class="form-label">Пароль</label>
                        <input name="password" placeholder="Пароль" type="password" class="form-control">
                    </div>
                    <div class="mt-3">
                        <label for="gender" class="form-label">Пол*</label>
                        <select name="gender" class="form-control" required>
                            <option value="">Выберите пол</option>
                            <option value="1" {{ old('gender') == 1 ? 'selected' : '' }}>Мужской</option>
                            <option value="0" {{ old('gender') == 0 ? 'selected' : '' }}>Женский</option>
                        </select>
                    </div>
                    <div class="mt-3">
                        <label for="role" class="form-label">Роль*</label>
                        <select name="role" class="form-control" required>
                            <option value="1" {{ old('role') == 1 ? 'selected' : '' }}>Администратор</option>
                            <option value="2" {{ old('role') == 2 ? 'selected' : '' }}>Агроном</option>
                            <option value="0" {{ old('role') == 0 ? 'selected' : '' }}>Пользователь</option>
                        </select>

                    </div>

                    <div class="mt-3">
                        <label for="currency" class="form-label">Валюта*</label>
                        <input value="{{ old('currency') }}" name="currency" placeholder="Валюта" type="text" class="form-control" required>
                    </div>

                    <div class="mt-3">
                        <label for="organization_id" class="form-label">Организация</label>
                        <select id="organization_id" class="form-select" name="organization_id">
                            <option selected value="0">Без организации</option>
                            @foreach($organizations as $organization)
                                <option value="{{ $organization->id }}" {{ old('organization_id') == $organization->id ? 'selected' : '' }}>{{ $organization->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-3">
                        <label for="image" class="form-label">Фото профиля</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Добавить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
