<?php
ob_start();
session_start();

try{
	require_once("connect_g4.php");
	$sql = "UPDATE member SET MEM_PSW = :MEM_PSW WHERE MEM_NO = :MEM_NO";
	   $member_phone = $pdo->prepare( $sql );
  	$member_phone->bindValue(":MEM_PSW", $_REQUEST["new_psw"]);
  	$member_phone->bindValue(":MEM_NO", $_REQUEST["MEM_NO"]);
  	$member_phone->execute();

	 $_SESSION["MEM_PSW"]= $_REQUEST["new_psw"];
  	// $memRow = $member_phone->fetch(PDO::FETCH_ASSOC);
  	// $_SESSION["MEM_NO"] = $memRow["MEM_NO"];
  	// $_SESSION["MEM_ID"] = $memRow["MEM_ID"];
   //  $_SESSION["MEM_PSW"] = $memRow["MEM_PSW"];
  	// $_SESSION["MEM_NAME"] = $memRow["MEM_NAME"];
   //  $_SESSION["MEM_POINTS"] = $memRow["MEM_POINTS"];
   //  $_SESSION["MEM_IMG"] = $memRow["MEM_IMG"];

    
    echo '密碼更新成功';


}catch(PDOException $e){
	echo $e->getMessage();
}


?>