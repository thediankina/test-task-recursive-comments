@extends('layout')

@section('title', 'Comments')

@section('main')
    <form action="comment/create" method="post">
        @csrf
        <textarea name="comment" onkeyup="resize(this)" placeholder="Your comment here..." autocomplete="off"></textarea>
        <button type="submit"><img src="{{ asset("images/send.svg") }}"></button>
    </form>
    <div id="comments">
        @foreach($comments as $comment)
            <x-comment id="{{ $comment->id }}"></x-comment>
        @endforeach
    </div>
    <script>
        $.ajaxSetup({
            cache: false
        });

        $('#comment-form').on('submit', function (event) {
            event.preventDefault();
            let comment = document.getElementsByName('comment');
            let content = comment.value;
            $.ajax({
                url: "/comment/create",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "content": content,
                },
                success: function () {
                    $('#comments').load("/ .comment");
                },
            });
        });
    </script>
@endsection
