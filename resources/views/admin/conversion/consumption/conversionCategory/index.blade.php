@extends('admin.layouts.index')
@php
    $module = 'conversionCategories';
    $title = 'Категории';
@endphp
@section('title', $title)

@section('content')
    @include('admin.layouts.components.messages')
    <div class="card">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="card-header">{{ $title }}</h5>
            <div style="padding-right: 1.25rem;">
                <a class="btn btn-primary" href="{{ route($module . '.create') }}">Добавить</a>
            </div>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover mb-2">
                <thead>
                <tr>
                    <th style="width:6%">№</th>
                    <th>Название</th>
                    <th class="text-right">Действия</th>
                </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                @foreach($records as $key => $record)
                    <tr>
                        <td>{{ $records->firstItem() + $key }}</td>
                        <td>
                            <a class="td-title" href="{{ route($module . '.show', $record->id) }}">
                                <span class="fw-medium">{{ $record->title }}</span>
                            </a>
                        </td>
                        <td class="text-right">
                            @include('admin.layouts.components.actions')
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        @include('admin.layouts.components.pagination')
    </div>
@endsection
