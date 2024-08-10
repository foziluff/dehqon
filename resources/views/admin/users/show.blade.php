@extends('admin.layouts.index')
@php
    $module = 'users';
    $title = 'Просмотр пользователя';
@endphp
@section('title', $title)

@section('content')
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header">{{ $title }}</h5>
            <div class="card-body">
                <a href="{{ route('users.fields', $record->id) }}" type="button" class="btn btn-outline-secondary mr-1">Поля</a>
                <a href="{{ route('users.conversions', $record->id) }}" type="button" class="btn btn-outline-secondary mr-1">Переработки</a>
                <a href="{{ route('users.stocks', $record->id) }}" type="button" class="btn btn-outline-secondary mr-1">Склад</a>
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
                    <label for="name" class="form-label">Имя</label>
                    <div class="form-control">{{ $record->name }}</div>
                </div>
                <div class="mt-3">
                    <label for="surname" class="form-label">Фамилия</label>
                    <div class="form-control">{{ $record->surname }}</div>
                </div>
                <div class="mt-3">
                    <label for="phone" class="form-label">Телефон</label>
                    <div class="form-control">{{ $record->phone }}</div>
                </div>
                <div class="mt-3">
                    <label for="born_in" class="form-label">Дата рождения</label>
                    <div class="form-control">{{ $record->born_in }}</div>
                </div>
                <div class="mt-3">
                    <label for="gender" class="form-label">Пол</label>
                    <div class="form-control">
                        {{ $record->gender == 1 ? 'Мужчина' : 'Женщина' }}
                    </div>
                </div>
                @if(Auth::user()->role == 1)
                    <div class="mt-3">
                        <label for="role" class="form-label">Роль</label><div class="form-control">
                            @switch($record->role)
                                @case(1)
                                    Администратор
                                    @break
                                @case(0)
                                    Пользователь
                                    @break
                                @case(2)
                                    Агроном
                                    @break
                            @endswitch
                        </div>
                    </div>
                @endif

                <div class="mt-3">
                    <label for="currency" class="form-label">Органиция</label>
                    <div class="form-control"> {{ optional($record->organization)->title ?? 'Без организации' }}</div>
                </div>
                <div class="mt-3">
                    <label for="currency" class="form-label">Валюта</label>
                    <div class="form-control">{{ $record->currency }}</div>
                </div>
                @if(Auth::user()->role == 1)
                    <a href="{{ route($module . '.edit', $record->id) }}" class="btn btn-primary mt-3">Редактировать</a>
                @endif
            </div>
        </div>
    </div>
@endsection
