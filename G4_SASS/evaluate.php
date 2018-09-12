

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/evaluate.css">
	<title>Document</title>
</head>
<body>
	 <?php
        require_once("header.php");
?>

	<div class="div"></div>

	<div class="evaluate_title">
		評價場地
	<div class="evaluate_line"></div>

	</div>


	<section id="evaluate_wrap">

		<div class="fac_img">

			<?php

			try{
				require_once("php/connect_g4.php");
				$sql ="select * from BOOKING join FACILITY using(FAC_NO) where BOOKING.MEM_NO =".$_SESSION['MEM_NO']." and BOOKING.BOO_NO =".$_REQUEST['evaluate_booking_no'];
				 $member = $pdo->query($sql);

				           if($member->rowCount()==0){
                                echo "<ul class='my_group'><li style='width:100%; text-align: center;'>無紀錄</li><ul>";
                            }else{

                                while ($fac = $member->fetch(PDO::FETCH_ASSOC)){
                                	echo "<div class='pic_wrap'>";
                                	echo "<img src='images/fac_img/".$fac['FAC_IMG1']."'>";
                                	
                       				echo "<div class='fac_name'>場地名稱:".$fac['FAC_NAME']."</div>";
                       				echo "</div>";
                                }       
                            }


                          $_SESSION['BOO_NO'] = $_REQUEST['evaluate_booking_no'];

			}catch(PDOExcption $e){
				echo $e->getMessage();
			}

			?>
			
		</div>


		<div class="evaluate_content">
			
			<form action="php/update_boonote.php" method="post">
				
			<div class="star_content">
				<span>星級評比:</span> <input required id="star" type="text" name="star" value=""/>
			</div>

				<ul>
					<li class="e_str">&#9733</li>
					<li class="e_str">&#9733</li>
					<li class="e_str">&#9733</li>
					<li class="e_str">&#9733</li>
					<li class="e_str">&#9733</li>
					
				</ul>

				<textarea name="evaluate_text" placeholder="輸入評價" style="color:#757575;" ></textarea>
			


				<div class="evaluate_btn">
				<input  type="reset"  value="重設">
				<input  type="submit"  value="送出">
				</div>
			</form>



		</div>
	</section>	
	<script src="js/evaluate.js"></script>
</body>
</html>