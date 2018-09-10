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


require_once("connect_g4.php");

 $TEAM_NO = $_REQUEST["TEAM_NAME"];
 $TEAM_INFO = $_REQUEST["TEAM_INFO"];
 $TEAM_NO= $_REQUEST['TEAM_NO'];
echo "$TEAM_INFO";
exit;

switch($_FILES['upfile']['error']){
  case UPLOAD_ERR_OK:
    if( file_exists("../images")===false){
    	mkdir("../images");
    }
    $from = $_FILES['upfile']['tmp_name'];
    $fileto =pathinfo($_FILES['upfile']['name']);
    $filext = $fileto['basename'];
    $to = "../images{$filext}";
    $filname = "{$filext}";
    if(copy( $from, $to)){
      $teamfile = "UPDATE team SET TEAM_IMG = '{$filname}',TEAM_NAME = :TEAM_NAME,TEAM_INFO = :TEAM_INFO WHERE TEAM_NO = $TEAM_NO";
      $pdo->exec($teamfile);
      $_GET["TEAM_NO"] = $filname;

      header('location:../php/editgroup.php?TEAM_NO=$TEAM_NO');

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
  //case UPLOAD_ERR_NO_FILE:
  //  echo "echo 未上傳檔案太大<br>";
}

?>

</body>
</html>