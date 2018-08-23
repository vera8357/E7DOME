<?php
ob_start();
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/memberpoints.css">
	<title>會員儲值資訊</title>
	

</head>
<body>
<div class="nav"></div>
<?php
$member_pic = 'member_pic/'.$_SESSION["MEM_IMG"];
?>

<section>

	<div class="wrap">
		<!-- 左邊攔 會員選項-->
		<div class="member_item">


			<form  id="file" action="new_upfile.php"   method="post" enctype="multipart/form-data">

				<div class="pic_wrap">
					<label>
						<input  type="file" name="upfile" id="upfile">
						<img id="show_pic" class="pic" src="<?php echo$member_pic; ?>">
						<div class="change_pic">變更大頭照</div>
					</label>
				</div>

				<input id="member_pic" type="submit" value="確認上傳">
				
       		 </form>



       		 <div id="show_name"><?php echo $_SESSION['MEM_ID']; ?></div>




			<ul class="m_item">

				<li><a href="memberinfo.php"><span class="line"></span>個人資料</a></li>
				<li><a href="memberbooking.php"><span class="line"></span>預約紀錄</a></li>
				<li><a href="#"><span class="line"></span>儲值紀錄</a></li>
				<li><a href="#"><span class="line"></span>我的揪團</a></li>

				<form action="logout.php" method="post">
				<li><a href="#"> <input type="submit" value="登出"> </a></li>
				</form>
			</ul>
			

		</div>


		



		<!-- 右邊攔 選項內容-->
		<div class="content">

			<div class="points">
				<h1>儲值紀錄</h1>

				<table class="points_content">
					
			

					<tr>
						<th>訂單編號</th>
						<th>&nbsp;日&nbsp;&nbsp;期&nbsp;</th>
						<th>儲值金額</th>
						<th>&nbsp;點&nbsp;&nbsp;數&nbsp;</th>
					</tr>

					<?php
						
						try{
							require_once("connect_g4.php");
							$sql = "select * from card_oder where MEM_NO =".$_SESSION['MEM_NO'];
							$member = $pdo->query($sql);
							

							if($member->rowCount()==0){
								echo "<tr><td class='no_oder'>無儲值紀錄</td></tr>";
							}else{

									while ($order = $member->fetch(PDO::FETCH_ASSOC)){
										echo "<tr>";
										echo "<td>".$order['ORDER_NO']."</td>";
										echo "<td>".$order['ORDER_DATETIME']."</td>";
										echo "<td>".$order['CARD_PRICE']."</td>";
										echo "<td>".$order['CARD_POINTS']."</td>";
										echo "</tr>";
									} 
										
							}

						}catch(PDOException $e){

							echo $e->getMessage();
						}


					?>

					
					
				</table>



			</div>


						
					

			
			

		</div>

	</div>

</section>


	<script src="../js/upfile.js"></script>
	

</body>
</html>