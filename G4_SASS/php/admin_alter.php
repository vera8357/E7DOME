<?php

try{
	require_once("connect_g4.php");
	$sql ="UPDATE admin SET ADMIN_PERM = :ADMIN_PERM , ADMIN_STATUS = :ADMIN_STATUS WHERE ADMIN_NO = :ADMIN_NO";
	 $update_admin = $pdo->prepare($sql);
	 $update_admin->bindValue(":ADMIN_PERM",$_REQUEST["mem_perm"]);
	 $update_admin->bindValue(":ADMIN_STATUS",$_REQUEST["mem_status"]);
	 $update_admin->bindValue(":ADMIN_NO",$_REQUEST["admin_no"]);
	 $update_admin->execute();

	header("location:../back_admin.php");
	


}catch(PDOException $e){
	echo $e->getMassage();
}


?>