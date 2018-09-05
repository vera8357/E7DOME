<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>E7DOME</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<script type="text/javascript" src="js/fullpage.js"></script>

	<!-- 3dfacModel -->
	<link rel="stylesheet" type="text/css" href="3dfac/css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="3dfac/css/style0.css" />
	<link rel="stylesheet" type="text/css" href="3dfac/css/custom.css" />
	<link rel="stylesheet" type="text/css" href="3dfac/css/fac-animation.css" />
	<script src="3dfac/js/modernizr-custom.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
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

		<div class="section home_pg2">
			<?php include '3dfac.php';?>
		</div>

		<div class="section home_pg3">
			<div class="home_pg3_svg"></div>
			<div class="wrapper">
				<h2><div class="typing">加入揪團!尋找運動夥伴</div></h2>
				<div class="teamItem all">
					<a href="#">
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
					$sql = "SELECT * FROM team JOIN booking ON (team.BOO_NO = booking.BOO_NO) JOIN facility ON (facility.FAC_NO = booking.FAC_NO) ";
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
										<img src="images/<?php echo $teamsRow["TEAM_IMG"];?>" alt="">
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
						<!-- <li class="teamItem">
							<a href="#">
								<div class="teamOne">
									<div class="teamDate_top">
										<div class="dateGroup">
											<div class="teamDay">23</div>
											<div class="teamMonth">AUG</div>
										</div>
									</div>
									<div class="teamPic">
										<img src="images//index/bg2.png" alt="">
									</div>
									<div class="teamInfo">
										<div class="teamMore">
											<div class="morebg">更多資訊</div>
											<div class="moreSkew">></div>
										</div>
										<div class="teamName">
											台北帥哥籃球團
										</div>
										<div class="teamDate">
											2018/06/28
										</div>
										<div class="teamMem">
											揪團人數
											<span>3</span>
											/
											<span>6</span>
											人
										</div>
										<div class="teamTxt">
											Lorem ipsum dolor sit amet.
										</div>
									</div>
								</div>
							</a>
						</li> -->
					</ul>
				</div>
			</div>
		</div>
		<div class="section home_pg4">
			<div class="home_pg4_bg"></div>
			<div class="home_pg4_bluebox1">
				<div class="home_pg4_txt">
					<h2>點數儲值</h2>
					<p>文案文案文案</p>
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
		new fullpage('#homePage', {
			licenseKey: 'OPEN-SOURCE-GPLV3-LICENSE',
			verticalCentered: false,
			anchors: ['firstPage', 'secondPage', 'thirdPage', 'forthPage', 'lastPage'],
			navigation: true,
			navigationTooltips: ['首頁','場地介紹','快來揪團','儲值點數','營業資訊'],
			// showActiveTooltip: true,
			// autoScrolling: false,
			afterRender: function () {
			},
			onLeave: function (origin, destination, direction) {
				if (destination.index == 0) {
					$('.home_pg1').removeClass('active');
				}
				if (destination.index == 1) {
					$('#e7dome-text').hide();
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
					$('#e7dome-text').show();
					// var tl = new TimelineMax({ delay: 0 });
					// var t2 = new TimelineMax({ delay: 0.5 });
					// var t3 = new TimelineMax({ delay: 1 });
					// var t4 = new TimelineMax({ delay: 1.5 });

					// var bgd1 = $('.map--1');
					// var bgd2 = $('.map--2');
					// var bgd3 = $('.map--3');
					// var bgd4 = $('.map--4');
					// bgd1.show();
					// bgd2.show();
					// bgd3.show();
					// bgd4.show();

					// tl.from(bgd1, 1, { opacity: 0, scale: 0, transformOrigin: 'center center', ease: Elastic.easeOut.config(1, 0.3) });
					// t2.from(bgd2, 1, { opacity: 0, scale: 0, transformOrigin: 'center center', ease: Elastic.easeOut.config(1, 0.3) });
					// t3.from(bgd3, 1, { opacity: 0, scale: 0, transformOrigin: 'center center', ease: Elastic.easeOut.config(1, 0.3) });
					// t4.from(bgd4, 1, { opacity: 0, scale: 0, transformOrigin: 'center center', ease: Elastic.easeOut.config(1, 0.3) });
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
	<script>
		$('.humberger_btn').click(function () {
			$(this).toggleClass('active');
		})
	</script>
</body>

</html>