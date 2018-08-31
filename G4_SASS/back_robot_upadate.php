   <?php
    require_once('php/connect_g4.php');
    $update_rob = "SELECT * FROM qustion_and_answer ORDER BY KEY_WORD_NO DESC";
    $query = $pdo->query($show_rob);
    while($row = $query->fetch(PDO::FETCH_ASSOC)){
        echo "<tr>".
        "<td>".$row['KEY_WORD_NO']."</td>".
        "<td><input type='text' name='KEY_WORD' value=".$row['KEY_WORD']."></td>".
        "<td><input type='text' name='ANSWER' value=".$row['ANSWER']."></td>".
        "<td><button class='q_change'>儲存</button></td>".
        "<td><button class='q_del'>刪除</button></td>".
        // "<td>".$row['UNSOLVED_QUESTION']."</td>".
        "</tr>";
}
 ?>