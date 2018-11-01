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
            <h1 class="heading-title">@if (isset($question)) Редактирование опроса @else Создание нового вопроса @endif</h1>
            <form method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="id" @if (isset($question->id)) value="{{ $question->id }}" @endif>
                <div class="form-group">
                    <label for="inputDescription">Текст вопроса</label>
                    <textarea class="form-control" name="text" id="inputDescription" rows="3">@if (isset($question->text)) {{ $question->text }}@endif</textarea>
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
                                <th style="width: 10%">Действия</th>
                            </tr>
                            </thead>
                            <tbody id="answerTable">
                            @if (!isset($question) || empty($question->answer))
                                <tr id="noanswers">
                                    <td colspan="{{ count($poll->groups) + 2 }}" class="text-center text-muted">-Нет вариантов ответа-</td>
                                </tr>
                            @else
                                @foreach ($question->answer as $answerNum => $answer)
                                    <tr>
                                        <td>
                                            Ответ №<span class="answer_num"></span>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="answer[{{ $answerNum }}]" placeholder="Вариант ответа" value="{{ $answer->text }}">
                                        </td>
                                        @foreach ($answer->answerScores as $answerScore)
                                            <td style="width: 10%">
                                                <input type="text" class="answer-weight form-control" name="answer_score[{{ $answerNum  }}][{{ $answerScore->group_id }}]" value="{{ $answerScore->score }}" placeholder="Вес">
                                            </td>
                                        @endforeach
                                        <td><span onclick="removeAnswer(this);" class="btn btn-danger">Удалить</span></td>
                                    </tr>
                                @endforeach
                            @endif
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
        $(() => {
            recalcAnswers();
            $("#addAnswer").on('click', (e) => {
                let answerCounter = $("#answerTable tr:not('#noanswers')").length + 1;
                if ($("#answerTable tr:last-child").data('answer-counter')) {
                    answerCounter = parseInt($("#answerTable tr:last-child").data('answerCounter')) + 1;
                }
                console.log(answerCounter);
                let html = '';
                html += '<tr data-answer-counter="' + answerCounter + '">';
                html += '<td style="width: 15%">Ответ №<span class="answer_num"></span></td>';
                html += '<td><input class="form-control" name="answer[' + answerCounter + ']" placeholder="Вариант ответа"></td>';
                @foreach ($poll->groups as $group)
                    html += '<td><input class="answer-weight form-control" name="answer_score[' + answerCounter + '][{{ $group->id }}]" value="0" placeholder="Вес"></td>';
                @endforeach
                html += '<td><span onclick="removeAnswer(this);" class="btn btn-danger">Удалить</span></td>';
                html += '</tr>';
                if ($("#noanswers").length > 0) {
                    $("#noanswers").remove();
                }
                $("#answerTable").append(html);
                recalcAnswers();
            });
        });
        const recalcAnswers = () => {
            let currentAnswer = 0;
            $('#answerTable tr').each(function() {
                currentAnswer++;
                $(this).find('.answer_num').text(currentAnswer);
            });
        };
        const removeAnswer = (element) => {
            $(element).parents('tr').remove();
            recalcAnswers();
        };
    </script>
@endsection
