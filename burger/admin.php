<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        .btn {
            width: 150px;
            display: block;
            padding: 10px;
            margin-bottom: 20px;
            font-size: 17px;
            text-align: center;
            border-radius: 10px;
            background: #000;
            color: #fff;
            text-decoration: none;
        }

        .user_show {
            display: none;
        }
    </style>
</head>
<body>
<?php require('lib/db.php'); ?>
<a href="#" class="btn order"> Все пользователи</a>
<a href="#" class="btn user"> Все заказы</a>
<div class="order__show">
    <?php
    $query = $db->prepare("select * from user");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    echo "<table border='1'>";
    foreach ($result as $key => $value) {
        echo "<tr>";
        foreach ($value as $item){
            echo "<td>$item</td>";
        }
        echo "</tr>";
    }

    echo "</table>";
    ?>

</div>
<div class="user_show">
    <?php
    $query = $db->prepare("select * from orders");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    echo "<table border='1'>";
    foreach ($result as $key => $value) {
        echo "<tr>";
        foreach ($value as $item){
            echo "<td>$item</td>";
        }
        echo "</tr>";
    }

    echo "</table>";
    ?>
</div>
<script
        src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous"></script>
<script>
    $('.user').click(function (e) {
        e.preventDefault();
        $('.order__show').hide();
        $('.user_show').show();
    });
    $('.order').click(function (e) {
        e.preventDefault();
        $('.order__show').show();
        $('.user_show').hide();
    });
</script>
</body>
</html>