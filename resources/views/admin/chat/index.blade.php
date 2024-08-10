@extends('admin.layouts.index')
@php
    $module = 'chats';
    $title = 'Чаты';
@endphp
@section('title', $title)

@section('content')
    @include('admin.layouts.components.messages')
    <div class="card">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="card-header">{{ $title }}</h5>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover mb-2">
                <thead>
                <tr>
                    <th style="width:6%">№</th>
                    <th style="width: 0%">Фото</th>
                    <th>Название</th>
                </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                @foreach($records as $key => $record)
                    <tr>
                        <td>{{ $records->firstItem() + $key }}</td>
                        <td>
                            <div>
                                <img src="{{ $record->image_path ? asset($record->image_path) : asset('assets/img/no-image.png') }}"
                                     alt="{{ $record->image_path ? '' : 'Default Image' }}" class="img-fluid rounded-circle"
                                     style="min-width: 50px; height: 50px;object-fit: cover">
                            </div>
                        </td>
                        <td>
                            <a class="td-title" href="{{ route($module . '.show', $record->id) }}">
                                <span class="fw-medium">{{ $record->user->name }} - {{ $record->field->title }}</span>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        @include('admin.layouts.components.pagination')
    </div>
@endsection
