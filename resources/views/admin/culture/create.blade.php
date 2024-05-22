@extends('layouts.index')
@section('title', 'Добавление события')
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
            <h5 class="card-header">Добавление события</h5>
            <div class="card-body">
                <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="defaultFormControlInput" class="form-label">Название(Tj)</label>
                        <input value="{{ old('titleTj') }}" type="text" name="titleTj" class="form-control" id="defaultFormControlInput" placeholder="Название(Tj)" aria-describedby="defaultFormControlHelp">
                    </div>
                    <div class="mt-3">
                        <label for="defaultFormControlInput" class="form-label">Описание(Tj)</label>
                        <textarea class="form-control" rows="3" name="descriptionTj" placeholder="Описание(Tj)">{{ old('descriptionTj') }}</textarea>
                    </div>
                    <div class="mt-3">
                        <label for="defaultFormControlInput" class="form-label">Название(Ru)</label>
                        <input value="{{ old('titleRu') }}" type="text" name="titleRu" class="form-control" id="defaultFormControlInput" placeholder="Название(Ru)" aria-describedby="defaultFormControlHelp">
                    </div>
                    <div class="mt-3">
                        <label for="defaultFormControlInput" class="form-label">Описание(Ru)</label>
                        <textarea class="form-control" rows="3" name="descriptionRu" placeholder="Описание(Ru)">{{ old('descriptionRu') }}</textarea>
                    </div>
                    <div class="mt-3">
                        <label for="defaultFormControlInput" class="form-label">Название(En)</label>
                        <input value="{{ old('titleEn') }}" type="text" name="titleEn" class="form-control" id="defaultFormControlInput" placeholder="Название(En)" aria-describedby="defaultFormControlHelp">
                    </div>
                    <div class="mt-3">
                        <label for="defaultFormControlInput" class="form-label">Описание(En)</label>
                        <textarea class="form-control" rows="3" name="descriptionEn" placeholder="Описание(En)">{{ old('descriptionEn') }}</textarea>
                    </div>
                    <div class="mt-3">
                        <label for="defaultFormControlInput" class="form-label">Время</label>
                        <input type="date" name="time" class="form-control">
                    </div>
                    <div class="mt-3">
                        <label for="defaultFormControlInput" class="form-label">Изображение</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="mt-3">
                        <label for="isPublished" class="form-label">Опубликовать?</label>
                        <select id="isPublished" class="form-select" name="isPublished">
                            <option value="0">Нет</option>
                            <option value="1">Да</option>
                         </select>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Добавить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
