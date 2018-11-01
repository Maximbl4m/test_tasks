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
                        Прохождение опроса {{ $poll->title }}
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h1 class="heading-title">Опрос: {{ $poll->title }}</h1>
            <p class="poll-description">
                {{ $poll->description }}
            </p>
            <hr>
            <form action="" method="POST" id="poll">
                {{ csrf_field() }}
                @foreach ($poll->questions as $question)
                    <div class="question">
                        <h2 class="question-title">
                            {{ $question->text }}
                        </h2>
                        <div class="question-answers">
                            @foreach($question->answer as $answer)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="answer[{{ $question->id }}]" id="answer-{{ $answer->id }}" value="{{ $answer->id }}">
                                    <label class="form-check-label" for="answer-{{ $answer->id }}">
                                        {{ $answer->text }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <hr>
                @endforeach
                <button class="btn btn-primary" id="submit" disabled type="submit">Отправить</button>
            </form>
        </div>
    </div>
    <script>
        $(function () {
            $('input[type="radio"]').on('change', function() {
                var hasChecked = true;
                $(".question-answers").each(function(){
                    if ($(this).find(':has(:radio:checked)').length == 0) {
                        hasChecked = false;
                    }
                });
                if (hasChecked) {
                    $("#submit").prop('disabled', false);
                }
            });
        });
    </script>
@endsection
