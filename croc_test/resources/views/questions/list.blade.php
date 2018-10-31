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
            @if (count($questions) == 0)
                <div class="alert alert-danger">У данного опроса нет вариантов ответов. Вы можете <a href="/poll/{{ $poll->id }}/questions/create">добавить</a> вопросы.</div>
            @else
                <h1 class="heading-title">Список всех вопросов к опросу <q>{{ $poll->title }}</q></h1>
                <a href="/poll/{{ $poll->id }}/questions/create" class="btn btn-primary mb-3">Добавить вопрос</a>
                <div class="table-responsive">
                    <table class="table table-dark">
                        <thead>
                        <tr>
                            <th>Текст вопроса</th>
                            <th style="width: 150px">Кол-во ответов</th>
                            <th style="width: 300px">Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($questions as $question)
                            <tr>
                                <td>{!! StringHelper::truncate($question->text, 400) !!}</td>
                                <td>
                                    {{ count($question->answers) }}
                                </td>
                                <td>
                                    <a href="/poll/{{ $poll->id }}/questions/edit/{{ $question->id }}" class="btn btn-warning">Редактировать</a>
                                    <a href="/poll/{{ $poll->id }}questions/remove/{{ $question->id }}" class="btn btn-danger">Удалить</a>
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
