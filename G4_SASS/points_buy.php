<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>E7DOME</title>
	<link rel="stylesheet" href="css/payment.css">
	<link rel="stylesheet" type="text/css" href="css/font.css">
</head>
<body>
	<?php include 'header.php';?>
	<?php 
		require_once('php/connect_g4.php');
		// $_SESSION["MEM_ID"] = 'WESLEY';
		$CARD_NO = $_GET['CARD_NO'];
		$sql = "select * from pointcard where CARD_NO = '$CARD_NO'";             
		$query = $pdo->query($sql);
		$row = $query->fetch(PDO::FETCH_ASSOC);	
	?>
	<div class="pay_bg">
		<div class="payment">
			<div class="pamyment_form">
				<form action="php/points_finsh.php" method="POST">				
					<div class="pay_method">
						<p class="pay_title">
						<label for="pay_card" >付費方式</label>
					</p>
					<div>
						<select name="pay_card" id="pay_card">
							<option value="1">PayPal</option>
							<option value="2">Web ATM</option>
							<option value="3">信用卡</option>
							<option value="4">支付寶</option>
						</select>	
						<input type="hidden" name="CARD_PRICE" value='<?php echo $row['CARD_PRICE']?>'>
						<input type="hidden" name="CARD_POINTS" value='<?php echo $row['CARD_POINTS']?>'>
						<input type="hidden" name="CARD_NO" value='<?php echo $CARD_NO?>'>
					</div>
					</div>
					
					
					<p class="pay_title">
						<label for="pay_id" class="pay_title">帳戶名稱</label>
					</p>
					
					<div>
						<input type="text" readonly value="<?php echo $_SESSION['MEM_ID'] ?>" id="pay_id">
					</div>
					<p class="pay_title">
						注意事項
					</p>
					<p>帳號中所除值的餘額無法退款或兌現</p>
					<input type="submit" value="立即付款" class="pay_btn">
					<input type="button" value="取消" class="pay_btn">
				</form>
			</div>
			<div class="payment_info">
				<p class="pay_title">你正在購買</p>
				<p>一起動點數 - <?php echo $row['CARD_POINTS'] ;?>點</p>
				<div class="pay_price">
					<p class="pay_title">總額</p>
					<p>
					NT$ <?php echo $row['CARD_PRICE'] ;?>
					</p>
				</div>
				
			</div>
		</div>
	</div>
	<?php
	// if( isset($_SESSION["MEM_NAME"]) === true ){

	// $no = $_GET['no'];
	// $sql = "select * from pointcard where CARD_NO = '$no'";             
	// 	$query = $pdo->query($sql);
	// 	$row = $query->fetch(PDO::FETCH_ASSOC);
	// }

	// else{
	// 	echo"請登入";
	// }

	?>
</body>
</html>
