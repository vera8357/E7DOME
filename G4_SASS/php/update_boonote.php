<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

<?php
ob_start();
session_start();


try{
	require_once("connect_g4.php");
	$sql = "UPDATE BOOKING SET BOO_NOTETIME =".date('ymd').", BOO_RANK = :BOO_RANK , BOO_NOTE = :BOO_NOTE WHERE BOOKING.BOO_NO =".$_SESSION['BOO_NO'];
    
    $evaluate = $pdo->prepare($sql);
    $evaluate->bindValue(":BOO_RANK", $_REQUEST['star']);
    $evaluate->bindValue(":BOO_NOTE", $_REQUEST['evaluate_text']);
    $evaluate->execute();
	echo "<script>
          window.location.href='../memberbooking.php';alert('評價完成');</script>";


}catch(PDOException $e){
	echo $e->getMessage();
}





?>

	
</body>
</html>




