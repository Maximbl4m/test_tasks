<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans:300,400,400i,700" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Alegreya Sans', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
            width: 960px;
            margin: 0 auto;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
        .task-description p{
            margin: 5px auto;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-sm">
            Описание логики
        </div>
        <div class="task-description m-t-sm m-b-md">
            <p>
                Логика взаимодействия классов предельно проста.
            </p>
            <p>
                Поскольку для определения профессии и/или социальной группы посетителя мы предлагаем пройти опрос, то нужно в зависимости от ответов пользователя подбирать правильную группу для него.
            </p>
            <p>
                Таким образом нам необходимо наличие для каждого ответа некоего "веса", который делает ответ приближенным более к определённой группе или нескольким группам. Мы можем указывать для этого целые числа. Например один ответ может приближать посетителя сильнее к группе "А", чуть слабее к группе "Б" и никак не приближать к группе "В" (даже наоборот оттакливать)
            </p>
            <p>
                Проанализировав ответы посетителя и просуммировав "веса" каждой группы у каждого ответа мы можем прийти к выводу какая группа для пользователя наиболее значима. И далее остаётся только в процентном соотношении вывести результат и описание группы.
            </p>
            <p>
                В моём случае есть несколько сущностей:
                <ul style="text-align: left">
                <li>
                    <b>Group</b>: Непосредственно группа (или профессия) к которой могут относится опросы, ответы, пользователи.
                </li>
                <li>
                    <b>Poll</b>: Собственно опрос, сущность опроса которая включает в себя ответы
                </li>
                <li>
                    <b>Question</b>: Вопрос, на который пользователю предстоит ответить
                </li>
                <li>
                    <b>Answer</b>: Ответ на вопрос, который может выбрать пользователь
                </li>
                <li>
                    <b>AnswerScore</b>: "Вес" каждого ответа, в зависимости от группы.
                </li>
            </ul>
            </p>
            <p>
                Как же они взаимосвязаны? А легко: Основной класс <b>Group</b>, к группе относятся опросы, а также счета (веса) вариантов ответов. У группы есть название и описание.<br>
                Затем следует Poll, он привязан к нескольим группам, так как мы создаём вопросы и ответы для нескольких групп одновременно. Затем на форме мы указываем "веса" для каждой из групп опроса. У опроса есть название и описание<br>
                После идёт Question, он принадлежит непосредственно к опросу, от него зависят Answer и AnswerScore. У вопроса есть текст и варианты ответа <br>
                Вариант ответа содержит в себе текст варианта ответа, а также веса для группы.<br>
            </p>
            <p>
                Чтобы представить как это устроено - вы можете попробовать создать группу / опрос, а затем пройти их. Также добро пожаловать на мой Github, теперь я буду его заполнять тестовыми заданиями и чем-нибудь полезным ;-)
            </p>
            <div class="links" style="text-align: center;">
                <a href="/" class="btn btn-primary">Вернуться на главную</a>
            </div>
        </div>

        <div class="links">
            <a href="{{ Route('groupsList') }}">Список групп</a>
            <a href="{{ Route('pollsList') }}">Список опросов</a>
            <a href="{{ Route('logicInfo') }}">Описание логики</a>
            <a href="https://github.com/Maximbl4m/test_tasks" target="_blank">GitHub</a>
        </div>
    </div>
</div>
</body>
</html>
