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
	<link rel="stylesheet" type="text/css" href="../css/memberinfo.css">
	<title>Document</title>
	

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

				<li><a href="#"><span class="line"></span>個人資料</a></li>
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

			<div class="member_content">
				<h1>基本資料</h1>

				


						
						<div class="div_style first">
							會員名稱: <input id="clear_border" type="text" value="<?php echo$_SESSION['MEM_ID']; ?>" readonly="readonly">

						</div>

						<div class="div_style">
							手機號碼: <input id="phone_number" type="tel" name="change_tel"  value="<?php echo$_SESSION['MEM_PHONE']; ?>">

						</div>
						<div>
							<input id="update_phone" type="button" value="修改手機號碼">
						</div>
					
			


			</div>


			<div class="change_paw">
				
				<h1>變更密碼</h1>

					
					<div class="div_style first">
						輸入舊密碼: <input id="old_psw" type="password" name="old_psw"   >
					</div>

					<div class="div_style">
						輸入新密碼: <input id="new_ps1" type="password" name="new_psw"   >
					</div>

					<div class="div_style">
						確認新密碼: <input  id="new_ps2" type="password" name="chech_psw"  >
					</div>

					<div>
						<input id="update_psw" type="button" value="確認修改密碼"  >
					</div>

				

			</div>

			<input type="text"  id="MEM_NO" name="MEM_NO" value="<?php echo$_SESSION['MEM_NO'];?>" style="visibility: hidden;">
			

		</div>

	</div>

</section>


	<script src="../js/upfile.js"></script>
	<script src="../js/update_phone_psw.js"></script>

</body>
</html>