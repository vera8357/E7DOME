<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0,viewport-fit=cover">
<title>Examples</title>
<link rel="stylesheet" type="text/css" href="css/bookingTicket.css">
<link rel="stylesheet" type="text/css "href="css/creatgroup.css">

</head>
<body>

	<?php include 'header.php';?>
  <script>
  $(document).ready(function(){
    $('.select_btn.team').click(function(){
      $('.ticket').addClass('right');
    });
    $('.select_btn.boo').click(function(){
      $('.ticket').removeClass('right');
    });
  });
</script>
<?php

// prevent refresh
if( isset($_SESSION['refreshChk']) ){
  unset($_SESSION['refreshChk']);
  header("location: booking.php");
  exit;
}else{
  $_SESSION['refreshChk'] = rand();
}

// MEM LOGIN CHK
if( isset( $_SESSION["MEM_NO"]) ){
  $MEM_NO = $_SESSION["MEM_NO"];
}else{
  header("location: booking.php");
  exit;
}


// DATA EMPTY CHECK
if( $_REQUEST["FAC_POINTS"] == ''){
  header("location: booking.php");
  exit;
}

// MEM_POINTS CHK
$MEM_POINTS = $_SESSION["MEM_POINTS"];
$FAC_POINTS = $_REQUEST["FAC_POINTS"];
if ( $MEM_POINTS < $FAC_POINTS ) {
    echo '<script language="javascript">';
    echo 'alert("會員點數不足請儲值");';
    // echo 'alert("'.$FAC_POINTS.'");';
    echo "setTimeout(\"location.href = 'points_buy.php';\",1500);";
    echo '</script>';
  exit;
}

// connect DB
require_once("php/connect_g4.php");

// Insert
$sqlInsert = "INSERT into booking (FAC_NO, BOO_DATETIME, BOO_DATE, BOO_TIME, MEM_NO, BOO_STATUS)
values (:FAC_NO, :BOO_DATETIME, :BOO_DATE, :BOO_TIME, :MEM_NO, :BOO_STATUS)";
$boo = $pdo->prepare($sqlInsert);

// Update
$sqlUpdate = "update member set MEM_POINTS = :MEM_POINTS-:FAC_POINTS WHERE MEM_NO = :MEM_NO";
$mem = $pdo->prepare($sqlUpdate);


try {

/* Begin a transaction, turning off autocommit */
$pdo->beginTransaction();

$boo->bindValue(':FAC_NO', $_REQUEST["FAC_NO"]);

$boo->bindValue(':BOO_DATETIME', $_REQUEST["BOO_DATETIME"]);
$boo->bindValue(':BOO_DATE',$_REQUEST["BOO_DATE"]);
$boo->bindValue(':BOO_TIME', $_REQUEST["BOO_TIME"]);

$boo->bindValue(':MEM_NO',$MEM_NO);

$boo->bindValue(':BOO_STATUS', $_REQUEST["BOO_STATUS"]);
$boo->execute();
$lastBooNo = $pdo->lastInsertId();

$mem->bindValue(':MEM_NO', $MEM_NO);
$mem->bindValue(':MEM_POINTS', $MEM_POINTS);
$mem->bindValue(':FAC_POINTS', $FAC_POINTS);

$mem->execute();

// insert DB
$pdo->commit();

$_SESSION["MEM_POINTS"] = $MEM_POINTS - $FAC_POINTS;
	
} catch (Exception $e) {
	echo $e->getMessage(), '<br>';
	echo $e->getLine();
}



?>



<?php 

// $CATE_NO    = $_REQUEST["CATE_NO"];
// $BOO_DATE   = $_REQUEST["BOO_DATE"];  

// connect DB
// require_once("connectG4.php");

$sqlBoo = "SELECT * from booking
LEFT JOIN facility
ON booking.FAC_NO = facility.FAC_NO
WHERE BOO_NO = $lastBooNo";
$booTicket = $pdo->query($sqlBoo);


?> 


