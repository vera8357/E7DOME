<?php
    ob_start();
    session_start();
    require_once("connect_g4.php");
    $MEM_NO = $_SESSION["MEM_NO"];
    $MEM_NAME = $_SESSION["MEM_NAME"];

    $BOO_NO=$_POST['BOO_NO'];
    // $BOO_NO = 3;
    $TEAM_NAME=$_POST['TEAM_NAME'];
    $TEAM_INFO=$_POST['TEAM_INFO'];
    $TEAM_MEM=$_POST['TEAM_MEM'];
    // $TEAM_IMG=$_POST['TEAM_IMG'];

    $creat = "insert into team(BOO_NO,MEM_NO,TEAM_NAME,TEAM_INFO,TEAM_MEM,TEAM_IMG,MEM_NAME) VALUES('$BOO_NO','$MEM_NO','$TEAM_NAME','$TEAM_INFO','$TEAM_MEM','null','$MEM_NAME')";
    $pdo->query($creat);



        // 上傳照片
    switch($_FILES['TEAM_IMG']['error']){
        case UPLOAD_ERR_OK:
    if( file_exists("../images/team_pic/")===false){
        mkdir("../images/team_pic/");
    }
    $from = $_FILES['TEAM_IMG']['tmp_name'];
    $fileto =pathinfo($_FILES['TEAM_IMG']['name']);
    $filext = $fileto['basename'];
    $to = "../images/team_pic/{$filext}";
    $filname = "{$filext}";
    if(copy( $from, $to)){
      $memberfile = "UPDATE team SET TEAM_IMG = '{$filname}' WHERE BOO_NO = $BOO_NO";
      $pdo->exec($memberfile);
      $_SESSION["TEAM_IMG"] = $filname;   
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





    $info_no = "select TEAM_NO from team WHERE BOO_NO ='$BOO_NO'";
    $info_no_query =$pdo->query($info_no);
    $row = $info_no_query->fetch(PDO::FETCH_ASSOC);
    
    header('Location: ../groupInfo.php?TEAM_NO='.$row['TEAM_NO']);
?>