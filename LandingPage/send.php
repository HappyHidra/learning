 <?php
//$first_name = $_POST['first_name'];
//$telephone = $_POST['telephone'];
//$first_name = htmlspecialchars($first_name);
//$telephone = htmlspecialchars($telephone);
//$first_name = urldecode($telephone);
//$telephone = urldecode($telephone);
//$first_name = trim($first_name);
//$telephone = trim($telephone);
//mail("okmmiha@gmail.com", "Заявка с сайта", "ФИО:".$first_name.". Телефон: ".$telephone ,"From: okmmiha@gmail.com \r\n");

if (isset($_POST["first_name"]) && isset($_POST["telephone"]) ) { 

	// Формируем массив для JSON ответа
    $result = array( //Если хотим передать в code.js то, что ввёл пользователь
    	'first_name' => $_POST["first_name"],
    	'telephone' => $_POST["telephone"]
    ); 
    $first_name = $_POST['first_name'];
    $telephone = $_POST['telephone'];
    mail("okmmiha@gmail.com", "Заявка с сайта", "ФИО:".$first_name.". Телефон: ".$telephone ,"From: okmmiha@gmail.com \r\n");
    // Переводим массив в JSON
    echo json_encode($result); 
}

?>