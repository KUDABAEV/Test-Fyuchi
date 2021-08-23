<?php

$connect = new  PDO("mysql:host=localhost; fyuchi; charset=utf8",'root','mysql');

function test($value){
    echo '<pre>';
    print_r($value);
    echo '</pre>';
    exit();
}


if (isset($_POST['username'])){
    $username = $_POST['username'];
    $comment = $_POST['comment'];
    $date = date('Y-m-d H:i:s');
    $query = $connect->query("INSERT INTO fyuchi.comments (username, comment, date) VALUES ('$username','$comment',
'$date')");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <title>Future internet agency</title>
</head>
<body>
    <div class="container-fluid">
        <header>
            <div class="row g-0 header1">
                <div class="col-md-6">
                    <p>Телефон: (499) 340-94-71</p>
                    <p>Email: info@future-group.ru</p>
                    <h1>Комментарии</h1>
                </div>
                <div class="col-md-6 ">
                    <img src="image/future.png">
                </div>
            </div>
        </header>
    </div>

    <div class="backcomments">
        <div class="container">
<?
    $comments = $connect->query("SELECT * FROM fyuchi.comments ORDER BY date DESC");
    $comments = $comments->fetchAll(PDO::FETCH_ASSOC);

    foreach ($comments as $comment) {

?>
            <p><strong><?=$comment['username'] . '    ';?></strong><?=' ' . $comment['date']?></p>
            <p><?=$comment['comment']?></p>
<? } ?>
            <img src="image/Savva.png"> <br>
            <?php echo "<br>";?>
            <img src="image/EvDokim.png"><br>
            <?php echo "<br>";?>
            <img src="image/Artemii.png"><br>
            <hr>
            <h2>Оставить комментарий</h2><br>
            <p>Введите имя</p><br>
            <form class="comments" method="post">
                <input type="text" name="username" placeholder="Введите имя" required><br><br>
                <textarea name="comment" id="" cols="30" rows="10" placeholder="Ваш комментарий" required></textarea><br>
                <div class="col-12">
                    <button type="submit" name="goComment" class="btn btn-primary">Отправить</button>
                </div>
            </form>
        </div>
    </div>

    <footer>
        <div class="container">
            <div class="row g-0">
                <div class="col-3">
                    <img src="image/footer.png">
                </div>
                <div class="col-3 contacts">
                    <p><strong>Телефон: (499) 340-94-71</strong></p>
                    <p><strong>Email: <u>info@future-group.ru</u></strong></p>
                    <p><strong>Адрес: <u>115088 Москва, ул. 2-я Машиностроения, д. 7 стр. 1</u></strong></p>
                    <p>© 2010 - 2014 Future. Все права защищены</p>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>