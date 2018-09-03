<?php
    $upfac_no = $_REQUEST["upfac_no"];
    // $upfac_status = $_REQUEST["upfac_status"];
    try{
        require_once("../connect_g4.php");
        $sql = "select * from facility where FAC_NO = $upfac_no";
        $upfac = $pdo->query($sql);
        $upfac = $upfac->fetch(PDO::FETCH_ASSOC);
        if($upfac["FAC_STATUS"]==1){
            $sql = "update facility set FAC_STATUS = :fac_status where FAC_NO = :fac_no";
            $upfacStu = $pdo->prepare($sql);
            $upfacStu->bindValue(':fac_no',$upfac_no);
            $upfacStu->bindValue(':fac_status',0);
            $upfacStu->execute();
            echo "修改成功";
        }else{
            $sql = "update facility set FAC_STATUS = :fac_status where FAC_NO = :fac_no";
            $upfacStu = $pdo->prepare($sql);
            $upfacStu->bindValue(':fac_no',$upfac_no);
            $upfacStu->bindValue(':fac_status',1);
            $upfacStu->execute();
            echo "修改成功";
        }
    }
    catch (PDOException $e) {
    echo "錯誤原因 : " , $e->getMessage(), "<br>";
    echo "錯誤行號 : " , $e->getLine(), "<br>"; 
    }
?>