<?php
ob_start();
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Examples</title>
</head>
<body>

<?php 

$MEM_NO = $_SESSION["MEM_NO"];
require_once("connect_g4.php");
switch($_FILES['upfile']['error']){
  case UPLOAD_ERR_OK:
    if( file_exists("../images/member_pic/")===false){
    	mkdir("../images/member_pic/");
    }
    $from = $_FILES['upfile']['tmp_name'];
    $fileto =pathinfo($_FILES['upfile']['name']);
    $filext = $fileto['basename'];
    $to = "../images/member_pic/{$filext}";
    $filname = "{$filext}";
    if(copy( $from, $to)){
      $memberfile = "UPDATE member SET MEM_IMG = '{$filname}' WHERE MEM_NO = $MEM_NO";
      $pdo->exec($memberfile);
      $_SESSION["MEM_IMG"] = $filname;   

      header('location:../memberinfo.php');

    }
    break;
  case UPLOAD_ERR_INI_SIZE:
    echo "上傳檔案太大，不得超過", ini_get("upload_max_filesize"),"<br>";
    break;
  case UPLOAD_ERR_FORM_SIZE:
    echo "上傳檔案太大，不得超過",  $_REQUEST["MAX_FILE_SIZE"],"<br>";
    break;
  case UPLOAD_ERR_PARTIAL:
    echo "上傳失敗，請重新上傳檔案<br>";
    break;
  case UPLOAD_ERR_NO_FILE:
    echo "echo 未上傳檔案太大<br>";
}

?>

</body>
</html>