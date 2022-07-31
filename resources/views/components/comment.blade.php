<div class="comment">
    <div class="header">
        <div class="author">{{ $comment->author }}</div>
        <div class="time">{{ $comment->modification_time }}</div>
    </div>
    <div class="content">{{ $comment->content }}</div>
    <div class="toolbar">
        <!-- <div class="edit"><img src="{{ asset("images/edit.svg") }}"></div> -->
        <button class="reply" onclick="renderForm({{ $comment->id }})"><img src="{{ asset("images/reply.svg") }}"></button>
    </div>
</div>
<div class="reply-form" id="{{ $comment->id }}"></div>
<div class="replies">
    @foreach($comment->replies as $reply)
        <x-comment id="{{ $reply->id }}"></x-comment>
    @endforeach
</div>
