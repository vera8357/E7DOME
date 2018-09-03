<?php
ob_start();
session_start();
require_once('connect_g4.php');
$no = $_GET['no'];
$sql = "select * from pointcard where CARD_NO = '$no'";             
    $query = $pdo->query($sql);
    $row = $query->fetch(PDO::FETCH_ASSOC);
    echo $row['CARD_NAME'];
    echo $row['CARD_PRICE'];
    echo $row['CARD_POINTS'];
?>