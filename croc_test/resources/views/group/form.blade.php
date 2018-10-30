@extends('layouts.app')
@section('content')
    <div class="row mt-lg-3">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/">Главная</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ Route('groupsList') }}">Список групп</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        @if (isset($group)) Редактирование группы @else Создание группы @endif
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h1 class="heading-title">@if (isset($group)) Редактирование группы респондентов @else Создание новой группы @endif</h1>
            <form method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="group_id" @if (isset($group)) value="{{ $group->id }}" @endif>
                <div class="form-group">
                    <label for="inputTitle">Заголовок</label>
                    <input type="text" class="form-control" name="title" @if (isset($group)) value="{{ $group->title }}" @endif id="inputTitle" aria-describedby="titleHelp" placeholder="Укажите название группы">
                    <small id="titleHelp" class="form-text text-muted">Он будет показан в списке групп.</small>
                </div>
                <div class="form-group">
                    <label for="inputDescription">Текст-описание группы</label>
                    <textarea class="form-control" name="description" id="inputDescription" rows="3">@if (isset($group)){{ $group->description }}@endif</textarea>
                </div>
                <button type="submit" class="btn btn-primary">@if (isset($group)) Сохранить @else Добавить @endif</button>
            </form>
        </div>
    </div>

@endsection
