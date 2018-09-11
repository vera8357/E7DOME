<?php
ob_start();
session_start();


try{
	require_once("connect_g4.php");
	$sql ="UPDATE booking SET boo_status = '2' WHERE booking.boo_no =".$_REQUEST['booking_no'];
	$boo_status = $pdo->exec($sql);

	$sql = "select fac.FAC_POINTS, boo.MEM_NO from booking boo join facility fac on boo.FAC_NO = fac.FAC_NO where boo.boo_no =".$_REQUEST['booking_no'];
	$boo_ponints = $pdo->query($sql);

	$rows = $boo_ponints->fetch(PDO::FETCH_ASSOC);
	$points = $rows['FAC_POINTS'];
	$mem_no = $rows['MEM_NO'];

	$sql ="UPDATE member SET MEM_POINTS = MEM_POINTS + '$points' WHERE MEM_NO = '$mem_no'";
	$mem_points = $pdo->exec($sql);

	$sql ="select MEM_POINTS from member where MEM_NO = ".$_SESSION['MEM_NO'];
	$mem_ponints = $pdo->query($sql);

	$rows = $mem_ponints->fetch(PDO::FETCH_ASSOC);

	$_SESSION["MEM_POINTS"] = $rows['MEM_POINTS'];
	echo "已取消";
	

}catch(PDOException $e){
	echo $e->getMessage();
}










?>