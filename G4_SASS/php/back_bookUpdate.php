<?php
    // connect DB
    require_once("connect_g4.php");

    $sqlBoo = "UPDATE booking SET BOO_STATUS = :BOO_STATUS WHERE BOO_NO = :BOO_NO";
    $boo =  $pdo->prepare($sqlBoo);
    
    $boo->bindValue(':BOO_NO', $_REQUEST["BOO_NO"]);
    $boo->bindValue(':BOO_STATUS', $_REQUEST["BOO_STATUS"]);
    
    $boo->execute();

    echo '<script language="javascript">';
    echo 'alert("更新完成")';
    echo '</script>';

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
?>