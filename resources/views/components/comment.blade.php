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
