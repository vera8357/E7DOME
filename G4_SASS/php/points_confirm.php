<?php
ob_start();
session_start();

require_once('connect_g4.php');
// $CARD_METHOD = $_REQUEST['CARD_METHOD'];
    if(!isset($_SESSION['MEM_ID']))
    $MEM_ID='請先登入會員';
    else
    $MEM_ID=$_SESSION['MEM_ID'];

    $CARD_NO = $_REQUEST['CARD_NO'];
    $CARD_METHOD = $_REQUEST['CARD_METHOD'];
    $str_method= '';
    switch($CARD_METHOD) {
        case 1:
            $str_method = '信用卡';
            break;
        case 2:
            $str_method = '超商繳費';
            break;
        case 3:
            $str_method = '第三方支付';
            break;
    }
    $sql = "select * from pointcard WHERE CARD_NO = '$CARD_NO'";             
    $query = $pdo->query($sql);	
    $row = $query->fetch(PDO::FETCH_ASSOC);
    echo '<h3 class="confirm_title">確認購買內容</h3>
    <div class="confirm_list">
    <span class="confirm_left">儲值帳戶</span><span class="confirm_right">'.$MEM_ID.'</span>
    </div>
    <div class="confirm_list">
    <span class="confirm_left">商品</span><span class="confirm_right">E7DOME點數 x '.$row['CARD_POINTS'].'</span>
    </div>
    <div class="confirm_list">
    <span class="confirm_left">價格</span><span class="confirm_right">NT '.$row['CARD_PRICE'].'</span>
    </div>
    <div class="confirm_list">
    <span class="confirm_left">付款方式</span><span class="confirm_right">'.$str_method.'</span>
    </div>
    <p class="pay_note">注意事項: 儲值點數無法退費或兌現</p>
    <form action="php/points_finish.php" method="POST">
    <input type="hidden" name="CARD_NO" value="'.$CARD_NO.'">
    <input type="hidden" name="CARD_POINTS" value="'.$row['CARD_POINTS'].'">
    <input type="hidden" name="CARD_PRICE" value="'.$row['CARD_PRICE'].'">
    <input type="hidden" name="CARD_METHOD" value="'.$CARD_METHOD.'">
    <input type="submit" value="確認付款" class="confirm_btn">
    </form>';
    


?>