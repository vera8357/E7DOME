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
	<div class="headerdropdown">
		<ul class="downlink-ww">
			<li class="downlink-w" ><a class="downlink" href="#">揪團</a></li>
			<li class="downlink-w" ><a class="downlink" href="points_buy.php">儲值</a></li>
			<li class="downlink-w"><form action="php/logout.php"><a class="downlink" ><input id="memberout" type="submit" value="登出"></a></form></li>
		</ul>
	</div>
</div>

<!-- 登入燈箱 -->

<div id="sing_in">
	
	<div id="sing_wrap">
		<img src="images/basketball.png" alt="" class="tennis_img">
		<p>會員登入</p><span id="close_1"><img src="images/member_pic/close.png"></span>

		<table id="table_login">
			<tr>
				<td>
					<input id="MEM_ID" type="text" name="MEM_ID" required="required" placeholder="帳號" autocomplete="off">
				</td>
			</tr>
			<tr>
				<td>
					<input  id="MEM_PSW" type="password" name="MEM_PSW" required="required" placeholder="密碼" autocomplete="off">
				</td>
			</tr>
			<tr>
				<td>
				<!-- 	<input id="enroll_btn" type="button" name="" value="馬上註冊"> -->
					<a id="link_enroll" href="mem_enroll.php">馬上註冊</a>
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


<script src="js/login.js"></script>
