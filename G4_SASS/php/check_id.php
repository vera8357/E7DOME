<?php
try{
  require_once("connect_g4.php");
  $member = $pdo->prepare("select MEM_ID from member where MEM_ID=:MEM_ID");
  $member->bindValue(":MEM_ID", $_REQUEST["enroll_id"]);
  $member->execute(); 
  if( $member->rowCount() === 0){
    echo "帳號可使用";
  }else{ //找得到
  	echo "帳號已存在";
  }

}catch(PDOException $e){
  echo $e->getMessage();

}
?>