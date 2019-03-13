$(document).ready(function () {
    var startFrom = 4;
    $('button#more').click(function () {
        console.log($(window).scrollTop());
        $('.row').fadeIn('slow', 'linear');
        $.ajax({
            url: 'obrabotchik.php',
            method: 'POST',
            data: {"startFrom": startFrom},
            beforeSend: function () {

            }
        }).done(function (data) {
            data = $.parseJSON(data);
            console.log(data);
            if (data.length > 0) {
                $.each(data, function (index, data) {
                    $(".container").append(
                        "<div class='row'>" +
                        "<a href='/test/?id=" + data.id + "' target='_blank' >" +
                        "<img src='" + data.katalog + "' alt=''></a>ID:"
                        + data.id + "<br>Размер изображения:"
                        + data.size_img + "<br>Формат:"
                        + data.type_img + "<br>Просмотров:"
                        + data.views + "<br></div>");
                });
                // Увеличиваем на 4 порядковый номер статьи, с которой надо начинать выборку из базы
                startFrom += 4;
            }
        });
    });
    $('#table').DataTable({
        "order": [[ 4, "desc" ]]
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