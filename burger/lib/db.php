<?php
$user_db = "admin_burger";
$pass_db = "burger2020$";
$db = new PDO('mysql:host=localhost;dbname=burger', $user_db, $pass_db);

$db->query("SET CHARACTER SET utf8");