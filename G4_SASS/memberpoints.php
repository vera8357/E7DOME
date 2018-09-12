
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/memberpoints.css">
	<title>會員儲值資訊</title>
	

</head>
<body>

	<?php
		require_once("header.php");
?>

<?php
$member_pic = 'images/member_pic/'.$_SESSION["MEM_IMG"];
?>
<div class="div"></div>
<section>

	<div class="wrap">
		<!-- 左邊攔 會員選項-->
		<div class="member_item">


			<form  id="file" action="php/new_upfile.php"   method="post" enctype="multipart/form-data">

				<div class="pic_wrap">
					<label>
						<input  type="file" name="upfile" id="upfile">
						<img id="show_pic" class="pic" src="<?php echo$member_pic; ?>">
						<div class="change_pic">變更大頭照</div>
					</label>
				</div>

				<input id="member_pic" type="submit" value="確認上傳">
				
       		 </form>



       		 <div id="show_name">
       		 	<span><img src="images/member_pic/photography-portrait-mode.png"><?php echo $_SESSION['MEM_ID']; ?></span>
       		 	<span><img src="images/member_pic/coin.png"><?php echo $_SESSION['MEM_POINTS']; ?></span>
       			<span><img src="images/member_pic/smartphone.png"><?php echo $_SESSION['MEM_PHONE']; ?></span>
       		 </div>




			<ul class="m_item">

				<li><a href="memberinfo.php"><span class="line"></span>個人資料</a></li>
				<li><a href="memberbooking.php"><span class="line"></span>預約紀錄</a></li>
				<li id="meminfo_active"><a href="#"><span class="line"></span>儲值紀錄</a></li>
				<li><a href="membergroup.php"><span class="line"></span>我的揪團</a></li>
				<li class="computer_logout"><form action="php/logout.php" method="post"><input id="btn_logout" type="submit" value="登出"></form> </li>

			</ul>


			<div class="phone_show">
				<span>
					<img src="images/member_pic/coin.png"><?php echo $_SESSION['MEM_POINTS']; ?>
					
				</span>

				<span><form action="php/logout.php" method="post"><input id="btn_logout" type="submit" value="登出"></form></span>
				
			</div>
			

		</div>


		



		<!-- 右邊攔 選項內容-->
		<div class="content">

			<div class="points">
				<h1 id="member_h1">儲值紀錄</h1>

				
					<div class="points_scrollbar">
			

					<div class="text_title">
						<ul>
							<li>訂單編號</li>
							<li>訂購日期</li>
							<li>商品售價</li>
							<li>商品點數</li>
							<li>付款方式</li>
						</ul>
					
					</div>

					<?php
						
						try{
							require_once("php/connect_g4.php");
							$sql = "select * from card_order where MEM_NO =".$_SESSION['MEM_NO']." ORDER BY ORDER_DATETIME DESC ";
							$member = $pdo->query($sql);
							

							if($member->rowCount()==0){
								echo "<ul class='no_order'><li>無儲值紀錄</li><ul>";
							}else{

									while ($order = $member->fetch(PDO::FETCH_ASSOC)){
										echo "<ul class='order_content'>";
										echo "<li><span class='small_show'>訂單編號</span>".$order['ORDER_NO']."</li>";
										echo "<li><span class='small_show'>訂購日期</span>".$order['ORDER_DATETIME']."</li>";
										echo "<li><span class='small_show'>儲值金額</span>".$order['CARD_PRICE']."</li>";
										echo "<li><span class='small_show'>購買點數</span>".$order['CARD_POINTS']."</li>";
										switch($order['CARD_METHOD']){
											case 1:
												$CARD_METHOD = '信用卡';
												break;
											case 2:
												$CARD_METHOD = '超商繳費';
												break;
											case 3:
												$CARD_METHOD = '第三方支付';
												break;
											default:
												break;
										}
										echo "<li><span class='small_show'>付款方式</span>".$CARD_METHOD."</li>";
										echo "</ul>";

									} 
										
							}

						}catch(PDOException $e){

							echo $e->getMessage();
						}


					?>

					
					
				
			</div>


			</div>


						
					

			
			

		</div>

	</div>

</section>


	<script src="js/upfile.js"></script>
	

</body>
</html>