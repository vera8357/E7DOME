<?php
ob_start();
session_start();
try{
  require_once("connect_g4.php");
  $sql = "select * from member where MEM_NO = :MEM_NO and MEM_PSW = :MEM_PSW ";
  $member = $pdo->prepare( $sql );
  $member->bindValue(":MEM_NO", $_REQUEST["MEM_NO"]);
  $member->bindValue(":MEM_PSW", $_REQUEST["old_psw"]);
  $member->execute();
  
  if( $member->rowCount()==0){ //查無此人
    echo "密碼錯誤";
  }else{ 
 

    //送出登入者的姓名資料
    echo $_SESSION["MEM_PSW"].'密碼相符';
  }
}catch(PDOException $e){
  echo $e->getMessage();
}
?>