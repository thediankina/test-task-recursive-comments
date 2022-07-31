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
    <script>
        /* Отобразить форму для отправки комментария */
        function renderForm(id) {
            $.ajax({
                url: "/comment/reply",
                type: "POST",
                dataType: "html",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id,
                },
                success: function (data) {
                    $('#' + id).html(data);
                }
            });

            $('body').click(function (event) {
                if (!$(event.target).closest('div.reply-form').length && !$(event.target).is('div.reply-form')) {
                    $('div.reply-form > *').remove();
                }
            });
        }
    </script>
@endsection
