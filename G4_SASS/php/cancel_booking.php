<?php
ob_start();
session_start();


try{
	require_once("connect_g4.php");
	$sql ="UPDATE booking SET boo_status = '2' WHERE booking.boo_no =".$_REQUEST['booking_no'];
	$boo_status = $pdo->query($sql);

	echo "已取消";


}catch(PDOException $e){
	echo $e->getMessage();
}










?>