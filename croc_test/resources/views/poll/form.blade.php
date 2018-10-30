@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col">
            <h1 class="heading-title">Создание нового опроса</h1>
            @if (count($groups) == 0)
                <div class="alert alert-danger">Не найдены группы для определения принадлежности путём опроса. Вы можете <a href="{{ route('groupCreate') }}">создать</a> новую группу и вернуться сюда.</div>
            @else
            <form>
                <div class="form-group">
                    <label for="inputTitle">Заголовок</label>
                    <input type="text" class="form-control" id="inputTitle" aria-describedby="titleHelp" placeholder="Укажите название опроса">
                    <small id="titleHelp" class="form-text text-muted">Он будет показан в списке опросов.</small>
                </div>
                <div class="form-group">
                    <label for="inputDescription">Текст-описание опроса</label>
                    <textarea class="form-control" id="inputDescription" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="inputGroups">Группы для опроса</label>
                    <select name="groups" id="inputGroups" multiple class="form-control">
                        <option value="1">Группа 1</option>
                        <option value="2">Группа 2</option>
                        <option value="3">Группа 3</option>
                    </select>
                    <small id="groupsHelp" class="form-text text-muted">Укажите принадлежность к каким группам будет определять опрос (можно несколько).</small>
                </div>
                <button type="submit" class="btn btn-primary">Создать</button>
            </form>
            @endif
        </div>
    </div>

@endsection
