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

	<link rel="stylesheet" type="text/css" href="resert.css">
	<link rel="stylesheet" type="text/css" href="lighebox.css">
	<title>Document</title>
</head>


<body>

<!-- 登入 -->
<div id="bar">
	
<?php
//檢查是否已登入
if( isset($_SESSION["MEM_NAME"]) === true ){ //已登入
  echo '<a href="#"><span id="MEM_NAME">', $_SESSION["MEM_NAME"], '</span></a>';
  echo '<span id="spanLogin">登出</span>';
}else{
  echo '<span id="MEM_NAME">&nbsp;</span>';
  echo '<span id="spanLogin">登入</span>';
}
?>  

</div>



<!-- 登入燈箱 -->

<div id="sing_in">
	
	<div id="sing_wrap">
		<h1>會員登入</h1><span id="close_1">x</span>

		<table id="table_login">
			<tr>
				<td>
					帳號:<input id="MEM_ID" type="text" name="MEM_ID">
				</td>
			</tr>
			<tr>
				<td>
					密碼: <input id="MEM_PSW" type="password" name="MEM_PSW">
				</td>
			</tr>
			<tr>
				<td>
					<input id="enroll_btn" type="button" name="" value="馬上註冊">
				</td>
			</tr>
			<tr>
				<td>
					<input id="login_btn" type="button" name="" value="登入">
				</td>
			</tr>
		</table>
		
	</div>

</div>


<!-- 註冊燈箱 -->

<div id="enroll">
	<div id="enroll_wrap">
		<h1>會員註冊</h1><span id="close_2">x</span>
		<form action="enroll.php">
			<ul>
				<li class="enroll_li" id="check"></li>

				<li class="enroll_li">
					會員帳號:<input id="enroll_id" type="text" name="enroll_id">
				</li>

				<li class="enroll_li"> 
					會員密碼:<input id="enroll_psw1" type="password" name="enroll_psw1">
				</li>

				<li class="enroll_li">
					確認密碼:<input id="enroll_psw2" type="password" name="enroll_psw2">
				</li>

				<li class="enroll_li">
					會員名稱:<input id="enroll_name" type="text" name="enroll_name">
				</li>

				<li class="enroll_li">
					手機號碼:<input id="enroll_tel" type="tel" name="enroll_tel">
				</li>

				<li class="enroll_li">
					<input id="enroll_send" type="submit"  value="確認送出">
				</li>

			</ul>

			

		</form>


	</div>


</div>


	<script src="login.js"></script>
</body>
</html>