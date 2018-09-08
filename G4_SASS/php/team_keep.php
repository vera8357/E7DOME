<?php
session_start();
require_once("connect_g4.php");
$team_keep = $_POST['team_keep'];
$team_no = $_POST['team_no'];
$mem_no = $_POST['mem_no'];
if($team_keep==1){
    $sql = " INSERT INTO team_keep(TEAM_NO,MEM_NO) VALUES ('$team_no','$mem_no') ";
    $pdo->exec($sql);
}
else{
    $sql = " DELETE FROM team_keep WHERE TEAM_NO = '$team_no' AND MEM_NO = '$mem_no' ";
    $pdo->exec($sql);
}
header("Location: ../groupInfo.php?TEAM_NO=$team_no");
?>



