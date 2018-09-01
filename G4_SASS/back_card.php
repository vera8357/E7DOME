<?php
    require_once('php/connect_g4.php');
    $show_card = "SELECT * FROM pointcard";
    $query = $pdo->query($show_card);
    while($row = $query->fetch(PDO::FETCH_ASSOC)){
        echo "<tr>".
        "<td>".$row['CARD_NO']."</td>".
        "<td>".$row['CARD_NAME']."</td>".
        "<td>".$row['CARD_PRICE']."</td>".
        "<td>".$row['CARD_POINTS']."</td>".
        "<td>".$row['CARD_STATUS']."</td>".
        "</tr>";
?>
