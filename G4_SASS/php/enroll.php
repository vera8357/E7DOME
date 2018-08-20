<?php
ob_start();
session_start();

try{
  require_once("connect_g4.php");
  $sql = "insert into member (MEM_NO, MEM_ID, MEM_PSW, MEM_NAME, MEM_IMG, MEM_PHONE, MEM_POINTS, MEM_STATUS) VALUES ( null, :MEM_ID, :MEM_PSW, :MEM_NAME, 'pic.jpg', :MEM_PHONE, '5000', '1' )";
  $member = $pdo->prepare( $sql );
  $member->bindValue(":MEM_ID", $_REQUEST["enroll_id"]);
  $member->bindValue(":MEM_PSW", $_REQUEST["enroll_psw1"]);
  $member->bindValue(":MEM_NAME", $_REQUEST["enroll_name"]);
  $member->bindValue(":MEM_PHONE", $_REQUEST["enroll_tel"]);
  $member->execute();
  $MEM_NO = $pdo->lastInsertId();

  // 抓MEM_NAME POINTS ID PSW SESSION
 	// 註冊成功發送註冊完成訊息 跳轉刮刮樂頁面


  $sql = "select * from member where MEM_ID = :MEM_ID and MEM_PSW = :MEM_PSW";
  $member = $pdo->prepare($sql);
  $member -> bindValue(":MEM_ID",$_REQUEST["enroll_id"]);
  $member -> bindValue(":MEM_PSW",$_REQUEST["enroll_psw1"]);
  $member -> execute();

  if( $member->rowCount() !=0 ){
      $memRow = $member->fetch(PDO::FETCH_ASSOC);
  
        //將登入資訊寫入session
      $_SESSION["MEM_NO"] = $memRow["MEM_NO"];
      $_SESSION["MEM_ID"] = $memRow["MEM_ID"];
      $_SESSION["MEM_PSW"] = $memRow["MEM_PSW"];
      $_SESSION["MEM_NAME"] = $memRow["MEM_NAME"];
      $_SESSION["MEM_POINTS"] = $memRow["MEM_POINTS"];
       $_SESSION["MEM_PHONE"] = $memRow["MEM_PHONE"];
        $_SESSION["MEM_IMG"] = $memRow["MEM_IMG"];
    echo "<a href='memberinfo.php'>會員專區</a> ";
  }else{
    echo "註冊失敗";
  }


     // $_SESSION['MEM_ID'] = $member['MEM_ID'];
     // $_SESSION['MEM_PSW'] = $member['MEM_PSW'];
     // $_SESSION['MEM_NAME'] = $member['MEM_NAME'];
     // $_SESSION['MEM_POINTS'] = $member['MEM_POINTS'];


}catch(PDOException $e){
  echo $e->getMessage();
}




// 參考老師檔案cartToDb.php
?>