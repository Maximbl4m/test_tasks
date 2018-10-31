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
                    Croc test App
                </div>
                <div class="task-description m-t-sm m-b-md">
                    <p>
                        Заказчику требуется сервис для определения профессии или социальной группы пользователей.
                    </p>
                    <p>
                        Для выполнения этой задачи пользователю должна быть предоставлена возможность пройти опрос с заранее составленными ответами. В каждом из вопросов можно выбрать только один ответ.
                    </p>
                    <p>
                        Результат прохождения опроса — вероятность (в процентах), с которой пользователя можно отнести к профессии или к социальной группе. Процент должен вычисляться с использованием алгоритма, который неким образом должен оценивать выбранные ответы.
                    </p>
                </div>

                <div class="links">
                    <a href="{{ Route('groupsList') }}">Список групп</a>
                    <a href="{{ Route('pollsList') }}">Список опросов</a>
                    <a href="#">Описание логики</a>
                    <a href="https://github.com/Maximbl4m/test_tasks" target="_blank">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html>
