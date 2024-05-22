@extends('layouts.index')
@section('title', 'Редактирование события')
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
    <div class="col">
        <div class="card mb-4">
            <h5 class="card-header">Редактирование события</h5>
            <div class="card-body">
                <form action="{{ route('events.update', $record->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')@csrf
                    <div class="mt-3">
                        <button class="btn btn btn-outline-secondary dropdown-toggle me-1 w-px-200" type="button" data-bs-toggle="collapse" data-bs-target="#contentTj" aria-expanded="true">
                            Таджикский
                        </button>
                        <div class="collapse" id="contentTj">
                            <div class="mt-3">
                                <label for="defaultFormControlInput" class="form-label">Название(Tj)</label>
                                <input value="{{ $record->titleTj }}" type="text" name="titleTj" class="form-control" placeholder="Название(Tj)">
                            </div>
                            <div class="mt-3">
                                <label for="defaultFormControlInput" class="form-label">Описание(Tj)</label>
                                <textarea class="form-control" rows="3" name="descriptionTj" placeholder="Описание(Tj)">{{ $record->descriptionTj }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button class="btn btn btn-outline-secondary dropdown-toggle me-1 w-px-200" type="button" data-bs-toggle="collapse" data-bs-target="#contentRu" aria-expanded="true">
                            Русский
                        </button>
                        <div class="collapse" id="contentRu">
                            <div class="mt-3">
                                <label for="defaultFormControlInput" class="form-label">Название(Ru)</label>
                                <input value="{{ $record->titleRu }}" type="text" name="titleRu" class="form-control" placeholder="Название(Ru)">
                            </div>
                            <div class="mt-3">
                                <label for="defaultFormControlInput" class="form-label">Описание(Ru)</label>
                                <textarea class="form-control" rows="3" name="descriptionRu" placeholder="Описание(Ru)">{{ $record->descriptionRu }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button class="btn btn btn-outline-secondary dropdown-toggle me-1 w-px-200" type="button" data-bs-toggle="collapse" data-bs-target="#contentEn" aria-expanded="true">
                            Английский
                        </button>
                        <div class="collapse" id="contentEn">
                            <div class="mt-3">
                                <label for="defaultFormControlInput" class="form-label">Название(En)</label>
                                <input value="{{ $record->titleEn }}" type="text" name="titleEn" class="form-control" placeholder="Название(En)">
                            </div>
                            <div class="mt-3">
                                <label for="defaultFormControlInput" class="form-label">Описание(En)</label>
                                <textarea class="form-control" rows="3" name="descriptionEn" placeholder="Описание(En)">{{ $record->descriptionEn }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3">
                        <label for="defaultFormControlInput" class="form-label">Время</label>
                        <input value="{{ \Carbon\Carbon::parse($record->time)->format('Y-m-d') }}" type="date" name="time" class="form-control">
                    </div>
                    <div class="mt-3">
                        <label for="defaultFormControlInput" class="form-label">Изображение <a href="{{ $record->imagePath }}">{{ $record->imagePath }}</a></label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="mt-3">
                        <div class="form-check form-check-inline">
                            <label for="isPublished" class="form-label">Опубликовать?</label>
                            <input type="hidden" name="isPublished" value="0">
                            <input type="checkbox" id="isPublished" name="isPublished" value="1" class="form-check-input" @if($record->isPublished == 1) checked @endif>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3 mr-1">Сохранить</button>
                    <button data-bs-toggle="modal" data-bs-target="#modalCenter" class="btn btn-danger mt-3" type="button">
                        Удалить
                    </button>
                </form>
                <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                    <form action="{{ route('events.destroy', $record->id) }}" method="POST">
                        @method('DELETE') @csrf
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalCenterTitle{{ $record->id }}">Вы уверены что, хотите удалить?</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Отмена</button>
                                    <button type="submit" class="btn btn-danger">Удалить</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
