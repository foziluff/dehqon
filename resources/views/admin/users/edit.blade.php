@extends('admin.layouts.index')
@php
    $module = 'users';
    $title = 'Редактирование пользователя';
@endphp
@section('title', $title)
@section('content')
    @include('admin.layouts.components.messages')
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header">{{ $title }}</h5>
            <div class="card-body">
                <form action="{{ route($module . '.update', $record->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="mt-3 form-control">
                        <div class="mt-3">
                            <div class="image-container">
                                <img src="{{ $record->image_path ? asset($record->image_path) : asset('assets/img/no-image.png') }}"
                                     alt="{{ $record->image_path ? '' : 'Default Image' }}" class="img-fluid"
                                     style="min-width: 50px; height: 50px;object-fit: cover">
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <label for="name" class="form-label">Имя*</label>
                        <input value="{{ $record->name }}" name="name" placeholder="Имя" type="text" class="form-control" required>
                    </div>
                    <div class="mt-3">
                        <label for="surname" class="form-label">Фамилия*</label>
                        <input value="{{ $record->surname }}" name="surname" placeholder="Фамилия" type="text" class="form-control" required>
                    </div>
                    <div class="mt-3">
                        <label for="phone" class="form-label">Телефон*</label>
                        <input value="{{ $record->phone }}" name="phone" placeholder="Телефон" type="text" class="form-control" required>
                    </div>
                    <div class="mt-3">
                        <label for="born_in" class="form-label">Дата рождения*</label>
                        <input value="{{ \Carbon\Carbon::parse($record->born_in)->format('Y-m-d') }}" name="born_in" placeholder="Дата рождения" type="date" class="form-control" required>
                    </div>
                    <div class="mt-3">
                        <label for="password" class="form-label">Пароль</label>
                        <input name="password" placeholder="Пароль" type="password" class="form-control">
                    </div>
                    <div class="mt-3">
                        <label for="gender" class="form-label">Пол*</label>
                        <select name="gender" class="form-control" required>
                            <option value="1" {{ $record->gender == 1 ? 'selected' : '' }}>Мужской</option>
                            <option value="0" {{ $record->gender == 0 ? 'selected' : '' }}>Женский</option>
                        </select>
                    </div>
                    <div class="mt-3">
                        <label for="role" class="form-label">Роль*</label>
                        <select name="role" class="form-control" required>
                            <option value="1" {{ $record->role == 1 ? 'selected' : '' }}>Администратор</option>
                            <option value="2" {{ $record->role == 2 ? 'selected' : '' }}>Агроном</option>
                            <option value="0" {{ $record->role == 0 ? 'selected' : '' }}>Пользователь</option>
                        </select>

                    </div>
                    <div class="mt-3">
                        <label for="currency" class="form-label">Валюта*</label>
                        <input value="{{ $record->currency }}" name="currency" placeholder="Валюта" type="text" class="form-control" required>
                    </div>
                    <div class="mt-3">
                        <label for="organization_id" class="form-label">Организация*</label>
                        <select id="organization_id" class="form-select" name="organization_id" required>
                            <option value="0" {{ old('organization_id', $record->organization_id) == 0 ? 'selected' : '' }}>Без организации</option>
                            @foreach($organizations as $organization)
                                <option value="{{ $organization->id }}" {{ old('organization_id', $record->organization_id) == $organization->id ? 'selected' : '' }}>{{ $organization->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-3">
                        <label for="image" class="form-label">Фото профиля*</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
