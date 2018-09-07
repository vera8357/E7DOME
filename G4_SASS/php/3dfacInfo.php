<?php
$CATE_NO = $_POST["CATE_NO"];

    // connect DB
    require_once("connect_g4.php");  
    // print all fac
    $sqlFacBtn = "SELECT * FROM facility WHERE CATE_NO = $CATE_NO";
    $facBtn = $pdo->query($sqlFacBtn);
    $rowFacBtn = $facBtn->fetchAll();
?>

	<ul class="fac-list tab">
		<li><button class="tablinks" onclick="openCity(event, '<?php echo $rowFacBtn[0]['FAC_NO'] ?>')">
		    <?php echo $rowFacBtn[0]['FAC_NAME'] ?></button>
		</li>
		<li><button class="tablinks" onclick="openCity(event, '<?php echo $rowFacBtn[1]['FAC_NO'] ?>')">
		    <?php echo $rowFacBtn[1]['FAC_NAME'] ?></button>
		</li>
		<li><button class="tablinks" onclick="openCity(event, '<?php echo $rowFacBtn[2]['FAC_NO'] ?>')">
		    <?php echo $rowFacBtn[2]['FAC_NAME'] ?></button>
		</li>
	</ul>

<?php
    $sqlIdxFac = "SELECT * FROM facility WHERE CATE_NO =  $CATE_NO";
    $idxFac = $pdo->query($sqlIdxFac);

    while ($rowIdxFac = $idxFac->fetch()){

    $sqlFacStat = "SELECT COUNT(TEAM_NO), AVG(BOO_RANK), booking.FAC_NO from facility
    LEFT JOIN booking ON facility.FAC_NO = booking.FAC_NO
    LEFT JOIN team ON booking.BOO_NO = team.BOO_NO
    where CATE_NO =1 AND booking.FAC_NO = $rowIdxFac[FAC_NO]
    ORDER BY booking.BOO_NO";

    $facStat = $pdo->query($sqlFacStat);
    $rowfacStat = $facStat->fetch();
?>

    <div id="<?php echo $rowIdxFac['FAC_NO'] ?>" class="fac-container tabcontent">
      <div class="box box01">
        <div class="fac-img">
            <img src="https://api.fnkr.net/testimg/350x350/">
        </div>
        <div class="fac-info">
            <h3><?php echo $rowIdxFac['FAC_NAME'] ?>
            	<span><small>$</small><?php echo $rowIdxFac['FAC_POINTS'] ?><small>/hr</small></span>
            </h3>
            <p><?php echo $rowIdxFac['FAC_DESC'] ?></p>
            <div class="fac-btn-group">
                <button class="fac-btn">立即預約</button>
                <button class="fac-btn">更多資訊</button>
            </div>
        </div>
      </div>
      <div class="box box03">
        <span class="icon-cont"><i class="fas fa-money-bill-alt"></i></span>
        <h3>花費點數</h3>
        <strong><?php echo $rowIdxFac['FAC_POINTS'] ?></strong>
      </div>  
      <div class="box box04">
        <span class="icon-cont"><i class="fas fa-grin-stars"></i></span>
        <h3>場地評價</h3>
        <strong><?php echo $rowfacStat['AVG(BOO_RANK)'] ?></strong>
      </div>  
      <div class="box box05">
        <span class="icon-cont"><i class="fas fa-users"></i></span>
        <h3>目前開團</h3>
        <strong><?php echo $rowfacStat['COUNT(TEAM_NO)'] ?></strong>
      </div>
    </div>

<?php
    } // while
?>