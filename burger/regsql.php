<?php
require('lib/db.php');

$email = htmlspecialchars($_POST['email']);

$query = $db->prepare("select user.email from user where email= '$email'");
$query->execute();
$result = $query->fetch(PDO::FETCH_ASSOC);


if ($result['email']==$email){
    echo "ВЫ уже зарегистрированы";
}else{
    $query = $db->prepare("insert into burger.user(email, name, phone) VALUES ('$email','Новый пользователь','777')");
    $query->execute();
    echo "Вы новый пользователь";
}