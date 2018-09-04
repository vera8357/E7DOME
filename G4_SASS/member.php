<?php
ob_start();
session_start();
?>

<!-- 登入 -->
<div id="bar">
	
<?php
//檢查是否已登入
if( isset($_SESSION["MEM_NAME"]) === true ){ //已登入
  echo '<a href="memberinfo.php" id="pic_a" style="display:block;"><img src="images/member_pic/'.$_SESSION["MEM_IMG"].'" id="m_pic"></a>';
  echo '<a href="#" id="link_member"></a>';
 
}else{
  echo '<a href="#" id="pic_a"><img src="images/member_pic/pic.jpg" id="m_pic"></a>';
  echo '<a href="#" id="link_member">登入</a>';
}
?>  

</div>

<!-- 登入燈箱 -->

<div id="sing_in">
	
	<div id="sing_wrap">
		
		<p>會員登入</p><span id="close_1"><img src="images/member_pic/close.png"></span>

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
		<p>會員註冊</p><span id="close_2"><img src="images/member_pic/close.png"></span>
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
						會員帳號:<input id="enroll_id" type="text" name="enroll_id" required="required">
					</td>
				</tr>

				<tr> 
					<td class="enroll_li">
						會員密碼:<input id="enroll_psw1" type="password" name="enroll_psw1" required="required">
					</td>
				</tr>

				<tr>
					<td class="enroll_li">
						確認密碼:<input id="enroll_psw2" type="password" name="enroll_psw2" required="required">
					</td>
				</tr>

				<tr>
					<td class="enroll_li">
						會員名稱:<input id="enroll_name" type="text" name="enroll_name" required="required">
					</td>
				</tr>

				<tr>
					<td class="enroll_li">
						手機號碼:<input id="enroll_tel" type="tel" name="enroll_tel" required="required" placeholder="格式0912345678">
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
</div>
<script src="js/login.js"></script>
