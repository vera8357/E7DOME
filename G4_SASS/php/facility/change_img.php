<?php
    try{
        require_once("../connect_g4.php");
        $cate_no = $_REQUEST["cate_no"];
        $fac_status = $_REQUEST["fac_status"];
        $sql = "select * from facility where CATE_NO = $cate_no and FAC_STATUS = $fac_status order by FAC_NO limit 3";
        $change = $pdo->query($sql);
        while($site_info = $change->fetch(PDO::FETCH_ASSOC)){
?>
        <li class="slider_li">
            <img src="images/fac_img/<?php echo $site_info['FAC_IMG1']?>" alt="">
        </li>
<?php
        }
    }
    catch (PDOException $e) {
        echo "錯誤原因 : " , $e->getMessage(), "<br>";
        echo "錯誤行號 : " , $e->getLine(), "<br>"; 
    }
?>