
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>E7DOME</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<script type="text/javascript" src="js/fullpage.js"></script>

	<!-- 3dfacModel -->
	<!-- <link rel="stylesheet" type="text/css" href="3dfac/css/normalize.css" /> -->
	<!-- <link rel="stylesheet" type="text/css" href="3dfac/css/style0.css" /> -->
	<!-- <link rel="stylesheet" type="text/css" href="3dfac/css/custom.css" /> -->
	<!-- <link rel="stylesheet" type="text/css" href="3dfac/css/fac-info.css"> -->

	<!-- <link rel="stylesheet" type="text/css" href="3dfac/css/fac-info.css" /> -->
	<!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<script src="3dfac/js/modernizr-custom.js"></script> -->
	<!-- <link rel="stylesheet" type="text/css" href="3dfac/css/fac-animation.css" /> -->
	
</head>

<body>
	<?php include 'header.php';?>
	<div id="homePage">
		<div class="section home_pg1">
			<div class="video-overlay"></div>
			<video id="home_bg1_vd" data-src="images/index/EZDOME.mp4" type="video/mp4" autoplay muted ="true" loop="true" data-video="0">
			</video>
			<div class="home_pg1_bluebox1">
				<div class="home_pg1_txt">
					<h1>邊緣人?!<br>一起運動吧!</h1>
					<div class="home_pg1_btng">
						<div class="home_pg1_btn">
							<a href="booking.php">預約</a>
						</div>
						<div class="home_pg1_btn">
							<a href="group.php">揪團</a>
						</div>
					</div>
				</div>
				<div class="home_pg1_yellowbox"></div>
			</div>
			<div class="home_pg1_bluebox2"></div>
			<div class="home_pg1_bluebox3"></div>
		</div>

		<div class="section home_pg2 fp-auto-height-responsive">
		<script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.16.1/TweenMax.min.js'></script>
		<div class="light"></div>
		<div class="light"></div>
		<div class="light"></div>
		<div class="light"></div>
			<div class="slide">
				<div class="wrapper">
					<div class="pg2_fac_info">
						<div class="fac_info_content">
							<h2>籃球場</h2>
							<p>想像curry一樣射滿全場嗎?</p>
							<p>來我們籃球場揮灑汗水吧!</p>
							
							<a href="basketball.php">更多資訊</a>
							<a href="booking.php">立即預約</a>

						</div>
					</div>
					<div class = "pg2_fac_svg">
					<?php include 'pg2_basket.php';?>
				</div>
				
				</div>
			</div>	
			<div class="slide">
				<div class="wrapper">
					<div class="pg2_fac_info">
						<div class="fac_info_content">
							<h2>保齡球場</h2>
							<p>來打一場漂亮的全倒吧!</p>
							<p>歡迎來最漂亮的保齡球場</p>
							<a href="bowling.php">更多資訊</a>
							<a href="booking.php">立即預約</a>

						</div>
					</div>
					<div class = "pg2_fac_svg">
					<?php include 'pg2_bowling.php';?>
				</div>
				
				</div>
			</div>
			<div class="slide">
				<div class="wrapper">
					<div class="pg2_fac_info">
						<div class="fac_info_content">
							<h2>羽球球場</h2>
							<p>一起揪麻吉來場2對2吧!</p>
							<p>世界上最大的羽球場</p>
							<a href="badminton.php">更多資訊</a>
							<a href="booking.php">立即預約</a>
						</div>
					</div>
					<div class = "pg2_fac_svg">
					<?php include 'pg2_badmin.php';?>
				</div>
				
				</div>
			</div>
			<div class="slide">
				<div class="wrapper">
					<div class="pg2_fac_info">
						<div class="fac_info_content">
							<h2>攀岩場</h2>
							<p>爬爬爬!</p>
							<a href="climbimg.php">更多資訊</a>
							<a href="booking.php">立即預約</a>
						</div>
					</div>
					<div class = "pg2_fac_svg">
					<?php include 'pg2_climbing.php';?>
				</div>
				
				</div>
			</div>	
		</div>

		<div class="section home_pg3 fp-auto-height-responsive">
			<div class="home_pg3_svg"></div>
			<div class="wrapper">
				<h2><div class="typing">加入揪團!尋找運動夥伴</div></h2>
				<div class="teamItem all">
					<a href="group.php">
						<div class="teamAll">
							<div class="all_img">
								<img src="images/index/date.png">
								<h3>
									揪團日期
								</h3>

							</div>
							<div class="teamMore all">
								<div class="morebg">查看更多</div>
								<div class="moreSkew">></div>
							</div>
						</div>
					</a>
				</div>
				<div class="home_team">
					<ul class="teamGroup">
					<?php
					require_once('php/connect_g4.php');
					$sql = "SELECT * FROM team JOIN booking ON (team.BOO_NO = booking.BOO_NO) JOIN facility ON (facility.FAC_NO = booking.FAC_NO)  WHERE booking.BOO_DATE > CURDATE() limit 6";
					$team = $pdo->query( $sql);
					$teams = $team->fetchAll(PDO::FETCH_ASSOC);
					foreach($teams as $i=>$teamsRow){
					?>
						<li class="teamItem">
							<a href="groupInfo.php?TEAM_NO=<?php echo $teamsRow["TEAM_NO"];?>">
								<div class="teamOne ">
									<div class="teamDate_top">
										<div class="dateGroup">
											<div class="teamDay"><?php echo substr($teamsRow["BOO_DATE"],8,2);?></div>
											<div class="teamMonth"><?php echo date("M",strtotime($teamsRow["BOO_DATE"]));?></div>
										</div>
									</div>
									<div class="teamPic">
										<img src="images/team_pic/<?php echo $teamsRow["TEAM_IMG"];?>" alt="">
									</div>
									<div class="teamInfo">
										<div class="teamMore">
											<div class="morebg">更多資訊</div>
											<div class="moreSkew">></div>
										</div>
										<div class="teamName"><?php echo $teamsRow["TEAM_NAME"];?></div>
										<div class="teamDate"><?php echo date('Y/m/d',strtotime($teamsRow["BOO_DATE"]));?></div>
										<div class="teamMem">
											揪團人數
											<?php
											$TEAM_NO=$teamsRow['TEAM_NO'];//抓揪團編號
											$memCount = "SELECT * FROM team_mem WHERE TEAM_NO = $TEAM_NO";//選擇所有資料 當 揪團編號=自己的揪團編號
											$teammem = $pdo->prepare($memCount);
											$teammem->execute(); 
											$rows = $teammem->rowCount();//計算抓到幾筆資料
											?>
											<span><?php echo $rows+1;//揪團人數+1(團長)?></span>/<span><?php echo $teamsRow["TEAM_MEM"];?></span>人				
										</div>	
										<div class="teamTxt">
										<?php echo $teamsRow["TEAM_INFO"];?>
										</div>
									</div>
								</div>
							</a>
						</li>  
					<?php
						} 
					?> 
]
					</ul>
				</div>
			</div>
		</div>
		<div class="section home_pg4 fp-auto-height-responsive">
			<div class="home_pg4_bg"></div>
			<div class="home_pg4_bluebox1">
				<div class="home_pg4_txt">
					<h2>點數儲值</h2>
					<p>場地點數制</p>
					<p>買越多送越多!</p>
				</div>
				<div class="home_pg4_yellowbox"></div>
				<div class="home_pg4_whitebox"></div>
			</div>
			<div class="home_pg4_bluebox2">
				<h3>POINT</h3>
			</div>
			<div class="wrapper">
				<ul class="pointCard">
					
				</ul>
			</div>
		</div>
		<div class="section home_pg5">
			<div class="home_pg5_whitebox1"></div>
			<div class="home_pg5_yellowbox1"></div>
			<div class="home_pg5_yellowbox2">
				<div class="home_pg5_whitebox2"></div>
				<h3>E7 DOME</h3>
			</div>
			<div class="wrapper">
				<h2>營業資訊</h2>
				<div class="home_pg5_footer">
					<div id="home_map">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7233.962258758776!2d121.19506222667539!3d24.966756662290436!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x346823c1ec904dcb%3A0xcdc129d4455ce456!2z5ZyL56uL5Lit5aSu5aSn5a24!5e0!3m2!1szh-TW!2stw!4v1534423581293"
						 width="600" height="350" frameborder="0" style="border:0" allowfullscreen id="map"></iframe>
					</div>
					<p>營業時間: 06:00 - 23:00</p>
					<p>地 址: 桃園市中壢區中大路300號</p>
					<p>電 話: 03-9876543</p>
				</div>
			</div>
		</div>
	</div>


	<script>
				var tl = new TimelineMax({ });
				var t2 = new TimelineMax({  });
				var t3 = new TimelineMax({ });
				var t4 = new TimelineMax({ });
				var bgd = $('.basketfloor , .bowlingfloor , .badminfloor , .climbingfloor');
		new fullpage('#homePage', {
			licenseKey: 'OPEN-SOURCE-GPLV3-LICENSE',
			verticalCentered: false,
			anchors: ['firstPage', 'secondPage', 'thirdPage', 'forthPage', 'lastPage'],
			navigation: true,
			responsiveWidth : 992,
			navigationTooltips: ['首頁','場地介紹','快來揪團','儲值點數','營業資訊'],
			onLeave: function (origin, destination, direction) {
				if (destination.index == 0) {
					$('.home_pg1').removeClass('active');
				}
				if (destination.index == 1) {
					if (document.body.clientWidth > 767) {
					$('.svg_none').hide();}
				}
				if (destination.index == 2) {
					$('.typing').css('animation','');
				}
				if (destination.index == 3) {
					$('.home_pg4').removeClass('active');
				}
				if (destination.index == 4) {
					$('.home_pg5').removeClass('active');
				}
			},
			afterLoad: function (origin, destination, direction) {
				if (destination.index == 0) {
					$('.home_pg1').addClass('active');
					$('#home_bg1_vd')[0].play();

				}
				if (destination.index == 1) {
					$('.svg_none').show();
					if (document.body.clientWidth > 767) {
					tl.from(bgd, 1, { opacity: 0, scale: 0, transformOrigin: 'center center', ease: Elastic.easeOut.config(1, 0.3) });
					t2.from('.item01', 0.5, { opacity: 0 }).from('.item01', 0.5, { y: -20, ease: Elastic.easeOut.config(1, 0.3) });
					t3.from('.item02', 0.5, { opacity: 0 }).from('.item02', 0.5, { y: -20, ease: Elastic.easeOut.config(1, 0.3) });
					t4.from('.player01,.player02,#pinkball,#blueball', 0.5, { opacity: 0 });
					}

				}
				if (destination.index == 2) {
					$('.typing').css('animation','typing 2s steps(21, end) forwards,blink-caret .5s step-end infinite alternate');
				}
				if (destination.index == 3) {

					$('.home_pg4').addClass('active');
				}
				if (destination.index == 4) {

					$('.home_pg5').addClass('active');
				}
			},
			afterSlideLoad: function(section, origin, destination, direction){
				if (document.body.clientWidth > 767) {
				if (destination.index == 0) {
					$('.svg_none').show();
					tl.from(bgd, 1, { opacity: 0, scale: 0, transformOrigin: 'center center', ease: Elastic.easeOut.config(1, 0.3) });
					t2.from('.item01', 0.5, { opacity: 0 }).from('.item01', 0.5, { y: -20, ease: Elastic.easeOut.config(1, 0.3) });
					t3.from('.item02', 0.5, { opacity: 0 }).from('.item02', 0.5, { y: -20, ease: Elastic.easeOut.config(1, 0.3) });
					t4.from('.player01,.player02', 0.5, { opacity: 0 });
				}
				if (destination.index == 1) {
					$('.svg_none').show();
					tl.from(bgd, 1, { opacity: 0, scale: 0, transformOrigin: 'center center', ease: Elastic.easeOut.config(1, 0.3) });
					t2.from('.item01', 0.5, { opacity: 0 }).from('.item01', 0.5, { y: -20, ease: Elastic.easeOut.config(1, 0.3) });
					t3.from('.item02', 0.5, { opacity: 0 }).from('.item02', 0.5, { y: -20, ease: Elastic.easeOut.config(1, 0.3) });
					t4.from('.player01,#pinkball,#blueball', 0.5, { opacity: 0 });
				}
				if (destination.index == 2) {
					$('.svg_none').show();
					tl.from(bgd, 1, { opacity: 0, scale: 0, transformOrigin: 'center center', ease: Elastic.easeOut.config(1, 0.3) });
					t2.from('.item01', 0.5, { opacity: 0 }).from('.item01', 0.5, { y: -20, ease: Elastic.easeOut.config(1, 0.3) });
					t4.from('.player01,.player02', 0.5, { opacity: 0 });
				}
				if (destination.index == 3) {
					$('.svg_none').show();
					tl.from(bgd, 1, { opacity: 0, scale: 0, transformOrigin: 'center center', ease: Elastic.easeOut.config(1, 0.3) });
				}
			}
			},
			onSlideLeave: function(section, origin, destination, direction){
				if (document.body.clientWidth > 767) {
				if (destination.index == 0) {
					$('.svg_none').hide();
					
				}
				if (destination.index == 1) {
					$('.svg_none').hide();
					
				}
				if (destination.index == 2) {
					$('.svg_none').hide();
					
				}
				if (destination.index == 3) {
					$('.svg_none').hide();
					

				}
			}
		}
			
		});
	</script>
	<script type="text/javascript" src="js/slick.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tilt.js/1.2.1/tilt.jquery.min.js"></script>
	<script>
		$(document).ready(function () {
			$('.teamGroup').slick(
				{
					infinite: false,
					speed: 300,
					slidesToShow: 3,
					slidesToScroll: 3,
					arrows: false,
					dots: true,
					infinite: true,
					autoplay: true,
 					autoplaySpeed: 3000,
					responsive: [
						{
							breakpoint: 768,
							settings: {
								slidesToShow: 1,
								slidesToScroll: 1,
								infinite: true,
								dots: true,
								autoplay: false
							}
						}
					]
				}
			);

		});
	</script>
	<script>
		$(document).ready(function () {
			$.ajax({
				url: 'php/pointlist.php',
				dataType: 'text',
				success: function (data) {
					$('.pointCard').append(data);

					$('.pointCard').slick(
						{
							infinite: false,
							speed: 300,
							slidesToShow: 3,
							arrows: false,
							dots: false,
							autoplay: true,
  							autoplaySpeed: 3000,
							responsive: [
								{
									breakpoint: 768,
									settings: {
										slidesToShow: 1,
										slidesToScroll: 1,
										dots: true,
									}
								}
							]
						}
					);

					$(".card").tilt({
						maxTilt: 15,
						scale: 1.02,
						perspective: 500,
						easing: "cubic-bezier(.03,.98,.52,.99)",
						speed: 300,
						glare: true,
						maxGlare: 0.6,
					});

				
				}

				
			});
		});
	</script>

</body>

</html>