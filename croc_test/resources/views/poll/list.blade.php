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
                        Список опросов
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col">
            @if (count($polls) == 0)
                <div class="alert alert-danger">Не найдены опросы. Вы можете <a href="{{ route('pollCreate') }}">создать</a> новый опрос и вернуться сюда.</div>
            @else
                <h1 class="heading-title">Список всех опросов</h1>
                <a href="{{ route('groupCreate') }}" class="btn btn-primary mb-3">Новый опрос</a>
                <div class="table-responsive">
                    <table class="table table-dark">
                        <thead>
                        <tr>
                            <th style="width: 250px;">Название</th>
                            <th>Описание</th>
                            <th style="width: 200px">Вопросы</th>
                            <th style="width: 300px">Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($polls as $poll)
                            <tr>
                                <td>{{ $poll->title }}</td>
                                <td>{!! StringHelper::truncate($poll->description, 400) !!}</td>
                                <td>
                                    <a href="/poll/{{ $poll->id }}/questions" class="btn btn-primary">Список вопросов</a>
                                </td>
                                <td>
                                    <a href="/poll/edit/{{ $poll->id }}" class="btn btn-warning">Редактировать</a>
                                    <a href="/poll/delete/{{ $poll->id }}" class="btn btn-danger">Удалить</a>
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
