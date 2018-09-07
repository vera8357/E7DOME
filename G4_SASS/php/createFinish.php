<?php
    ob_start();
    session_start();
    require_once("connect_g4.php");
    // $MEM_NO = $_SESSION["MEM_NO"];
    // $MEM_NAME = $_SESSION["MEM_NAME"]
    $MEM_NO = 1;
    $MEM_NAME = '吳慕云';

    // $BOO_NO=$_POST['BOO_NO'];
    $BOO_NO = 3;
    $TEAM_NAME=$_POST['TEAM_NAME'];
    $TEAM_INFO=$_POST['TEAM_INFO'];
    $TEAM_MEM=$_POST['TEAM_MEM'];
    $TEAM_IMG=$_POST['TEAM_IMG'];
    $creat = "insert into team(BOO_NO,MEM_NO,TEAM_NAME,TEAM_INFO,TEAM_MEM,TEAM_IMG,MEM_NAME) VALUES('$BOO_NO','$MEM_NO','$TEAM_NAME','$TEAM_INFO','$TEAM_MEM','$TEAM_IMG','$MEM_NAME')";
    $pdo->exec($creat);

    $info_no = "select TEAM_NO from team WHERE BOO_NO ='$BOO_NO'";
    $info_no_query =$pdo->query($info_no);
    $row = $info_no_query->fetch(PDO::FETCH_ASSOC);
    
    header('Location: groupInfo.php?TEAM_NO='.$row['TEAM_NO']);
?>