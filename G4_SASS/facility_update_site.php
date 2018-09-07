<?php
try{
    require_once("php/connect_g4.php");
    if( file_exists("images/sport//")===false){
        mkdir("images/sport//");
    }
    $from = $_FILES['facimg']['tmp_name'];
    $to = "images/sport//" . $_FILES['facimg']['name'];
    if(copy( $from, $to)){
        echo "上傳成功<br>";
        $fac_no = $_REQUEST["upfac_no"];
        $fac_desc = $_REQUEST["upfac_desc"];
        $fac_mem = $_REQUEST["upfac_mem"];
        $facimg = $_FILES["facimg"]["name"];
        // $sql = "INSERT INTO facility(FAC_NO,CATE_NO,FAC_NAME,FAC_DESC,FAC_MEM,FAC_POINTS,FAC_IMG1,FAC_STATUS)values(null,'$cate_no','$fac_name','$fac_desc','$fac_mem','$fac_points','$facimg','0')";
        $sql = "UPDATE facility set FAC_DESC = $fac_desc,FAC_MEM = $fac_mem,FAC_IMG1 = $fac_img where FAC_NO = $fac_no";
        $pdo->exec($sql);
        header("location:back_fac.html");
    }
    // break;
}catch(PDOException $e){
	    echo "錯誤原因 : " , $e->getMessage(), "<br>";
	    echo "錯誤行號 : " , $e->getLine(), "<br>";
    }
    // echo "yes";
?>