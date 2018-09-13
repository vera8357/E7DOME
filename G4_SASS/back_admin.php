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
    <title>E7DOME-後臺管理員系統</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/back.css">
    <link rel="stylesheet" href="css/font.css">
</head>
<body>
    <div class="back_nav">
        <div class="bcak_logo">
            <img src="images/e7logo.png" alt="">
            <h1>後台管理系統</h1>
        </div>
        <ul>
            <li>
                <a href="back_book.php" class="hover-a">預約訂單管理</a>
            </li>
            <li>
                <a href="back_card01.php" class="hover-a">點數卡商品管理</a>
            </li>
            <li>
                <a href="back_card_order01.php" class="hover-a">儲值紀錄</a>
            </li>
            <li>
                <a href="back_fac.php" class="hover-a">場地管理</a>
            </li>
            <li>
                <a href="back_mem.php" class="hover-a">會員管理</a>
            </li>
            <li>
                <a href="back_robot_1.php" class="hover-a">聊天機器人維護</a>
            </li>
            <li>
                <?php
                    if( $_SESSION['ADMIN_PERM'] == 0){
                        echo "<a href='back_admin.php' class='hover-a'>管理員管理</a>";
                    }else{
                        echo "<a href='#' style='display:none' class='hover-a'>管理員管理</a>";
                    }
                ?>
            </li>
            <li>
                <form action="php/back_logout.php" class="lout">
                    <input type="submit" value='登出' class="loutbtn">
                </form>
            </li>
        </ul>
    </div>
    <div class="back_content">
        <h2>管理員管理</h2>
        
            <table>
                <thead>
                    <tr>
                        <th>管理員編號</th>
                        <th>管理員帳號</th>
                        <th>管理員密碼</th>
                        <th>管理員名稱</th>
                        <th>管理員權限</th>
                        <th>管理員狀態</th>
                        <th>權限修改</th>
                    </tr>
                </thead>
                <tbody>

                    <?php

                    try{

                        require_once("php/connect_g4.php");
                        $sql ="select * from admin";
                        $admin = $pdo->query($sql);

                        while($adm = $admin->fetch(PDO::FETCH_ASSOC)){

                        $NO = $adm['ADMIN_NO'];
                        echo "<tr>";
                        echo "<form action='php/admin_alter.php'>";
                        echo "<input type='hidden' name='admin_no' value='".$NO."'>";
                        echo "<td>".$NO."</td>";
                        echo "<td>".$adm['ADMIN_ID']."</td>";
                        echo "<td>".$adm['ADMIN_PSW']."</td>";
                        echo "<td>".$adm['ADMIN_NAME']."</td>";
                        echo "<td>";
                        echo "<select name='mem_perm' id='perm".$NO."' disabled>";

                      if($adm['ADMIN_PERM'] == 0){
                         echo "<option value='0' selected>最高</option>";
                         echo "<option value='1'>一般</option>";
                      }else{
                         echo "<option value='0'>最高</option>";
                         echo "<option value='1' selected>一般</option>";
                      }
                        echo "</select>";
                        echo "</td>";
                        echo "<td>";
                        echo "<select name='mem_status' id='status".$NO."' disabled>";

                      if($adm['ADMIN_STATUS'] == 0){
                         echo "<option value='0' selected>正常</option>";
                         echo "<option value='1'>停權</option>";
                      }else{
                         echo "<option value='0'>正常</option>";
                         echo "<option value='1' selected>停權</option>";
                      }
                        echo "</select>";
                        echo "</td>";
                        echo "<td>";
                        echo "<input class='btn_alter' type='button' value='修改' onclick='alert(".$NO.")'>";
                        echo "<input type='submit' value='確認'>";
                        echo "</td>";
                        echo "</form>";
                        echo "</tr>";

                        }

                    }catch(PDOException $e){
                        echo $e->getMessage();
                    }

                    
                    ?>
                     

               
                </tbody>
            </table>
       
    </div>
    <script src="js/back_admin.js"></script>
</body>
</html>