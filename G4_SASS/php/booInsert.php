<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Examples</title>
<link rel="stylesheet" type="text/css" href="../css/bookingTicket.css">
</head>
<body>


<?php
ob_start();
session_start();

// prevent refresh
if( isset($_SESSION['submitBoo']) ){
  unset($_SESSION['submitBoo']);
  header("location: ../booking.php");
  exit;

}else{
  $_SESSION['submitBoo'] = 1;
}

// connect DB
require_once("connect_g4.php");

// Insert
$sqlInsert = "INSERT into booking (FAC_NO, BOO_DATETIME, BOO_DATE, BOO_TIME, MEM_NO, BOO_STATUS)
values (:FAC_NO, :BOO_DATETIME, :BOO_DATE, :BOO_TIME, :MEM_NO, :BOO_STATUS)";
$boo = $pdo->prepare($sqlInsert);

// Update
$sqlUpdate = "update member set MEM_POINTS = :MEM_POINTS - :FAC_POINTS WHERE MEM_NO = :MEM_NO";
$mem = $pdo->prepare($sqlUpdate);


try {

/* Begin a transaction, turning off autocommit */
$pdo->beginTransaction();

$boo->bindValue(':FAC_NO', $_REQUEST["FAC_NO"]);

$boo->bindValue(':BOO_DATETIME', $_REQUEST["BOO_DATETIME"]);
$boo->bindValue(':BOO_DATE',$_REQUEST["BOO_DATE"]);
$boo->bindValue(':BOO_TIME', $_REQUEST["BOO_TIME"]);

$boo->bindValue(':MEM_NO',$_REQUEST["MEM_NO"]);

$boo->bindValue(':BOO_STATUS', $_REQUEST["BOO_STATUS"]);
$boo->execute();
$lastBooNo = $pdo->lastInsertId();

$mem->bindValue(':MEM_NO', $_REQUEST["MEM_NO"]);
$mem->bindValue(':FAC_POINTS', $_REQUEST["FAC_POINTS"]);
$mem->bindValue(':MEM_POINTS', $_REQUEST["MEM_POINTS"]);
$mem->execute();

// insert DB
$pdo->commit();
	
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
  $BOO_TIME = array('上午','下午','晚上');
  while ( $rowBoo = $booTicket->fetch() ) {

    include('phpqrcode/qrlib.php');

    $tempDir = '../images/qrcode/'; 

    $host= gethostname();
    $ip = gethostbyname($host);
    // $ip = $_SERVER['SERVER_ADDR'];
    $codeContents = "$ip/php/booScan.php?BOO_NO=$lastBooNo";
     
    // we need to generate filename somehow,  
    // with md5 or with database ID used to obtains $codeContents... 
    $fileName = '005_file_'.md5($codeContents).'.png'; 
     
    $pngAbsoluteFilePath = $tempDir.$fileName; 
    $urlRelativeFilePath = '../images/qrcode/'.$fileName; 
     
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


<body>

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

<?php
  } // while

try {
  
} catch (Exception $e) {
  echo $e->getMessage(), '<br>';
  echo $e->getLine();
}

?>


<div class="group">
  <div>
    找不到人一起玩？來開團吧！
  </div>
  <div>
    <button class="group-btn">
      立即開團
    </button>
  </div>
</div>


</body>
</html>