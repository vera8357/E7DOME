<?php
    try{
        require_once("../connect_g4.php");
        





        
        // if(isset($_REQUEST["upfac_no"])){
        //     $upfac_no = $_REQUEST["upfac_no"];
        //     $upfac_desc = $_REQUEST["upfac_desc"];
        //     $upfac_mem = $_REQUEST["upfac_mem"];
        //     // $upfac_img = $_REQUEST["upfac_img"];
        //     // echo $upfac_no,$upfac_desc,$upfac_mem;
        //     $sql2 = "UPDATE facility set FAC_DESC = '$upfac_desc', FAC_MEM = $upfac_mem where FAC_NO = $upfac_no";
        //     $upfac = $pdo->exec($sql2);
            
        // }
        $sql = "select * from facility";
        $facility = $pdo->query( $sql);
        $facility_info = $facility->fetchAll(PDO::FETCH_ASSOC);

        foreach($facility_info as $data){
            if($data["CATE_NO"]==1){
                $data["CATE_NO"]="籃球場";
            }elseif($data["CATE_NO"]==2){
                $data["CATE_NO"]="保齡球場";
            }elseif($data["CATE_NO"]==3){
                $data["CATE_NO"]="羽球場";
            }elseif($data["CATE_NO"]==4){
                $data["CATE_NO"]="攀岩場";
            };
            if($data["FAC_STATUS"]==0){
                $data["FAC_STATUS"]="下架";
            }elseif($data["FAC_STATUS"]==1){
                $data["FAC_STATUS"]="上架";
            };
?>
        
        <tr>
            <td>
                <input type="hidden" name="upfac_no" value="<?php echo $data["FAC_NO"]?>">
                <?php echo $data["FAC_NO"]?>
            </td>
            <td> 
                <?php echo $data["CATE_NO"]?>
            </td>
            <td>
                <?php echo $data["FAC_NAME"]?>
            </td>
            <td>
                <textarea name="upfac_desc" class="tb_facdesc" cols="30" rows="7"><?php echo $data["FAC_DESC"]?></textarea>
            </td>
            <td>
                <?php echo $data["FAC_POINTS"]?>
            </td>
            <td>
                <input type="number" name="upfac_mem" class="tb_facmem" value="<?php echo $data["FAC_MEM"]?>">
            </td>
            <td class="td_img">
                <label id="update_img">
                    <input type="file" name="facimg" class="file"><img src="images/sport/<?php echo $data["FAC_IMG1"]?>" id="upimg">
                </label>
            </td>
            <td>
                <button class="update_status"><?php echo $data["FAC_STATUS"]?></button>
            </td>
            <td>
                <!-- <button class="update">修改</button> -->
                <input type="submit" value="修改" >
            </td>
        </tr> 
<?php
    }
}catch(PDOException $e){
	    echo "錯誤原因 : " , $e->getMessage(), "<br>";
	    echo "錯誤行號 : " , $e->getLine(), "<br>";
    }
    // echo "yes";
?>