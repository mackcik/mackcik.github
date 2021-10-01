<?php
 $login = filter_var(trim($_POST['login']),
 FILTER_SANITIZE_STRING);
 $name = filter_var(trim($_POST['name']),
 FILTER_SANITIZE_STRING);
 $pass = filter_var(trim($_POST['pass']),
 FILTER_SANITIZE_STRING);

 if(mb_strlen($login) < 5 || mb_strlen($login) > 90 ){
     echo "Недопустимая длина логина(от 5 до 90)";
    exit();
 }if(mb_strlen($name) < 3 || mb_strlen($name) > 50 ){
    echo "Недопустимая длина имени(от 3 до 50)";
   exit();
}if(mb_strlen($pass) < 6 || mb_strlen($pass) > 30 ){
    echo "Недопустимая длина порля(от 6 до 30)";
   exit();
}

$pass = md5($pass."fghjkfhmft675bn");

$mysql = new mysqli('127.0.0.1','root','','blog2.1');
$mysql->query("INSERT INTO `user`(`login`, `pass`, `name`) 
VALUES('$login', '$pass', '$name')");

$mysql->close();

header('Location: /');
exit();
?>