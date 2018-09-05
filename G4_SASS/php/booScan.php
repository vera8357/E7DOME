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

// connect DB
require_once("connect_g4.php");


$sqlUpdate = "update booking set BOO_STATUS = 1 WHERE BOO_NO = :BOO_NO";
$booStatus = $pdo->prepare($sqlUpdate);

$booStatus->bindValue(':BOO_NO', $_REQUEST["BOO_NO"]);

$booStatus->execute();

echo '已報到！歡迎進入E7DOME！'
?>

</body>
</html>