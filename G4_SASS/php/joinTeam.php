<?php
session_start();
include("connect_g4.php");

if($_GET["TEAM_NO"] != ''){
$TEAM_NO = $_GET["TEAM_NO"];
$MEM_NO = $_SESSION["MEM_NO"];


$join = ("INSERT INTO team_mem (TEAM_MEM_NO, TEAM_NO, MEM_NO)
			VALUES (null, '$TEAM_NO', '$MEM_NO')");
$joinGroup = $pdo->prepare($join);
$joinGroup->execute();


    header("Location: ../groupInfo.php?TEAM_NO=$TEAM_NO");
}else{
	echo '';
    }

?>



