<?php
    ob_start();
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>創立揪團</title>
</head>
<body>
    <form action="creatFinish.php" method="post">
    <?php
        // $book_no=$_POST['BOO_NO'];
        // $mem_no=$_SESSION["MEM_NO"];
        $book_no=1;
        require_once("connect_g4.php");
        $team_mem = "SELECT FAC.FAC_MEM FROM booking book JOIN facility fac ON book.FAC_NO = fac.FAC_NO WHERE book.BOO_NO = '$book_no'";
        $team_memquery = $pdo->query($team_mem);
        $team_row = $team_memquery->fetch(PDO::FETCH_ASSOC);
        echo $team_row['FAC_MEM'];
        echo '<input type="hidden" name="BOO_NO" value='.$book_no.'>';//book編號

        echo '<label for="">揪團名稱:</label>';
        echo '<input type="text" name="TEAM_NAME" minlength="3" maxlength="10" required>';//揪團名稱

        echo '<label for="">揪團簡介:</label>';
        echo '<textarea name="TEAM_INFO" id="" cols="30" rows="10" required></textarea>';//揪團簡介

        echo '<label for="">揪團人數:</label>';//揪團人數
        echo '<select name="TEAM_MEM" id="" required>';
        for($i=1; $i<$team_row['FAC_MEM']; $i++){
            echo '<option value="'.$i.'">'.$i.'</option>';
        }
        echo '</select>';

        echo '<label for="">揪團照片:</label>';//揪團照片
        echo'<input type="file" name="TEAM_IMG" id="">';
        ?>
        <input type="submit" value="送出">
    </form>
 
</body>
</html>