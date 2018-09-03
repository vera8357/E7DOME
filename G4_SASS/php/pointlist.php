<?php
	ob_start();
	session_start();
	require_once('connect_g4.php');
	$sql = "select * from pointcard limit 3 ";             
	$query = $pdo->query($sql);
	while($row = $query->fetch(PDO::FETCH_ASSOC)){
		$freePoints = $row["CARD_POINTS"]-$row["CARD_PRICE"];
		$discount = 100- $row["CARD_PRICE"]/$row["CARD_POINTS"]*100;
		echo '<li>
				<div class="card">
				<div class="card_bg"></div>
				<div class="cardP1">
				購買<span class="cardCost">'.$row["CARD_PRICE"].'</span>點
			</div>
			<div class="cardP2">
				<span class="cardFree">送</span><span class="cardPoint">'.$freePoints.'</span>點
			</div>
			<div class="cardP3">現折<span>'.floor($discount).'</span>%</div>
			<a href="php\card_buy.php?no='.$row['CARD_NO'].'"class=\'cardBuy\'>
				立即購買
			</a>
		</div>
		</li>';
	}
?>