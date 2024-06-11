@extends('admin.layouts.index')
@php
    $module = 'users';
    $title = 'Пользователи';
@endphp
@section('title', $title)

@section('content')
    @include('admin.layouts.components.messages')
    <div class="card">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="card-header">{{ $title }}</h5>
            @if(Auth::user()->role == 1)
                <div style="padding-right: 1.25rem;">
                    <a class="btn btn-primary" href="{{ route($module . '.create') }}">Добавить</a>
                </div>
            @endif
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover mb-2">
                <thead>
                <tr>
                    <th style="width:6%">№</th>
                    <th style="width: 0%">Фото</th>
                    <th>Название</th>
                    @if(Auth::user()->role == 1)
                        <th class="text-right">Действия</th>
                    @endif
                </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                @foreach($records as $key => $record)
                    <tr>
                        <td>{{ $records->firstItem() + $key }}</td>
                        <td>
                            <div>
                                <img src="{{ $record->image_path ? $record->image_path : asset('assets/img/no-image.png') }}"
                                     alt="{{ $record->image_path ? '' : 'Default Image' }}" class="img-fluid rounded-circle"
                                     style="min-width: 50px; height: 50px;object-fit: cover">
                            </div>
                        </td>
                        <td>
                            <a class="td-title" href="{{ route($module . '.show', $record->id) }}">
                                <span class="fw-medium">{{ $record->name }} {{ $record->surname }}</span>
                            </a>
                        </td>
                            @if(Auth::user()->role == 1)
                                <td class="text-right">
                                    @include('admin.layouts.components.actions')
                                </td>
                            @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        @include('admin.layouts.components.pagination')
    </div>
@endsection
