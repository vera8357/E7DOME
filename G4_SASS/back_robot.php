   <?php
    require_once('php/connect_g4.php');
       if(isset($_REQUEST['DEl_KEY_WORD_NO'])){
        $DEL_NO = $_REQUEST['DEl_KEY_WORD_NO'];
        $del_rob = " DELETE FROM qustion_and_answer WHERE KEY_WORD_NO = $DEL_NO ";
        $pdo->exec($del_rob);
    }
    
    if(isset($_REQUEST['KEY_WORD_NO'])){
        $KEY_WORD_NO =  $_REQUEST['KEY_WORD_NO'];
        $KEY_WORD = $_REQUEST['KEY_WORD'];
        $ANSWER = $_REQUEST['ANSWER'];
        $update_rob = "UPDATE qustion_and_answer SET KEY_WORD = '$KEY_WORD',ANSWER = '$ANSWER' where KEY_WORD_NO = '$KEY_WORD_NO'";
        $pdo->exec($update_rob);
    }
        $show_rob = "SELECT * FROM qustion_and_answer WHERE UNSOLVED_QUESTION IS NOT NULL ORDER BY KEY_WORD_NO DESC";
        $query = $pdo->query($show_rob);
        while($row = $query->fetch(PDO::FETCH_ASSOC)){
        echo 
        "<tr>".
        "<td>".$row['KEY_WORD_NO']."</td>".
        "<td>".$row['UNSOLVED_QUESTION']."</td>".
        "<td><input value=".$row['KEY_WORD']."></td>".
        "<td><input value=".$row['ANSWER']."></td>".
        "<td><button class='q_change'>儲存</button></td>".
        "<td><button class='q_del'>刪除</button></td>".
        "</tr>";
        }
    
 ?>