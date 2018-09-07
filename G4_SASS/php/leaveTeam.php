<?php
session_start();
include("connect_g4.php");

if($_GET["TEAM_NO"] != ''){
$TEAM_NO = $_GET["TEAM_NO"];
$MEM_NO = $_SESSION["MEM_NO"];


$leave = ("DELETE FROM team_mem WHERE team_mem.TEAM_NO = '$TEAM_NO' AND team_mem.MEM_NO ='$MEM_NO'");
$newPost = $pdo->prepare($leave);
$newPost->execute();


    header("Location: ../groupInfo.php?TEAM_NO=$TEAM_NO");
}else{
	echo '';
    }

?>