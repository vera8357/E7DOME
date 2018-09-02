<?php
    try{
        require_once("../connect_g4.php");
        $change_info = $_REQUEST["change_info"];
        $sql = "select * from facility where FAC_NO = $change_info";
        $change = $pdo->query($sql);
        while($site_info = $change->fetch(PDO::FETCH_ASSOC)){
?>
            <div class="info_cap">
                <h3><?php echo $site_info["FAC_NAME"]?></h3>
                <p><?php echo $site_info["FAC_DESC"]?></p>
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