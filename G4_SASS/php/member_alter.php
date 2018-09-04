

<?php

try{
	require_once("connect_g4.php");
	$sql ="UPDATE member SET MEM_STATUS = :MEM_STATUS  WHERE MEM_NO = :MEM_NO";
	 $update_member = $pdo->prepare($sql);
	 $update_member->bindValue(":MEM_STATUS",$_REQUEST["mem_status"]);
	 $update_member->bindValue(":MEM_NO",$_REQUEST["MEM_NO"]);
	 $update_member->execute();

	header("location:../back_mem.php");
	


}catch(PDOException $e){
	echo $e->getMessage();
}


?>