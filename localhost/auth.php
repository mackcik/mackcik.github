<?php
 $login = filter_var(trim($_POST['login']),
 FILTER_SANITIZE_STRING);
 $pass = filter_var(trim($_POST['pass']),
 FILTER_SANITIZE_STRING);

 $pass = md5($pass."fghjkfhmft675bn");

 $mysql = new mysqli('127.0.0.1','root','','blog2.1');
 
$result = $mysql->query("SELECT * FROM `user` WHERE `login` = '$login' AND `pass` = '$pass' ");
$user = $result->fetch_assoc();
if(count($user) == 0) {
    echo "User is not found";
    exit();
}

setcookie('user', $user['name'], time()+ 3600, "/");

 $mysql->close();

 header('Location: /');
 exit();
?>