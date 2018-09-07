<?php
ob_start();
session_start();

require_once('connect_g4.php');
$CARD_NO= $_POST['CARD_NO'];
$CARD_PRICE = $_POST['CARD_PRICE'];
$CARD_POINTS = $_POST['CARD_POINTS'];
$MEM_NO = $_SESSION["MEM_NO"];
$addPoints = "UPDATE member SET MEM_POINTS = MEM_POINTS + '$CARD_POINTS' WHERE MEM_NO = '$MEM_NO'";
$pdo->exec($addPoints);
$card_order = "INSERT INTO card_order(CARD_NO,MEM_NO,ORDER_DATETIME,CARD_PRICE,CARD_POINTS) VALUES('$CARD_NO','$MEM_NO',CURDATE(),'$CARD_PRICE','$CARD_POINTS')";
$pdo->exec($card_order);
?>
