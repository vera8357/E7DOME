<?php
try {
    require_once("connect_g4.php");
    $sql = "select * from facility";
    $site = $pdo->query( $sql);
    $site = $site->fetchAll(PDO::FETCH_ASSOC);
    while($prodRow = $site->fetch(PDO::FETCH_ASSOC)){
?>
    <h3><?php echo $FAC_NAME?></h3>
    <p><?php echo $FAC_DESC?></p>
    <p>費用：<?php echo $FAC_POINT?>點/小時</p>
    <p>建議人數：<?php echo $FAC_MEM?>人</p>
<?php 
    }
} catch (PDOException $e) {
echo "錯誤原因 : " , $e->getMessage(), "<br>";
echo "錯誤行號 : " , $e->getLine(), "<br>"; 
}
?>
