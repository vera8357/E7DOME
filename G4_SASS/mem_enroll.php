<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/mem_enroll.css">
	<title>Document</title>
</head>
<body>
	

	<?php
		require_once('header.php');
	?>

	<div class="enroll_gap"></div>

	<section class="enroll_wrap">

		<div class="enroll_text">
			歡迎註冊
			
		</div>



		<div class="enroll_frame">
			<p>會員註冊</p>
		<form action="php/enroll.php">
			<table id="enroll_table">
				<tr>

					<td class="enroll_li">
						<span id="check_id"></span>
						<span id="check_psw"></span>
					</td>
					
				</tr>

				<tr>
					<td class="enroll_li">
						會員帳號: <input id="enroll_id" type="text" name="enroll_id" required="required">
					</td>
				</tr>

				<tr> 
					<td class="enroll_li">
						會員密碼: <input id="enroll_psw1" type="password" name="enroll_psw1" required="required">
					</td>
				</tr>

				<tr>
					<td class="enroll_li">
						確認密碼: <input id="enroll_psw2" type="password" name="enroll_psw2" required="required">
					</td>
				</tr>

				<tr>
					<td class="enroll_li">
						會員名稱: <input id="enroll_name" type="text" name="enroll_name" required="required">
					</td>
				</tr>

				<tr>
					<td class="enroll_li">
						手機號碼: <input id="enroll_tel" type="tel" name="enroll_tel" required="required" placeholder="格式0912345678">
					</td>
				</tr>

				<tr>
					<td class="enroll_li">
						<input id="enroll_send" type="submit"  value="確認送出">
					</td>
				</tr>

			</table>
		</form>
		</div>
	</section>
	
	<script src="js/login.js"></script>
	
</body>
</html>