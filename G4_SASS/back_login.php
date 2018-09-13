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
	 <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/back.css">
    <link rel="stylesheet" href="css/font.css">
    <link rel="stylesheet" type="text/css" href="css/back_login.css">
	<title>E7DOME-後台管理員登入</title>
</head>
<body>
	<section>

		<div class="wrap">
		

			<div class="log">
				<img src="images/e7logo.png">
			</div>



			<div id="back_login">
				<table>
						<h1>管理員登入平台</h1>
					<tr>
						<td>
							<span class="back_neknhpe">帳號</span><input id="admin_id" type="text" name="admin_id">
						</td>
					</tr>

					<tr>
						<td>
							<span class="back_neknhpe">密碼</span><input id="admin_psw" type="password" name="admin_psw">
						</td>
					</tr>

					<tr>
						<td>
							<input  id="btn_login" type="button"  value="登入">
						</td>
					</tr>

				</table>
			</div>

		</div>

	</section>


<script src="js/back_login.js"></script>
</body>
</html>