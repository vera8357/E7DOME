  <!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->
  <link rel="stylesheet" type="text/css" href="css/font.css">
	<link rel="stylesheet" type="text/css" href="css/member.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js">
	</script>
  <header>
		<div class="wrapper">
			<div class="humberger_btn">
				<div class="humberger_line top"></div>
				<div class="humberger_line mid"></div>
				<div class="humberger_line bot"></div>
			</div>
			<div class="logo">
				<a href="index.php">
					<img src="images/e7logo.png" alt="logo"> </a>
			</div>
			<div class="login">
				<!-- <a href="#"><img src="images/user-icon.png"></a> -->
				<!-- <a href="#">登入</a> -->
				<?php
					require_once("member.php");
				?>		
			</div>
			<ul>
				<li>
					<a href="site_info.php"> 場地介紹 </a>
				</li>
				<li>
					<a href="booking.php"> 預約場地 </a>
				</li>
				<li>
					<a href="group.php"> 運動揪團 </a>
				</li>
				<li>
					<a href="about.php"> 關於我們 </a>
				</li>
				<li>
					<a href="chat-robot.php"> 諮詢專區 </a>
				</li>
				<li class="buy_hidden"><a href="points_buy.php"> 儲值點數</a></li>
			</ul>
		</div>
		<script>
		$(document).ready(function(){
			$('.humberger_btn').click(function () {
			$(this).toggleClass('active');
		})
		})
		
	</script>
</header>
	