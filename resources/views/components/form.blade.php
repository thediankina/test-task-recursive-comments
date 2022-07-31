<form id="comment-form_{{ $id ?? '0' }}" class="comment-form" action="comment/create" method="post">
    @csrf
    <input type="number" name="parent_id" value="{{ $id ?? null }}" hidden>
    <textarea name="comment" onkeyup="resize(this)" placeholder="Your comment here..." autocomplete="off"></textarea>
    <button type="submit"><img src="{{ asset("images/send.svg") }}"></button>
</form>
<script>
    /* Отправить комментарий с помощью AJAX */
    $('#comment-form_' + {{ $id ?? '0'}}).on('submit', function (event) {
        event.preventDefault();

        if (this.comment.value === '') {
            window.scrollTo({top: 0, behavior: 'smooth'});
        }

        $.ajax({
            url: "/comment/create",
            type: "POST",
            dataType: "html",
            data: {
                "_token": "{{ csrf_token() }}",
                "parent": this.parent_id.value,
                "content": this.comment.value,
            },
            success: function (data) {
                $('#comments').load("/ #comments > *");
                $('div.alert').html(data);
            },
        });
        // Очистить поле комментария
        this.comment.value = '';
    });
</script>
