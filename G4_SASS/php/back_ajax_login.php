<?php
ob_start();
session_start();

try{

	require_once("connect_g4.php");
	$sql ="select * from admin where ADMIN_ID = :ADMIN_ID and ADMIM_PSW = :ADMIM_PSW";
	$admin = $pdo->prepare($sql);
	$admin->bindValue(":ADMIN_ID", $_REQUEST["admin_id"]);
	$admin->bindValue(":ADMIN_PSW", $_REQUEST["admin_psw"]);
	$admin->execute();

	if($admin->rowCount() ==0){
		echo "帳號密碼錯誤";
	}else{
		$adminRow = $admin->fetch(PDO::FETCH_ASSOC);
		$_SESSION['ADMIN_ID'] = $adminRow['ADMIN_ID'];
		$_SESSION['ADMIN_PERM'] = $adminRow['ADMIN_PERM'];
		
		echo $_SESSION['ADMIN_ID'];
	}

}catch(PDOException $e){


	echo $e->getMessage();
}





?>