<?php
ob_start();
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>

	<?php

		try{
			require_once("connect_g4.php");
			$sql="select * from booking where boo_no = 3";
			$booking = $pdo->query($sql);

			while($boo = $booking->fetch(PDO::FETCH_ASSOC)){

				echo $boo['MEM_NO'];
			echo $boo['BOO_STATUS'];

			}

		}catch(PDOException $e){
			echo $e->getMessage();
		}




	?>


<img src='https://chart.googleapis.com/chart?chs=100x100&cht=qr&chl=http://140.115.236.72/demo-projects/CD102/CD102G4/textqrcode/qrcode.php?choe=UTF-8'>

	
</body>
</html>