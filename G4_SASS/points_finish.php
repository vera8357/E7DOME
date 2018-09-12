
    <?php
    ob_start();
    session_start();
        require_once('php/connect_g4.php');
        $CARD_NO= $_REQUEST['CARD_NO'];
        $CARD_PRICE = $_REQUEST['CARD_PRICE'];
        $CARD_POINTS = $_REQUEST['CARD_POINTS'];
        $CARD_METHOD = $_REQUEST['CARD_METHOD'];
        $MEM_NO = $_SESSION["MEM_NO"];
        $addPoints = "UPDATE member SET MEM_POINTS = MEM_POINTS + $CARD_POINTS WHERE MEM_NO = '$MEM_NO'";
        $pdo->exec($addPoints);
        $card_order = "INSERT INTO card_order(CARD_NO,MEM_NO,ORDER_DATETIME,CARD_PRICE,CARD_POINTS,CARD_METHOD) VALUES('$CARD_NO','$MEM_NO',CURDATE(),'$CARD_PRICE','$CARD_POINTS','$CARD_METHOD')";
        $pdo->exec($card_order);
        $sql ="select MEM_POINTS from member where MEM_NO = ".$_SESSION['MEM_NO'];
        $mem_ponints = $pdo->query($sql);

        $rows = $mem_ponints->fetch(PDO::FETCH_ASSOC);

        $_SESSION["MEM_POINTS"] = $rows['MEM_POINTS'];
        switch($CARD_METHOD){
            case 1:
                $CARD_METHOD = '信用卡';
                break;
            case 2:
                $CARD_METHOD = '超商繳費';
                break;
            case 3:
                $CARD_METHOD = '第三方支付';
                break;
            default:
                break;
        }
    ?>
    <h2> 儲值成功 </h2>
    <table class="pay_list_info">
        <tr>
            <th>會員帳戶 :</th>
            <td><?php echo $_SESSION["MEM_ID"];?></td>
        </tr>
        <tr>
            <th>儲值點數 :</th>
            <td><?php echo $CARD_POINTS;?></td>
        </tr>
        <tr>
            <th>付費方式 :</th>
            <td><?php echo $CARD_METHOD;?></td>
        </tr>
        <tr>
            <th>會員點數 :</th>
            <td><?php echo $rows['MEM_POINTS'];?></td>
        </tr>
    </table>
    <div class="a_group">
        <a class="a_pon" href="memberpoints.php">儲值紀錄</a>
        <a href="booking.php">前往預約</a>
    </div>
        
    </div>