<?php
    try{
        require_once("../connect_g4.php");
        if(isset($_REQUEST["fac_name"])){
            $fac_name = $_REQUEST["fac_name"];
            $fac_desc = $_REQUEST["fac_desc"];
            $fac_points = $_REQUEST["fac_points"];
            $fac_mem = $_REQUEST["fac_mem"];
            // $fac_img = $_REQUEST["fac_img"];
            $cate_no = $_REQUEST["cate_no"];
            $sql = "INSERT INTO facility(FAC_NO,CATE_NO,FAC_NAME,FAC_DESC,FAC_MEM,FAC_POINTS)values(null,'$cate_no','$fac_name','$fac_desc','$fac_mem','$fac_points')";
            $pdo->exec($sql);
        }
        $sql = "select * from facility";
        $facility = $pdo->query( $sql);
        $facility_info = $facility->fetchAll(PDO::FETCH_ASSOC);
?>
<?php
    foreach($facility_info as $data){
?>
    <tr>
        <td>
            <?php echo $data["FAC_NO"]?>
        </td>
        <td> 
            <?php echo $data["CATE_NO"]?>
        </td>
        <td>
            <?php echo $data["FAC_NAME"]?>
        </td>
        <td>
            <?php echo $data["FAC_DESC"]?>
        </td>
        <td>
            <?php echo $data["FAC_POINTS"]?>
        </td>
        <td>
            <?php echo $data["FAC_MEM"]?>
        </td>
        <td>
        </td>
        <td>
            <select id="FAC_STATUS">
                <option value="0">上架</option>
                <option value="1">下架</option>
            </select>
        </td>
        <td><button>編輯</button></td>
    </tr>
<?php
    }
}catch(PDOException $e){
	    echo "錯誤原因 : " , $e->getMessage(), "<br>";
	    echo "錯誤行號 : " , $e->getLine(), "<br>";
    }
    // echo "yes";
?>