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

$TEAM_NO = $_REQUEST["TEAM_NO"];

switch($_FILES['upfile']['error']){
  case UPLOAD_ERR_OK:
<<<<<<< HEAD
    if( file_exists("../images/team_pic/")===false){
    	mkdir("../images/team_pic/");
=======
    if( file_exists("../images/team_pic")===false){
    	mkdir("../images/team_pic");
>>>>>>> upstream/G4-1
    }
    $from = $_FILES['upfile']['tmp_name'];
    $fileto =pathinfo($_FILES['upfile']['name']);
    $filext = $fileto['basename'];
<<<<<<< HEAD
    $to = "../images/team_pic/{$filext}";
=======
    $to = "../images/team_pic{$filext}";
>>>>>>> upstream/G4-1
    $filname = "{$filext}";
    if(copy( $from, $to)){
      $file = "
      UPDATE team
      SET TEAM_IMG = '{$filname}'
      WHERE TEAM_NO = $TEAM_NO";
      $pdo->exec($file);
    }

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

$teamfile =
    "UPDATE team
    SET TEAM_NAME = :TEAM_NAME, TEAM_INFO = :TEAM_INFO, TEAM_MEM = :TEAM_MEM
    WHERE TEAM_NO = :TEAM_NO";
    $teamval = $pdo->prepare( $teamfile );
    $teamval->bindValue(":TEAM_NAME", $_REQUEST["TEAM_NAME"]);
    $teamval->bindValue(":TEAM_INFO", $_REQUEST["TEAM_INFO"]);
    $teamval->bindValue(":TEAM_NO", $_REQUEST["TEAM_NO"]);
    $teamval->bindValue(":TEAM_MEM", $_REQUEST["TEAM_MEM"]);
    $teamval->execute();
    header("location:../groupInfo.php?TEAM_NO= $TEAM_NO");


?>

</body>
</html>