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
                        Список доступных опросов
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">С вероятностью {{ $percentage }}% Вы - {{ $groupInfo->title }}</h5>
                    <p class="card-text">{{ $groupInfo->description }}</p>
                    <a href="/" class="btn btn-primary">На главную</a>
                </div>
            </div>
        </div>
    </div>

@endsection