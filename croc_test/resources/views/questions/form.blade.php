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
                        <a href="/poll/{{ $poll->id }}/questions">Список вопросов</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        @if (isset($question)) Редактирование вопроса @else Создание вопроса @endif
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h1 class="heading-title">@if (isset($question)) Редактирование опроса @else Создание нового опроса @endif</h1>
            <form method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="id" @if (isset($question->id)) value="{{ $question->id }}" @endif>
                <div class="form-group">
                    <label for="inputDescription">Текст вопроса</label>
                    <textarea class="form-control" name="description" id="inputDescription" rows="3">@if (isset($question->text)) {{ $question->text }}@endif</textarea>
                </div>
                <div class="alert alert-info">Для определения соответствия пользователя к социальной группе или профессии напротив каждого вопроса следует поставить "вес" для каждой из выбранных в опросе групп.</div>
                <div class="highlight">
                    <h3>Варианты ответов</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th colspan="2" style="min-width: 50%">
                                    Ответ
                                </th>
                                @foreach ($poll->groups as $group)
                                    <th style="width: 10%">
                                        {{ $group->title }}
                                    </th>
                                @endforeach
                            </tr>
                            </thead>
                            <tbody id="answerTable">

                            </tbody>
                        </table>
                    </div>
                    <div id="answerList"></div>
                    <span class="btn btn-primary" id="addAnswer">Добавить вариант ответа</span>
                </div>
                <button type="submit" class="btn btn-primary">@if (isset($question)) Сохранить @else Создать @endif</button>
            </form>
        </div>
    </div>
    <script defer>
        $(function() {
            $("#addAnswer").on('click', (e) => {
                var html = '';
                html += '<tr>';
                html += '<td style="width: 15%">Ответ №1</td>';
                html += '<td><input class="form-control" placeholder="Вариант ответа"></td>';
                @foreach ($poll->groups as $group)
                    html += '<td><input class="answer-weight form-control" placeholder="Вес"></td>';
                @endforeach
                html += '</tr>';
                $("#answerTable").append(html);
            })
        })
    </script>
@endsection
