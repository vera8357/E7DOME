<?php
ob_start();
session_start();


try{
  require_once("connect_g4.php");
  $sql = "select * from admin where ADMIN_ID = :ADMIN_ID and ADMIN_PSW = :ADMIN_PSW ";
  $member = $pdo->prepare( $sql );
  $member->bindValue(":ADMIN_ID", $_REQUEST["admin_id"]);
  $member->bindValue(":ADMIN_PSW", $_REQUEST["admin_psw"]);
  $member->execute();
  
  if( $member->rowCount()==0){ //查無此人
	  echo "帳號密碼錯誤";
  }else{ //登入成功
    //自資料庫中取回資料
  	$memRow = $member->fetch(PDO::FETCH_ASSOC);
  
  	$_SESSION["ADMIN_ID"] = $memRow["ADMIN_ID"];
    $_SESSION["ADMIN_PRRM"] = $memRow["ADMIN_PERM"];
   
  
    //送出登入者的姓名資料
    echo $_SESSION["ADMIN_ID"];
  }
}catch(PDOException $e){
  echo $e->getMessage();
}



?>