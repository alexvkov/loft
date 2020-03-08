<?php
require('lib/db.php');
require_once('lib/function.php');
function debug($param){
    echo "<pre>";
    var_dump($param);
    echo "</pre>";
}

$name = htmlspecialchars($_POST['name']) ?? null;
$phone = htmlspecialchars($_POST['phone']) ?? null;
$email = htmlspecialchars($_POST['email']) ?? null;
$street = htmlspecialchars($_POST['street']) ?? null;
$home = htmlspecialchars($_POST['home']) ?? null;
$structure = htmlspecialchars($_POST['structure']) ?? null;
$flat = htmlspecialchars($_POST['flat']) ?? null;
$floor = htmlspecialchars($_POST['floor']) ?? null;
$comment = htmlspecialchars($_POST['comment']) ?? null;
$call = htmlspecialchars($_POST['call']) ?? null;
$payment = htmlspecialchars($_POST['payment']) ?? null;


$patime = date('H-i');
$pathname = $patime . '.txt';

$query = $db->prepare("select user.email, user.id from user where user.email ='$email'");
$query->execute();
$userId = $db->lastInsertId();

if ($userId == 0) {
    $userSend = $db->query("insert into burger.user(email, name, phone) VALUES ('$email','$name','$phone')");
    $userId = $db->lastInsertId();
    $orderSend = $db->query("insert into burger.orders(home, street, structure, flat, floor, comment, payment, bell, user_id)
    values ('$home', '$street', '$structure', '$flat', '$floor', '$comment', '$payment', '$call','$userId')");
    $querys = $db->prepare("select count(*) from user where email ='$email'");
    $querys->execute();
    $count = $querys->fetch(PDO::FETCH_ASSOC);
    if ($count["count(*)"] > 1) {
        $message =
            "Заказ №" . $userId . "
            Ваш заказ будет доставлен по адресу улица " . $street . ", дом " . $home . "
            Заказ DarkBeefBurger за 500 рублей, 1 шт
            Спасибо - это ваш " . $count["count(*)"] . " заказ";
    } else {
        $message =
            'Заказ №' . $userId . '
            Ваш заказ будет доставлен по адресу улица ' . $street . ', дом ' . $home . '
            Заказ DarkBeefBurger за 500 рублей, 1 шт
            Спасибо - это ваш первый заказ';
    }
    file_put_contents("mail/$pathname", $message);
    echo "one";
} else {
    echo "was not written in to BD";
}