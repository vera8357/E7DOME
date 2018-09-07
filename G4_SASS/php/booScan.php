<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Examples</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link href="" rel="stylesheet">
</head>
<body>


<?php
ob_start();
session_start();



// if ( isset($_SESSION['ADMIN_ID']) ) {
//     $ADMIN_ID = $_SESSION['ADMIN_ID'];
//     $ADMIN_PERM = $_SESSION['ADMIN_PERM'];
    
//     echo '<script language="javascript">';
//     echo 'alert("歡迎！管理員")';
//     echo '</script>';
//   }else{
//     echo '<script language="javascript">';
//     echo 'alert("請登入管理員")';
//     echo '</script>';
//     exit;
//   }




// connect DB
require_once("connect_g4.php");


$sqlUpdate = "update booking set BOO_STATUS = 3, BOO_QRCODE = '../images/qrcode/qrcode3.png' WHERE BOO_NO = :BOO_NO";
$booStatus = $pdo->prepare($sqlUpdate);

// $booStatus->bindValue(':BOO_NO', $_REQUEST["BOO_NO"]);
$booStatus->bindValue(':BOO_NO', 1);
$booStatus->execute();

echo '已報到！歡迎進入E7DOME！'



?>

</body>
</html>