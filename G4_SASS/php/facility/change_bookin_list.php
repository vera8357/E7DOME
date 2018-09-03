<?php
    try{
        require_once("../connect_g4.php");
        $fac_no = $_REQUEST["fac_no"];
        $sql = "select b.BOO_NOTETIME,b.BOO_NOTE,b.BOO_RANK,m.MEM_NAME,m.MEM_IMG from booking as b left outer join member as m on b.mem_no = m.mem_no where b.fac_no = $fac_no";
        $change = $pdo->query($sql);
        while($site_info = $change->fetch(PDO::FETCH_ASSOC)){
?> 
    <tr>
        <td>
            <img src='http://fakeimg.pl/200x200?font=lobster' alt=''/>
        </td>
        <td>
            <?php echo $site_info['MEM_NAME']?>
        </td>
        <td>
            <span class="rank">
                <?php
                    $star ='';
                    for($i = 0; $i<$site_info['BOO_RANK'] ; $i++){
                        $star = $star."★";
                    }
                    echo $star;
                ?>
            </span><br>
            <?php echo $site_info['BOO_NOTE']?>
        </td>
        <td>
            <?php echo $site_info['BOO_NOTETIME']?>
        </td>
    </tr>
<?php
        }
    }
    catch (PDOException $e) {
        echo "錯誤原因 : " , $e->getMessage(), "<br>";
        echo "錯誤行號 : " , $e->getLine(), "<br>"; 
    }
?>