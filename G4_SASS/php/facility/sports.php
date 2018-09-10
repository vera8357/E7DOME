<?php
try {
    require_once("../connect_g4.php");
    $cate_no = $_REQUEST["cate_no"];
    $fac_status = $_REQUEST["fac_status"];
    $sql = "select * from facility where CATE_NO = $cate_no and FAC_STATUS = $fac_status order by FAC_NO desc limit 3";
    $site = $pdo->query( $sql);
    while($site_info = $site->fetch(PDO::FETCH_ASSOC)){
?>   
    <div class="site_item">
        <input type="hidden" name="" value="<?php echo $site_info["FAC_NO"]?>">
        <div class="site_item_img">
            <img src="images/sport/<?php echo $site_info["FAC_IMG1"]?>" alt="">
        </div>
        <div class="site_button">
            <?php echo $site_info["FAC_NAME"]?>
            <div class="button_border"></div>
        </div>
    </div>
<?php 
    }
} catch (PDOException $e) {
echo "錯誤原因 : " , $e->getMessage(), "<br>";
echo "錯誤行號 : " , $e->getLine(), "<br>"; 
}
?>
