<div class="comment">
    <div class="header">
        {{ $comment['author'] }}&nbsp;
        <div class="time">
            @if($comment['created_at'] < $comment['updated_at'])
                <div>updated {{ App\Models\Comment::reformat($comment['updated_at']) }}</div>
            @else
                <div>created {{ App\Models\Comment::reformat($comment['created_at']) }}</div>
            @endif
        </div>
    </div>
    <div class="content">{{ $comment['content'] }}</div>
    <div class="toolbar">
        <!-- <div class="edit"><img src="{{ asset("images/edit.svg") }}"></div> -->
        <button class="reply" onclick="render()"><img src="{{ asset("images/reply.svg") }}"></button>
    </div>
</div>
