


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/memberinfo.css">
	<title>會員基本資料</title>
	

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

				<li id="meminfo_active"><a href="#"><span class="line"></span>個人資料</a></li>
				<li><a href="memberbooking.php"><span class="line"></span>預約紀錄</a></li>
				<li><a href="memberpoints.php"><span class="line"></span>儲值紀錄</a></li>
				<li><a href="membergroup.php"><span class="line"></span>我的揪團</a></li>
				<li><form action="php/logout.php" method="post"><input id="btn_logout" type="submit" value="登出"></form> </li>
				
				
			</ul>
			

		</div>


		



		<!-- 右邊攔 選項內容-->
		<div class="content">

			<div class="member_content">
				<h1 id="member_h1">基本資料</h1>

						<div class="div_style first">
							會員名稱 : <input id="clear_border" type="text" value="<?php echo$_SESSION['MEM_ID']; ?>" readonly="readonly" style="border:1px solid transparent; box-shadow: 0px 0px 0px 0px transparent;">

						</div>

						<div class="div_style">
							手機號碼 : <input id="phone_number" type="tel" name="change_tel"  value="<?php echo$_SESSION['MEM_PHONE']; ?>">

						</div>
						<div>
							<input id="update_phone" type="button" value="修改手機號碼">
						</div>
					
			


			</div>


			<div class="change_paw">
				
				<h1 id="member_h1">變更密碼</h1>

					
					<div class="div_style first">
						輸入舊密碼 : <input id="old_psw" type="password" name="old_psw"   >
					</div>

					<div class="div_style">
						輸入新密碼 : <input id="new_ps1" type="password" name="new_psw"   >
					</div>

					<div class="div_style">
						確認新密碼 : <input  id="new_ps2" type="password" name="chech_psw"  >
					</div>

					<div>
						<input id="update_psw" type="button" value="確認修改密碼"  >
					</div>

				

			</div>

			<input type="text"  id="MEM_NO" name="MEM_NO" value="<?php echo$_SESSION['MEM_NO'];?>" style="visibility: hidden;">
			

		</div>

	</div>

</section>


	<script src="js/upfile.js"></script>
	<script src="js/update_phone_psw.js"></script>

</body>
</html>