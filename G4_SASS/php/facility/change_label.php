<?php
    try{
        require_once("../connect_g4.php");
        $cate_no = $_REQUEST["cate_no"];
        $fac_status = $_REQUEST["fac_status"];
        $sql = "select * from facility where CATE_NO = $cate_no and FAC_STATUS = $fac_status order by FAC_NO desc limit 3";
        $change = $pdo->query($sql);
        while($site_info = $change->fetch(PDO::FETCH_ASSOC)){
?>
        <input type="radio" id="<?php echo $site_info['FAC_NO']?>" name="check_site" value="<?php echo $site_info['FAC_NO']?>">
        <label for="<?php echo $site_info['FAC_NO']?>" class="site_label"><?php echo $site_info['FAC_NAME']?></label>
<?php
        }
    }
    catch (PDOException $e) {
        echo "錯誤原因 : " , $e->getMessage(), "<br>";
        echo "錯誤行號 : " , $e->getLine(), "<br>"; 
    }
?>