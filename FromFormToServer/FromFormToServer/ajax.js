$(document).ready(function () {

    $("#btnSubmit").click(function () {
        $.ajax({
            method: "POST",
            url: 'server.php',
            dataType: "html",
            data: {
                login = 'login',
                password = ['password']
            }, 
            cache: false,
            success:
                function (data) {
                    alert(data);  //as a debugging message.
                }
        });
        return false;
    });
});

// $(document).ready(function () {
//     $("#btnSubmit").click(
//         function () {
//             sendAjaxForm('ajax_form', 'server.php');
//             return false;
//         }
//     );
// });

// function sendAjaxForm(ajax_form, url) {
//     $.ajax({
//         url: url, //url страницы (server.php)
//         type: "POST", //метод отправки
//         dataType: "html", //формат данных 
//         data: $("#" + ajax_form).serialize(),  // Выбираем форму ajax_form и собираем данные оттуда
         //элемент формы должен содержать атрибут name
//             success: function (data) {
//             alert(data);  //as a debugging message.
//         }
//     });
// }