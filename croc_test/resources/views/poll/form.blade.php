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
                        <a href="{{ Route('pollsList') }}">Список опросов</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        @if (isset($poll)) Редактирование опроса @else Создание опроса @endif
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h1 class="heading-title">@if (isset($poll)) Редактирование опроса @else Создание нового опроса @endif</h1>
            @if (count($groups) == 0)
                <div class="alert alert-danger">Не найдены группы для определения принадлежности путём опроса. Вы можете <a href="{{ route('groupCreate') }}">создать</a> новую группу и вернуться сюда.</div>
            @else
            <form method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="id" @if (isset($poll->id)) value="{{ $poll->id }}" @endif>
                <div class="form-group">
                    <label for="inputTitle">Заголовок</label>
                    <input type="text" name="title" @if (isset($poll->title)) value="{{ $poll->title }}" @endif class="form-control" id="inputTitle" aria-describedby="titleHelp" placeholder="Укажите название опроса">
                    <small id="titleHelp" class="form-text text-muted">Он будет показан в списке опросов.</small>
                </div>
                <div class="form-group">
                    <label for="inputDescription">Текст-описание опроса</label>
                    <textarea class="form-control" name="description" id="inputDescription" rows="3">@if (isset($poll->description)) {{ $poll->description }}@endif</textarea>
                </div>
                <div class="form-group">
                    <label for="inputGroups">Группы для опроса</label>
                    <select name="groups[]" id="inputGroups" multiple class="form-control">
                        @foreach ($groups as $group)
                            <option value="{{ $group->id }}" @if (isset($poll) && $poll->groups->contains($group)) selected="selected" @endif>{{ $group->title }}</option>
                        @endforeach
                    </select>
                    <small id="groupsHelp" class="form-text text-muted">Укажите принадлежность к каким группам будет определять опрос (можно несколько).</small>
                </div>
                <button type="submit" class="btn btn-primary">@if (isset($poll)) Сохранить @else Создать @endif</button>
            </form>
            @endif
        </div>
    </div>

@endsection
