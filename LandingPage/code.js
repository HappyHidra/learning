$( document ).ready(function() {
    $("#btn_submit").click(
		function(){
			sendAjaxForm('result_form', 'ajax_form', 'send.php');
			return false; 
		}
	);
});
 
function sendAjaxForm(result_form, ajax_form, url) {
    $.ajax({
        url:     url, //url страницы (action_ajax_form.php)
        type:     "POST", //метод отправки
        dataType: "html", //формат данных
        data: $("#"+ajax_form).serialize(),  // Сеарилизуем объект
        success: function(response) { //Данные отправлены успешно
        result = $.parseJSON(response); //Если хотим запарсить то, что ввёл пользователь
      //  	$('#result_form').html('Имя: '+result.first_name+'<br>Телефон: '+result.telephone);
        $('#result_form').html('Спасибо '+result.first_name+'. Мы с вами обязательно свяжемся!.');
    	},
    	error: function(response) { // Данные не отправлены
            $('#result_form').html('Ошибка. Данные не отправлены.');
    	}
 	});
}