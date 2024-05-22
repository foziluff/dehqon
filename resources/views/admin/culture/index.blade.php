@extends('layouts.index')
@section('title', 'События')

@section('content')
    @if(session('success'))
        <div class="alert alert-success mt-3" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger mt-3" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card">
        <div class="d-flex justify-content-between">
            <h5 class="card-header">События</h5>
            <a class="card-header" href="{{ route('events.create') }}"><i class='bx bx-message-square-add'></i> Добавить</a>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover mb-2">
                <thead>
                <tr>
                    <th style="width:6%">№</th>
                    <th>Название</th>
                    <th class="text-right">Опубликован</th>
                </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                @foreach($records as $key => $record)
                    <tr>
                        <td>{{ $records->firstItem() + $key }}</td>
                        <td>
                            <a class="td-title" href="{{ route('events.edit', $record->id) }}">
                                <span class="fw-medium">{{ $record->titleRu }}</span>
                            </a>
                        </td>
                        <td class="text-right"><span class="fw-medium">@if($record->isPublished == 1) Да @else Нет @endif</span></td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                @if ($records->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link">&laquo;</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $records->previousPageUrl() }}" rel="prev">&laquo;</a>
                    </li>
                @endif

                @for ($i = max(1, $records->currentPage() - 2); $i <= min($records->lastPage(), $records->currentPage() + 2); $i++)
                    <li class="page-item {{ $i == $records->currentPage() ? 'active' : '' }}">
                        <a class="page-link" href="{{ $records->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor

                @if ($records->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $records->nextPageUrl() }}" rel="next">&raquo;</a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <span class="page-link">&raquo;</span>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
@endsection
