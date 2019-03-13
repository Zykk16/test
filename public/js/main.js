$(document).ready(function () {
    $('#table').DataTable({
        "order": [[4, "desc"]]
    });
    $(".validate").validate({
        rules: {
            name: "required",
            email: {
                required: true,
                email: true
            },
            pictures: {
                required: true
            }
        },
        messages: {
            name_author: "Пожалуйста, укажите ваше имя",
            email: {
                required: "Нам нужен ваш адрес электронной почты, чтобы связаться с вами",
                email: "Ваш электронный адрес должен быть в формате name@domain.com"
            },
            pictures: {
                required: 'Выберите файл',
            }
        }
    });


});