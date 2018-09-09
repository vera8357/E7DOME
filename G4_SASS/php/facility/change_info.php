<?php
    try{
        require_once("../connect_g4.php");
        $fac_no = $_REQUEST["fac_no"];
        $sql = "select * from facility where FAC_NO = $fac_no";
        $change = $pdo->query($sql);
        while($site_info = $change->fetch(PDO::FETCH_ASSOC)){
?>
            <div class="info_cap">
                <h3><?php echo $site_info["FAC_NAME"]?></h3>
                <p class="info_desc"><?php echo $site_info["FAC_DESC"]?></p>
                <p>費用：<?php echo $site_info["FAC_POINTS"]?>點/小時</p>
                <p>建議人數：<?php echo $site_info["FAC_MEM"]?>人</p>
            </div>
<?php            
        }
    }
    catch (PDOException $e) {
        echo "錯誤原因 : " , $e->getMessage(), "<br>";
        echo "錯誤行號 : " , $e->getLine(), "<br>"; 
    }

?>