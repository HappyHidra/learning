<?php
$connect = new mysqli('localhost','root','','fromform');

if ($connect->connect_error) {
    die('Error : ('. $connect->connect_errno .') '. $connect->connect_error);
}
else{
    echo "Подключились к БД успешно!";
}

$results = $connect->query("SELECT id, login, password FROM auth");

$login = $_POST['login']; //Записываем в $login данные из $_POST['login']
$password = $_POST['password'];

$query = "INSERT INTO auth (login, password) VALUES(?, ?)";
$statement = $connect->prepare($query);
$statement->bind_param('ss', $login, $password);

if($statement->execute()){
    print 'Success! ID of last inserted record is : ' .$statement->insert_id .'<br />';
}
else{
    die('Error : ('. $connect->errno .') '. $connect->error);
}

$connect->close();
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>



    