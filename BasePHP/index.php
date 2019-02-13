<html>
    <head>
    <meta charset = 'utf-8'>
    <title>Вход в гостевую книгу</title>
    </head>
<body>

<!-- <form action = 'index.php' method = 'post'>
     <input type="text" name="login" /><br/>
     <input type="text" name="text" /><br/>
     <input type="submit" value="Добавить" /><br/>
</form>  -->

<?php
//$database_host - хост сервера
//$database_user - пользователь БД
//$database_password - пароль пользователя БД
//$database_name - выбранная БД

//$database_host = "localhost"; 
//$database_user = "root"; 
//$database_password = ""; 
//$database_name = "gb"; 


/////////////////////////////////////////////////////////////////////////// Процедурный стиль подключения,  похож на старый MySQL (не рекомендуется)
//$connect = mysqli_connect($database_host, $database_user, $database_password, $database_name); //Записываем в переменную $connect
//$mysqli =  mysqli_connect('host','username','password','database_name');

//mysqli_query($connect, "SET NAMES utf8"); 
//SET NAMES utf8 используется, когда у вас сервер не настроен на прием данных в вашей кодировке (в данном случае UTF8).
//Тогда ему нужно явно сообщить, что вы будете отправлять данные в кодировке UTF8 и не требуется дополнительная перекодировка данных из latin1 в UTF8 (по умолчанию он ожидает данные именно в latin1).
//Для того, чтобы на сервере для кодировки соединения вместо latin1 установить UTF8 следует в my.cnf секции [mysqld] установить директиву character_set_connection 


////////////////////////////////////////////////////////////////////// Объектно-ориентированный стиль (рекомендуется) новый метод 

// Открываем новое соединение с  MySQL сервером
$connect = new mysqli('localhost','root','','gb');

//Выводим любую ошибку соединения
// if($connect == true) 
// { 
// echo "Подключение прошло успешно!" ; 
// } 
// else 
// { 
// exit("Ошибка подключения к БД!") ; 
// }  

if ($connect->connect_error) {
    die('Error : ('. $connect->connect_errno .') '. $connect->connect_error);
}
else{
    echo "Подключились к БД успешно!";
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//The object operator, ->, is used in object scope to access methods and properties of an object. 
//It’s meaning is to say that what is on the right of the operator is a member of the object instantiated into the variable on the left side of the operator. 
//Instantiated is the key term here. Instantiated - Конкретизированных

// Create a new instance of MyObject into $obj
//$obj = new MyObject();
// Set a property in the $obj object called thisProperty
//$obj->thisProperty = 'Fred';
// Call a method of the $obj object named getProperty
//$obj->getProperty();

//So -> is like the . in Javascript :) 
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//mysqli_query($connect, "create table IF NOT EXISTS reitingpeopl (id int not null AUTO_INCREMENT, name TEXT(100000) not null, emails TEXT(100000) not null, PRIMARY KEY(id) ) DEFAULT CHARACTER SET utf8 ");

// $res = mysqli_query($connect, "select * from comments") ; 
// while($row = mysqli_fetch_assoc($res)) { 
// echo "<div>" ; 
// echo $row[login] . "<br>" ; 
// echo $row[text] ; 
// echo "</div>" ; 
// }  

// Посылаем запрос на содержимое таблицы. Выбор (SELECT) результирующего ряда в виде ассоциативного массива fetch_assoc
//MySqli Select Query 
$results = $connect->query("SELECT id, login, text FROM comments");

// print '<table border="3">'; //Границы таблицы
// while($row = $results->fetch_assoc()) {
//     print '<tr>';
//     print '<td>'.$row["id"].'</td>';
//     print '<td>'.$row["login"].'</td>';
//     print '<td>'.$row["text"].'</td>';
//     print '</tr>';
// }
// print '</table>';
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Посылаем запрос на содержимое таблицы. Вставляем данные в таблицу
//values to be inserted in database table
$login = '"'.$connect->real_escape_string('JA').'"';
$text = '"'.$connect->real_escape_string('Injection').'"';

//MySqli Insert Query
$insert_row = $connect->query("INSERT INTO comments (login, text) VALUES($login, $text)");

if($insert_row){
    print 'Success! ID of last inserted record is : ' .$connect->insert_id .'<br />';
}else{
    die('Error : ('. $connect->errno .') '. $connect->error);
}

//Отрывок ниже вставляет другие значения посредством шаблонов (Prepared Statement).

//values to be inserted in database table
$login = 'IM DA';
$text = 'PREPARED Statement';

$query = "INSERT INTO comments (login, text) VALUES(?, ?)";
$statement = $connect->prepare($query);

//bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
$statement->bind_param('ss', $login, $text);

if($statement->execute()){
    print 'Success! ID of last inserted record is : ' .$statement->insert_id .'<br />';
}else{
    die('Error : ('. $connect->errno .') '. $connect->error);
}
////Печатаем что получилось

$results2 = $connect->query("DELETE FROM comments WHERE mytimestamp > (NOW() - INTERVAL 1 DAY)");

if($results2){
    print 'Success! deleted one day old records';
}else{
    print 'Error : ('. $connect->errno .') '. $connect->error;
}


print '<table border="3">'; // Это для печати в виде таблицы а не тупо строки одной
while($row = $results->fetch_assoc()) {
    print '<tr>';
    print '<td>'.$row["id"].'</td>';
    print '<td>'.$row["login"].'</td>';
    print '<td>'.$row["text"].'</td>';
    print '</tr>';
}
print '</table>';

// Frees the memory associated with a result

//Удаление старых записей  Удалению подвергаются все записи, находящиеся на сервере больше 1 дня; количество дней можно задать самому.
//Добавляем на сервере колонку mytimestamp - ALTER TABLE comments ADD COLUMN (mytimestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP);
//MySqli Delete Query



$results->free();

$statement->close();

// close connection
$connect->close();
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>


</body>
    </html>



    