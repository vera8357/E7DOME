
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/header_test.css">
</head>
<body>
	   <header id="hader_wrap">
        <div class="logo">
          <a href="#">
            <img src="images/e7logo.png" alt=""> </a>
        </div>
        <ul>
          <li>
            <a href="#"> 場地介紹 </a>
          </li>
          <li>
            <a href="booking.html"> 預約場地 </a>
          </li>
          <li>
            <a href="group.html"> 運動揪團 </a>
          </li>
          <li>
            <a href="about.html"> 關於我們 </a>
          </li>
          <li>
            <a href="chat-robot.html"> 諮詢專區 </a>
          </li>
          <li >

           <?php
			//檢查是否已登入
		if( isset($_SESSION["MEM_NAME"]) === true ){ //已登入
		  echo '<a href="memberinfo.php" id="link_member"><img src="member_pic/'.$_SESSION["MEM_IMG"].'" id="m_pic"></a>';
		  echo '<span id="spanLogin">登出</span>';
		}else{
		  echo '<a href="#" id="link_member"><img src="php/member_pic/pic.jpg" id="m_pic"></a>';
		  echo '<span id="spanLogin">登入</span>';
			}
			?>  

          </li>
        </ul>
      </header>



      <!-- 登入燈箱 -->

<div id="sing_in">
	
	<div id="sing_wrap">
		
		<p>會員登入</p><span id="close_1"><img src="php/member_pic/close.png"></span>

		<table id="table_login">
			<tr>
				<td>
					帳號:<input id="MEM_ID" type="text" name="MEM_ID" required="required">
				</td>
			</tr>
			<tr>
				<td>
					密碼: <input id="MEM_PSW" type="password" name="MEM_PSW" required="required">
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
		<p>會員註冊</p><span id="close_2"><img src="php/member_pic/close.png"></span>
		<form action="../php/enroll.php">
			<ul>
				<li class="enroll_li" >

					<span id="check_id"></span>
					<span id="check_psw"></span>
					
				</li>

				<li class="enroll_li">
					會員帳號:<input id="enroll_id" type="text" name="enroll_id" required="required">
				</li>

				<li class="enroll_li"> 
					會員密碼:<input id="enroll_psw1" type="password" name="enroll_psw1" required="required">
				</li>

				<li class="enroll_li">
					確認密碼:<input id="enroll_psw2" type="password" name="enroll_psw2" required="required">
				</li>

				<li class="enroll_li">
					會員名稱:<input id="enroll_name" type="text" name="enroll_name" required="required">
				</li>

				<li class="enroll_li">
					手機號碼:<input id="enroll_tel" type="tel" name="enroll_tel" required="required" value="09-12345678">
				</li>

				<li class="enroll_li">
					<input id="enroll_send" type="submit"  value="確認送出">
				</li>

			</ul>

			

		</form>


	</div>


</div>


<script src="js/login.js"></script>
</body>
</html>