<?php
  $BOO_TIME = array('清晨', '上午', '下午', '晚上');
  while ( $rowBoo = $booTicket->fetch() ) {

    include('php/phpqrcode/qrlib.php');

    $tempDir = 'images/qrcode/'; 

    $host= gethostname();
    $ip = gethostbyname($host);
    // $ip = $_SERVER['SERVER_ADDR'];
    $codeContents = "http://".$ip."/demo-projects/CD102/CD102G4/php/booScan.php?BOO_NO=$lastBooNo";
     
    // we need to generate filename somehow,  
    // with md5 or with database ID used to obtains $codeContents... 
    $fileName = '005_file_'.md5($codeContents).'.png'; 
     
    $pngAbsoluteFilePath = $tempDir.$fileName; 
    $urlRelativeFilePath = 'images/qrcode/'.$fileName; 
     
    // generating 
    if (!file_exists($pngAbsoluteFilePath)) { 
        QRcode::png($codeContents, $pngAbsoluteFilePath);

        $sqlQrcode = "UPDATE booking SET BOO_QRCODE = :BOO_QRCODE WHERE BOO_NO = :BOO_NO";
        $qrcode = $pdo->prepare($sqlQrcode);
        
        // UPDATE QRCODE PATH
        $qrcode->bindValue(':BOO_QRCODE', $urlRelativeFilePath);
        $qrcode->bindValue(':BOO_NO', $lastBooNo);
        $qrcode->execute();
        // echo '預約完成！'; 
        // echo '<hr />'; 
    } else { 
        echo 'File already generated! We can use this cached file to speed up site on common codes!';
        echo '<hr />'; 
    } 
     
    // echo 'Server PNG File: '.$pngAbsoluteFilePath; 
    // echo '<hr />';


?>
<div class="bg">
  <div class="book_and_team">
    <div class="select_book">
      <h2>感謝您的預約</h2>
      <p>E7DOME致力提供最好的運動場地!</p>
      <p>期望給所有客戶最好的運動體驗</p>
      <p><br></p>
      <p>快來E7DOME揮灑汗水吧!</p>
      <div class="select_btn boo">預約明細</div>
    </div>
    <div class="select_team">
      <h2>尋找運動夥伴?</h2>
      <p>立即在E7DOME開團</p>
      <p>尋找志同道合的運動好友!</p>
      <p><br></p>
      <P>還在考慮是否揪團嗎? 沒關係!</P>
      <P>前往會員中心-預約紀錄再決定是否揪團</P>
      <div class="select_btn team">來去揪團</div>
    </div>
    <div class="ticket inverse">
      <header>
        <div class="company-name">
          預約明細
        </div>
        <div class="gate">
          <div>
            訂單編號
          </div>
          <div>
            <?php printf("%'.05d\n", $rowBoo['BOO_NO']); ?>
          </div>
        </div>
      </header>
      <section class="airports">
        <div class="airport">
          <div class="airport-name">
            預約場地
          </div>
          <div class="airport-code">
            <?php echo $rowBoo["FAC_NAME"] ?>
          </div>
      </section>
      <section class="place">
        <div class="place-block">
          <div class="place-label">
            預約日期
          </div>
          <div class="place-value">
            <?php echo $rowBoo["BOO_DATE"] ?>
          </div>
        </div>
        <div class="place-block">
          <div class="place-label">
            預約時段
          </div>
          <div class="place-value">
            <?php echo $BOO_TIME[$rowBoo["BOO_TIME"]] ?>
          </div>
        </div>
        <div class="place-block">
          <div class="place-label">
            花費點數
          </div>
          <div class="place-value">
            <?php echo $rowBoo["FAC_POINTS"] ?>
          </div>
        </div>
        <div class="qr">
          <?php echo '<img src="'.$urlRelativeFilePath.'" />'; ?>
        </div>
        <footer>
          <div class="footer-text">
            感謝您的預約！
          </div>
        </footer>
      </section>
    </div>

    <div class="group ticket">
      <header>找不到人一起玩？來開團吧！</header>
      <div class="group_form">
        <form action="php/creatFinish.php" method="post" enctype="multipart/form-data">
        <?php
            $boo_no= $rowBoo['BOO_NO'];
            $mem_no= $_SESSION["MEM_NO"];
            $mem_name = $_SESSION["MEM_NAME"];
            $team_mem = "SELECT FAC.FAC_MEM FROM booking book JOIN facility fac ON book.FAC_NO = fac.FAC_NO WHERE book.BOO_NO = '$boo_no'";
            $team_memquery = $pdo->query($team_mem);
            $team_row = $team_memquery->fetch(PDO::FETCH_ASSOC);
        ?>
            <input type="hidden" name="BOO_NO" value="<?php echo $boo_no ?>" >
            <!-- boo編號 -->
              <div class="team_name">
                <label for="TEAM_NAME">揪團名稱</label>
                <input type="text" name=TEAM_NAME minlength="3" maxlength="10" id="TEAM_NAME" required placeholder="請輸入揪團名稱">
              </div>
              
              <div class="team_info">
                <div class="team_mem">
                  <label for="TEAM_MEM">揪團人數</label>
                  <select name="TEAM_MEM" id="TEAM_MEM" required>
                    <?php
                      for($i=1; $i<$team_row['FAC_MEM']; $i++){
                          echo '<option value="'.$i.'">'.$i.'人</option>';
                      }
                    ?>
                  </select>
                </div>
                <div class="team_img">
                  <label for="TEAM_IMG">揪團照片</label>
                  <input type="file" name="TEAM_IMG" id="TEAM_IMG">
                </div>

                <div>
                  <label for="TEAM_INFO">揪團簡介</label>
                  <textarea name="TEAM_INFO" id="TEAM_INFO" cols="30" rows="10" required></textarea>
                <div>
              </div>
            <input type="submit" value="揪團去!">
        </form>
    </div>
    <div>
  </div>
</div>

<?php
  } // while

try {
  
} catch (Exception $e) {
  echo $e->getMessage(), '<br>';
  echo $e->getLine();
}

?>

</body>
</html>