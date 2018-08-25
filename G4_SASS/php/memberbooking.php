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
	<link rel="stylesheet" type="text/css" href="../css/memberbooking.css">
	<title>會員預約資訊</title>
	

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
						<img id="show_pic" class="pic" src="<?PHP echo$member_pic; ?>">
						<div class="change_pic">變更大頭照</div>
					</label>

				</div>

				<input type="submit" value="確認上傳">
				
       		 </form>



       		 <div id="show_name"><?php echo $_SESSION['MEM_ID']; ?></div>




			<ul class="m_item">
				<li><a href="memberinfo.php"><span class="line"></span>個人資料</a></li>
				<li><a href="#"><span class="line"></span>預約紀錄</a></li>
				<li><a href="memberpoints.php"><span class="line"></span>儲值紀錄</a></li>
				<li><a href="membergroup.php"><span class="line"></span>我的揪團</a></li>
				<form action="logout.php" method="post">
				<li><a href="#"> <input type="submit" value="登出"> </a></li>
				</form>
			</ul>
			

		</div>


		



		<!-- 右邊攔 選項內容-->
		<div class="content">

			
				<h1>預約記錄</h1>


				<div class="booking_content">

					<!-- 改用php產出 -->

					<div class="booking">

						<span class="hold">
							<img src="member_pic/img.png">
						</span>

						<span class="hold">
							<p>訂單編號:<span id="booking_no">aaaaa</span></p>
							<p>&nbsp;場&nbsp;&nbsp;&nbsp;&nbsp;地&nbsp;&nbsp;:<span id="booking_site"></span></p>
							<p>日期時段:<span id="booking_time"></span></p>
							<p>使用狀態:<span id="booking_check"></span></p>
						</span>

						<span class="button">
							<input type="button" value="揪團去">
							<input type="button" value="取消預約">
							<input type="button" value="評價場地">
						</span>

						

					</div>

					

				</div>

		</div>


	


	</div>
</section>


	<script src="../js/upfile.js"></script>
</body>
</html>