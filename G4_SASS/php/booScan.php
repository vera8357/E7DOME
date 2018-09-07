<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Examples</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="stylesheet" href="../sealcss/sealmain.css">
<link rel="stylesheet" type="text/css" href="../css/bookingTicket.css">
<style>
    .mask {
      color: #ffffff;
      background: url(ffbe_files/bg.jpg) center;
      background-size: cover;
      opacity: 1;
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      text-align: center;
      vertical-align: middle;
    }

    .mask div {
      width: 100%;
      height: 100%;
      background: url(ffbe_files/icon_loader.gif) center no-repeat;
      display: table;
    }

    .mask p {
      text-shadow: 0 0 25px #000,
      0 0 20px #000,
      0 0 0.40px #000;
      margin: 0;
      padding: 0;
      font-size: 140%;
      text-align: center;
      display: table-cell;
      vertical-align: middle;
    }
  </style>
  <script src="../js/jq.js"> </script>
  <script src="../js/jqui.js"></script>
  <script src="../js/progressbar.js"></script>
</head>
<body id="effect" class="background-logo" onload="init_body();" ontouchmove="event.preventDefault()" style="width:100%;overflow:hidden;">

  <div align="center">
    <div class="container">
      <svg viewBox="0 0 100 4" preserveAspectRatio="none" style="width: 100%; height: 100%;">
        <path d="M 0,2 L 100,2"
          stroke="#eee" stroke-width="1" fill-opacity="0"></path>
        <path d="M 0,2 L 100,2" stroke="#FFEA82" stroke-width="4"
          fill-opacity="0" style="stroke-dasharray: 100, 100; stroke-dashoffset: 100;"></path>
        </svg>
        <div class="progressbar-text" style="color: rgb(153, 153, 153); position: absolute; right: 0px; top: 30px; padding: 0px; margin: 0px;">0
        %</div>
    </div>
    <p class="count">報到: <span id="touchnum">0</span></p>
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
      </div>
    </div>
  </header>
  <section class="airports">
    <div class="airport">
      <div class="airport-name">
        預約場地
      </div>
      <div class="airport-code">
      </div>
  </section>
  <section class="place">
    <div class="place-block">
      <div class="place-label">
        預約日期
      </div>
      <div class="place-value">
      </div>
    </div>
    <div class="place-block">
      <div class="place-label">
        預約時段
      </div>
      <div class="place-value">
      </div>
    </div>
    <div class="place-block">
      <div class="place-label">
        花費點數
      </div>
      <div class="place-value">
      </div>
    </div>
    <div class="qr">
    </div>
    <footer>
      <div class="footer-text">
        感謝您的預約！
      </div>
    </footer>
  </section>
</div>

  <!-- <div class="container--graph">
    <canvas id="graph"></canvas>
  </div> -->

  <!-- <p class="pull-right" style="text-align:right;margin-top:5px;margin-right:0px; margin-left:2px;">
    <img id="touch-image" class="pull-right" style="width:85%; margin:-5% 0;" src="./ffbe_files/img_card.png">
  </p> -->
  <!-- <p><img style="width:100%" src="./ffbe_files/img_txt.png" alt=""></p> -->
  <div id="mask" class="mask" style="visibility: hidden">
    <div>
      <p class="mask_p">Please wait...</p>
    </div>
  </div>

<?php
ob_start();
session_start();



// if ( isset($_SESSION['ADMIN_ID']) ) {
//     $ADMIN_ID = $_SESSION['ADMIN_ID'];
//     $ADMIN_PERM = $_SESSION['ADMIN_PERM'];
    
//     echo '<script language="javascript">';
//     echo 'alert("歡迎！管理員")';
//     echo '</script>';
//   }else{
//     echo '<script language="javascript">';
//     echo 'alert("請登入管理員")';
//     echo '</script>';
//     exit;
//   }




// connect DB
require_once("connect_g4.php");


$sqlUpdate = "update booking set BOO_STATUS = 3, BOO_QRCODE = '../images/qrcode/qrcode3.png' WHERE BOO_NO = :BOO_NO";
$booStatus = $pdo->prepare($sqlUpdate);

// $booStatus->bindValue(':BOO_NO', $_REQUEST["BOO_NO"]);
$booStatus->bindValue(':BOO_NO', 1);
$booStatus->execute();

echo '已報到！歡迎進入E7DOME！'



?>

</body>
</html>