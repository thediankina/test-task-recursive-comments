@extends('layout')

@section('title', 'Comments')

@section('main')
    <div class="container">
        <!-- Блок формы для отправки комментария -->
        @include('components.form')
        <!-- Блок уведомления -->
        <div class="alert"></div>
        <!-- Блок ленты комментариев -->
        <div id="comments">
            @foreach($comments as $comment)
                <x-comment id="{{ $comment->id }}"></x-comment>
            @endforeach
        </div>
    </div>
@endsection
