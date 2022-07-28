/* Сформировать поле комментария по размеру содержимого */
function resize(field) {
    field.style.height = "50px";
    field.style.height = (field.scrollHeight - 20) + "px";
}

/* Отправить комментарий с помощью AJAX */
$('#comment-form').on('submit', function (event) {
    event.preventDefault();
    let content = document.getElementsByName('comment');
    $.ajax({
        url: "/comment/create",
        type: "POST",
        data: {
            "_token": "{{ csrf_token() }}",
            "content": content.value,
        },
        success: function () {
            $('#comments').load("/ $comments > *");
        },
    });
});

function render() {
}
