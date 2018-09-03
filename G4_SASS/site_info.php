<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/site_info.css">    
    <link rel="stylesheet" href="css/font.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>
    <script src="js/site_info.js"></script>
</head>
<body>
    <header>
		<div class="wrapper">
			<div class="humberger_btn">
				<div class="humberger_line top"></div>
				<div class="humberger_line mid"></div>
				<div class="humberger_line bot"></div>
			</div>
			<div class="logo">
			<a href="index.php">
				<img src="images/e7logo.png" alt=""> </a>
			</div>
			<div class="login">
					<!-- <a href="#"><img src="images/user-icon.png"></a> -->
					<a href="#">登入</a>
			</div>
			<ul>
			<li>
				<a href="site_info.php"> 場地介紹 </a>
			</li>
			<li>
				<a href="booking.php"> 預約場地 </a>
			</li>
			<li>
				<a href="group.php"> 運動揪團 </a>
			</li>
			<li>
				<a href="about.php"> 關於我們 </a>
			</li>
			<li>
				<a href="chat-robot.php"> 諮詢專區 </a>
			</li>
			<!-- <li>
				<a href="#">
				<img src="images/user-icon.png"> </a>
			</li> -->
			</ul>
		</div>
    </header>
    <div class="site_info_pg">
        <div class="site_info_pg_bluebox2">
            <h3>場地介紹</h3>
        </div>
        <div class="site_info_pg_bg">
            <img src="images/sport/site_info_bgimg.png" alt="">
        </div>
        <div class="site_info_pg_bluebox1">
            <div class="site_info_pg_txt">
            </div>
            <div class="site_info_pg_yellowbox"></div>
            <div class="site_info_pg_whitebox"></div>
        </div>
        <div class="site_info_wrap">
            <div id="basketball_site">
                <img src="images/sport/site_basketball.png" alt="">
                <h2>籃球場</h2>
                <div id="bsk_link">
                    <div class="link_text">></div>
                </div>
            </div>

            <div class="ani_basketball">
                <img src="images/basketball/basketball.png" alt="">
            </div>
            <div class="ani_basketball_bgc"></div>
            
            <div id="bowling_site">
                <img src="images/sport/site_bowling.png" alt="">
                <h2>保齡球場</h2>
                <div id="bwb_link">
                    <div class="link_text">></div>
                </div>
            </div>

            <div class="ani_bowling">
                <img src="images/bowling/ball.png" alt="">
            </div>
            <div class="ani_bowling_bgc"></div>
            
            <div id="badminton_site">
                <img src="images/sport/site_badminton.png" alt="">
                <h2>羽球場</h2>
                <div id="bmt_link">
                    <div class="link_text">></div>
                </div>
            </div>
            
            <div class="ani_badminton">
                <img src="images/sport/badminton.png" alt="">
            </div>
            <div class="ani_badminton_bgc"></div>

            <div  id="climbimg_site">
                <img src="images/sport/site_climbimg.png" alt="">
                <h2>攀岩場</h2>
                <div id="clb_link">
                    <div class="link_text">></div>
                </div>
            </div>

            <div class="ani_climbimg">
                <img src="images/sport/climbimg_ani.png" alt="">
            </div>
            <div class="ani_climbimg_bgc"></div>

        </div>
    </div>

    
	<script>
		$('.humberger_btn').click(function(){
			$(this).toggleClass('active');
		})
	</script>
</body>
</html>