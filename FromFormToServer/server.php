<?php

// Открываем новое соединение с  MySQL сервером
$connect = new mysqli('localhost','root','','fromform');

if ($connect->connect_error) {
    die('Error : ('. $connect->connect_errno .') '. $connect->connect_error);
}
else{
    echo "Подключились к БД успешно!";
}

$results = $connect->query("SELECT id, login, password FROM auth");

$login = $_POST['login'];
$password = $_POST['password'];

$query = "INSERT INTO auth (login, password) VALUES(?, ?)";
$statement = $connect->prepare($query);

$statement->bind_param('ss', $login, $password);

if($statement->execute()){
    print 'Success! ID of last inserted record is : ' .$statement->insert_id .'<br />';
}else{
    die('Error : ('. $connect->errno .') '. $connect->error);
}

print '<table border="3">'; // Это для печати в виде таблицы а не тупо строки одной
while($row = $results->fetch_assoc()) {
    print '<tr>';
    print '<td>'.$row["id"].'</td>';
    print '<td>'.$row["login"].'</td>';
    print '<td>'.$row["password"].'</td>';
    print '</tr>';
}
print '</table>';

// Frees the memory associated with a result

$results->free();

// close connection
$connect->close();
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>



    