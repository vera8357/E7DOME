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
  <script src="../js/jq.js"> </script>
  <script src="../js/jqui.js"></script>
  <script src="../js/progressbar.js"></script>
</head>
<script type="text/javascript" charset="utf-8">


    var POINT_NUM = 4;
    var ACCESS_TOKEN = "099efcf65d7c21c825f5b0047b0b075a1dba1783e8441d808e32f29df1d36660";
    var CODE_TYPE = 1402;

    window.onpageshow = function (evt) {
      if (evt.persisted) {
        ProgressBar.set(0);
        displayTouchNum(0);
        $("#mask").css("visibility", "hidden");
        ProgressBar.isLock = false;
      }
    };

    // 初使
    function init() {
      document.addEventListener("touchmove", touchHandler, false);
    }

    function init_body() {
      init();
    }

    function removeEvent() {
      document.removeEventListener("touchstart", touchHandler, false);
    }

    function touchHandler(event) {

      if (ProgressBar.isLock) {
        return;
      }

      displayTouchNum(event.touches.length);

      if (event.touches.length !== POINT_NUM) {
        return;
      }
      
      // 印章狀態
      var isVibrate = navigator.vibrate || navigator.webkitVibrate || navigator.mozVibrate || navigator.msVibrate;
      if (isVibrate) {
        navigator.vibrate(375);
      } else {
        $("#effect").effect("highlight", { "color": "#FC0A5B" }, 500);
      }

      var points = '';
      for (var i = 0; i < POINT_NUM; i++) {
        points += event.touches[i].pageX;
        points += ',';
        points += event.touches[i].pageY;
        if (i != POINT_NUM - 1) {
          points += ',';
        }
      }

      ProgressBar.isLock = true;
      ProgressBar.set(1.0);
      $.get('https://api-us.touchcard.jp/code/match', {
        "access_token": ACCESS_TOKEN,
        "code_type": CODE_TYPE,
        "vertexes": points,
      }, function (data) {
        $("#mask").css("visibility", "visible");
        if (data.match && data.match != -1) {
          if (data.url != null && data.url != '') {
            setTimeout(movePage, 0, data.url);
          } else {
            setTimeout(hiddenMask, 1000);
          }
        } else {
          setTimeout(hiddenMask, 1000);
          toastr.info('Please touch to retry!', null, { timeOut: 700 })
        }
      });
    }

    function movePage(url) {
      document.location.href = url;
    }

    function displayTouchNum(num) {
      document.querySelector('#touchnum').textContent = num;
    }

    function hiddenMask() {
      ProgressBar.animate(0, null, function () {
        displayTouchNum(0);
      });
      $("#mask").css("visibility", "hidden");
      ProgressBar.isLock = false;
    }
  </script>
</head>
<body id="effect" class="background-logo" onload="init_body();" ontouchmove="event.preventDefault()" style="width:100%;overflow:hidden;">

  <div align="center">
    <div class="container">
      <svg viewBox="0 0 100 4" preserveAspectRatio="none" style="width: 100%; height: 100%;">
        <path d="M 0,2 L 100,2" stroke="#eee" stroke-width="1" fill-opacity="0"></path>
        <path d="M 0,2 L 100,2" stroke="#FFEA82" stroke-width="4" fill-opacity="0" style="stroke-dasharray: 100, 100; stroke-dashoffset: 100;"></path>
      </svg>
      <div class="progressbar-text" style="color: rgb(153, 153, 153); position: absolute; right: 0px; top: 30px; padding: 0px; margin: 0px;">0
        %
      </div>
    </div>
    <p class="count">タッチ数: <span id="touchnum">0</span></p>
  </div>
    <div id="mask" class="mask" style="visibility: hidden">
      <div>
        <p class="mask_p">Please wait...</p>
      </div>
    </div>
    <script>
      // #effect是 body的 ID
      $('body').on('touchstart', function (e) {
        $(this).css(
          {
            'background-image': "url('images/coupon-dialog2.png')",
            'background-repeat': 'no-repeat'
          });
        });
    </script>
</body>

</html>
  
<?php
ob_start();
// session_start();



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