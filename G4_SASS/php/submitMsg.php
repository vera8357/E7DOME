
<?php
session_start();
include("connect_g4.php");

if($_GET["MSG_INFO"]){

$TEAM_NO = $_REQUEST["TEAM_NO"];
$MEM_NO = $_SESSION["MEM_NO"];
$MSG_INFO = $_GET["MSG_INFO"];
$MSG_DATE = date("Y-m-d H:i:s ");

$newPost = ("INSERT INTO team_msg (MSG_NO, TEAM_NO, MEM_NO, MSG_INFO, MSG_DATE)
VALUES (null, '$TEAM_NO', '$MEM_NO',  '$MSG_INFO', '$MSG_DATE')");
$newPost = $pdo->prepare($newPost);
$newPost->execute();


    header("Location: ../groupInfo.php?TEAM_NO=$TEAM_NO");
}else{
	echo '';
    }

?>
