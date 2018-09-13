
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0,viewport-fit=cover">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/memberbooking.css">
	<title>E7DOME-會員預約資訊</title>
	

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


			<form  id="file" action="php/new_upfile.php"   method="post" enctype="multipart/form-data"  >

				<div class="pic_wrap">
					<label>
						<input  type="file" name="upfile" id="upfile" accept="image/*">
						<img id="show_pic" class="pic" src="<?PHP echo$member_pic; ?>">
						<div class="change_pic">變更大頭照</div>
					</label>

				</div>

				<input type="submit" value="確認上傳">
				
       		 </form>



       		 <div id="show_name">
       		 	<span><img src="images/member_pic/photography-portrait-mode.png"><?php echo $_SESSION['MEM_ID']; ?></span>
       		 	<span><img src="images/member_pic/coin.png"><?php echo $_SESSION['MEM_POINTS']; ?></span>
       			<span><img src="images/member_pic/smartphone.png"><?php echo $_SESSION['MEM_PHONE']; ?></span>
       		 </div>

			<div class="phone_show">
				<span>
					<img src="images/member_pic/coin.png"><?php echo $_SESSION['MEM_POINTS']; ?>
					
				</span>

				<span><form action="php/logout.php" method="post"><input id="btn_logout" type="submit" value="登出"></form></span>
				
			</div>


			<ul class="m_item">
				<li><a href="memberinfo.php"><span class="line"></span>個人資料</a></li>
				<li id="meminfo_active"><a href="#"><span class="line"></span>預約紀錄</a></li>
				<li><a href="memberpoints.php"><span class="line"></span>儲值紀錄</a></li>
				<li><a href="membergroup.php"><span class="line"></span>我的揪團</a></li>
				<li class="computer_logout"><form action="php/logout.php" method="post"><input id="btn_logout" type="submit" value="登出"></form> </li>
				
			</ul>


		
			

		</div>


		



		<!-- 右邊攔 選項內容-->
		<div class="content">

			
				<h1 id="member_h1">預約記錄</h1>


				<div class="booking_content">

					<!-- 改用php產出 -->

					<?php


					try{
							require_once("php/connect_g4.php");
							$sql = "select * from booking left join facility  on booking.fac_no = facility.fac_no  where MEM_NO =".$_SESSION['MEM_NO']." ORDER BY BOO_DATE DESC";
							$member = $pdo->query($sql);
							
							if($member->rowCount()==0){
								echo "<div class='booking'>無紀錄</div>";
							}else{

									while ($order = $member->fetch(PDO::FETCH_ASSOC)){
									 switch ($order['BOO_TIME']) {
									 	case '1':
									 		$order['BOO_TIME'] = "10:00";
									 		break;
									 	case '2':
									 		$order['BOO_TIME'] = "14:00";
									 		break;
									 	default:
									 	    $order['BOO_TIME'] = "16:00";	
									 }


									  switch ($order['BOO_STATUS']) {
									 	case '1':
									 		$order['BOO_STATUS'] = "已預約";
									 		break;
									 	case '2':
									 		$order['BOO_STATUS'] = "已取消";
									 		break;
									 	default:
									 	    $order['BOO_STATUS'] = "已報到";	
									 }
									 	
										echo "<div class='booking'>";
										echo "<span class='hold1'>";
										echo "<img src='".$order['BOO_QRCODE']."'>";
									
										echo "</span>";
										echo "<span class='hold2'>";
										echo "<p>訂單編號:<span>".$order['BOO_NO']."</span></p>";
										echo "<p>&nbsp;場&nbsp;&nbsp;&nbsp;&nbsp;地&nbsp;&nbsp;:<span id='booking_site'>".$order['FAC_NAME']."</span></p>";
										echo "<p>預約時段:<span id='booking_time'>".$order['BOO_TIME']."</span></p>";
										echo "<p>預約日期:<span id='booking_date'>".$order['BOO_DATE']."</span></p>";
										echo "<p>使用狀態:<span id='booking_check'>".$order['BOO_STATUS']."</span></p>";
										echo "</span>";
										echo "<span class='button'>";
										$status=$order['BOO_STATUS'];
										if($status=="已取消")
										echo "<input type='button' class='cancel book_cancel' value='已取消' disabled>";
									 	else{			 
											$sql = "select * from team join booking on team.BOO_NO = booking.BOO_NO WHERE booking.BOO_NO = ".$order['BOO_NO'];
											$team = $pdo->prepare($sql);
											$team->execute(); 
											$rows = $team->rowCount();//看他有沒有揪過團
											if($rows!=0){
												
											$teaminfo = $team->fetch(PDO::FETCH_ASSOC);					
											$href = 'groupInfo.php?TEAM_NO='.$teaminfo['TEAM_NO'];
											
											echo "<a href='$href'><input type='button' value='已揪團'></a>";
										}
											else{
												echo "<form action='boo_creat.php' method='POST'>";
												echo "<input type='submit' value='揪團去'>";
												echo "<input type='hidden' name='booking_no' value=".$order['BOO_NO'].">";
												echo "</form>";
										}
										}

										$today = date('Y-m-d');
										if($order['BOO_STATUS'] === '已預約'  && strtotime($order['BOO_DATE']) > strtotime($today)){
										echo "<input class='cancel' type='button' value='取消預約' >";
										}else{
										echo "<input class='cancel book_cancel' type='button' value='取消預約' disabled>";
										}
										
										echo "<input type='hidden' name='booking_no' value=".$order['BOO_NO'].">";
										echo "<form action='evaluate.php'>";
										echo "<input type='submit' value='評價場地'>";
										echo "<input type='hidden' name='evaluate_booking_no' value=".$order['BOO_NO'].">";
										echo "</form>";
										echo "</span>";
										echo "</div>";
										
									} 
										
							}

						}catch(PDOException $e){

							echo $e->getMessage();
						}




					?>
		

				

				</div>

		</div>


	


	</div>
</section>


	<script src="js/upfile.js"></script>
	<script src="js/cancel.js"></script>
</body>
</html>