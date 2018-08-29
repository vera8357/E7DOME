                 <?php
                    require_once('php/connect_g4.php');
                    if(isset($_REQUEST['search'])){
                        $ans = $_REQUEST['search'];
                        if($ans!='')
                        $sql = "SELECT co.ORDER_NO, mem.MEM_NAME, pc.CARD_PRICE, pc.CARD_POINTS, co.ORDER_DATETIME FROM card_order co left outer join pointcard pc on co.CARD_NO = pc.CARD_NO left outer join member mem on co.MEM_NO = mem.MEM_NO where mem.MEM_NAME LIKE '%$ans%'";
                        else
                            $sql = "SELECT co.ORDER_NO, mem.MEM_NAME, pc.CARD_PRICE, pc.CARD_POINTS, co.ORDER_DATETIME FROM card_order co left outer join pointcard pc on co.CARD_NO = pc.CARD_NO left outer join member mem on co.MEM_NO = mem.MEM_NO";
                    }
                    else{
                        $sql = "SELECT co.ORDER_NO, mem.MEM_NAME, pc.CARD_PRICE, pc.CARD_POINTS, co.ORDER_DATETIME FROM card_order co left outer join pointcard pc on co.CARD_NO = pc.CARD_NO left outer join member mem on co.MEM_NO = mem.MEM_NO";
                    }                  
                    $query = $pdo->query($sql);
                    while($row = $query->fetch(PDO::FETCH_ASSOC)){
                        echo "<tr>".
                        "<td>".$row['ORDER_NO']."</td>".
                        "<td>".$row['MEM_NAME']."</td>".
                        "<td>".$row['CARD_PRICE']."</td>".
                        "<td>".$row['CARD_POINTS']."</td>".
                        "<td>".$row['ORDER_DATETIME']."</td>".
                        "</tr>";
                    }
                    ?>