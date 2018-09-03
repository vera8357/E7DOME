   <?php
    require_once('php/connect_g4.php');
    $add_rob = "insert into qustion_and_answer(KEY_WORD,ANSWER,UNSOLVED_QUESTION) VALUES('','','')";
    $pdo->exec($add_rob); 
 ?>