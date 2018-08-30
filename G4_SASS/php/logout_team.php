<?php
ob_start();
session_start();

try{

	require_once("connect_g4.php");
	$sql ="DELETE FROM `team_mem` WHERE `team_mem`.`TEAM_NO` = :TEAM_NO AND `team_mem`.`MEM_NO` =".$_SESSION['MEM_NO'];
	$member = $pdo->prepare($sql);
	$member->bindValue(":TEAM_NO",$_REQUEST['TEAM_NO']);
	$member->execute();
header("location:../membergroup.php");

}catch(PDOException $e){

	echo $e->getMessage();
}



?>