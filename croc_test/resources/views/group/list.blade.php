@extends('layouts.app')
@section('content')
    <div class="row mt-3">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/">Главная</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Список групп
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col">
            @if (count($groups) == 0)
                <div class="alert alert-danger">Не найдены группы для определения принадлежности путём опроса. Вы можете <a href="{{ route('groupCreate') }}">создать</a> новую группу и вернуться сюда.</div>
            @else
                <h1 class="heading-title">Список всех групп</h1>
                <a href="{{ route('groupCreate') }}" class="btn btn-primary mb-3">Добавить группу</a>
                <div class="table-responsive">
                    <table class="table table-dark">
                        <thead>
                        <tr>
                            <th style="width: 250px;">Название</th>
                            <th>Описание</th>
                            <th style="width: 300px">Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($groups as $group)
                            <tr>
                                <td>{{ $group->title }}</td>
                                <td>{!! StringHelper::truncate($group->description, 400) !!}</td>
                                <td>
                                    <a href="/group/edit/{{ $group->id }}" class="btn btn-warning">Редактировать</a>
                                    <a href="/group/delete/{{ $group->id }}" class="btn btn-danger">Удалить</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection
