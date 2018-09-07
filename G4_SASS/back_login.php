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
	<title>Document</title>
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
							<span>帳號</span><input id="admin_id" type="text" name="admin_id">
						</td>
					</tr>

					<tr>
						<td>
							<span>密碼</span><input id="admin_psw" type="password" name="admin_psw">
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

	<script >
		
		function $id(id){
			return document.getElementById(id);
		}

		function login(){

			var xhr = new XMLHttpRequest();

			xhr.onload = function(){

				if(xhr.status == 200){
					if(xhr.responseText == "帳號密碼錯誤"){
						alert(responseText);
					}else{
						window.location.href="back_admin.php";
						alert('登入成功');
					}
				}else{
					alert(xhr.status)
				}
			}


	         xhr.open("Post", "php/back_ajax_login.php", true);
             xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
             var data_info = "admin_id=" + document.getElementById("admin_id").value 
                    + "&admin_psw="+ document.getElementById("admin_psw").value;
             xhr.send(data_info);
		}


		$id('btn_login').addEventListener("click",login,false);




	</script>

</body>
</html>