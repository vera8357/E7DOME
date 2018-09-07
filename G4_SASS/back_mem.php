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
    <title>Document</title>
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
                <a href="#">QRCODE掃描</a>
            </li>
            <li>
                <a href="#">預約訂單管理</a>
            </li>
            <li>
                <a href="#">點數卡商品管理</a>
            </li>
            <li>
                <a href="#">儲值紀錄</a>
            </li>
            <li>
                <a href="#">場地管理</a>
            </li>
            <li>
                <a href="#">會員管理</a>
            </li>
            <li>
                <a href="#">聊天機器人維護</a>
            </li>
            <li>
                <?php
                    if( $_SESSION['ADMIN_PERM'] == 0){
                        echo "<a href='back_admin.php'>管理員管理</a>";
                    }else{
                        echo "<a href='#' style='display:none'>管理員管理</a>";
                    }
                ?>
    
            </li>
            <li>
                    <a href="#">
                <form action="php/back_logout.php">
                    <input type="submit" value='登出'>
                </form>
               </a>
             
            </li>
        </ul>
    </div>
    <div class="back_content">
        <h2>會員管理</h2>
            <form action="#">
                <div class="search">
                    <input type="text" id="book_search" placeholder="輸入會員帳號" name="mem_search"> 
                    <button class="search_btn btn">查詢</button>
                </div>
            </form>
            <table>
                <thead>
                    <tr>
                        <th>會員編號</th>
                        <th>會員帳號</th>
                        <th>會員密碼</th>
                        <th>會員名稱</th>
                        <th>會員手機</th>
                        <th>會員點數</th>
                        <th>會員狀態</th>
                        <th>狀態更改</th>
                    </tr>
                </thead>
                <tbody>
     
                   <?php

                    try{
                        require_once("php/connect_g4.php");
                        if(isset($_REQUEST['mem_search']) == false or $_REQUEST['mem_search'] == "" ){
                            $sql ="select * from member";
                            $member = $pdo->query($sql);
                        }else{

                            $sql ="select * from member where MEM_ID = :MEM_ID";
                            $member = $pdo->prepare($sql);
                            $member->bindValue(":MEM_ID", $_REQUEST['mem_search']);
                            $member->execute();

                        }

                         while($mem = $member->fetch(PDO::FETCH_ASSOC)){
                            $NO= $mem['MEM_NO'];

                            echo "<tr>";
                            echo "<form action='php/member_alter.php'>";
                            echo "<input type='hidden' name='MEM_NO' value='".$NO."'>";
                            echo "<td>".$NO."</td>";
                            echo "<td>".$mem['MEM_ID']."</td>";
                            echo "<td>".$mem['MEM_PSW']."</td>";
                            echo "<td>".$mem['MEM_NAME']."</td>";
                            echo "<td>".$mem['MEM_PHONE']."</td>";
                            echo "<td>".$mem['MEM_POINTS']."</td>";
                            echo "<td>";
                            echo "<select name='mem_status' id='mem_status".$NO."' disabled>";
                            if($mem['MEM_STATUS'] == 0){

                                echo "<option value='0' selected>正常</option>";
                                echo "<option value='1'>停權</option>";
                            }else{
                                echo "<option value='0'>正常</option>";
                                echo "<option value='1' selected>停權</option>";
                            }
                            
                            echo "</select>";
                            echo "</td>";
                            echo " <td>";
                            echo "<input type='button' value='修改' onclick='alter_status(".$NO.")'>";
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
    <script >
        function alter_status(no){

            var mem_status = "mem_status" + no ;
            document.getElementById(mem_status).disabled=false;
        }
    </script>
</body>
</html>