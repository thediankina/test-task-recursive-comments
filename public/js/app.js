/* Сформировать поле комментария по размеру содержимого */
function resize(field) {
    field.style.height = "50px";
    field.style.height = (field.scrollHeight - 20) + "px";
}
