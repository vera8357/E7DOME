
<?php
    require_once('php/connect_g4.php');
    $name = $_POST['card_name'];
    $price = $_POST['card_price'];
    $points = $_POST['card_points'];
    $add_card = "insert into pointcard(CARD_NAME,CARD_PRICE,CARD_POINTS) VALUES('$name','$price','$points')";
    $pdo->exec($add_card);    
    header( "location: back_card.php");   
?>