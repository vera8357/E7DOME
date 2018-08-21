<?php
ob_start();
session_start();

try{
	require_once("connect_g4.php");
	$sql = "UPDATE member SET MEM_PHONE = :MEM_PHONE WHERE MEM_NO = :MEM_NO";
	   $member_phone = $pdo->prepare( $sql );
  	$member_phone->bindValue(":MEM_PHONE", $_REQUEST["change_tel"]);
  	$member_phone->bindValue(":MEM_NO", $_REQUEST["MEM_NO"]);
  	$member_phone->execute();

  	if($member_phone->rowCount()==0){
  		echo "請通知服務人員";
  	}else{
   

     echo $_SESSION["MEM_PHONE"];
     
   


      
  	}


}catch(PDOException $e){
	echo $e->getMessage();
}


?>