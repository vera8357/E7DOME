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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
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
        <h2>儲值紀錄</h2>
        <form action="back_card_order.php" method="POST">  
        <div class="search">
                <input type="text" placeholder="輸入會員帳號" id="search" name="search">         
        </div>
        <table>
            <thead>
                <tr>
                    <th>訂單編號</th>
                    <th>會員帳號</th>
                    <th>商品售價</th>
                    <th>商品點數</th>
                    <th>下單日期</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
        </form>
    </div>
    <script>
        $(document).ready(function(){
            $.ajax({
                url: 'back_card_order.php',
                dataType: 'text',
                tpye: 'GET',
                success: function(data) {
                    $('table tbody').append(data);    
                }
            });
            $('#search').keyup(function(){
                $.ajax({
                url: 'back_card_order.php',
                dataType: 'text',
                tpye: 'GET',
                data: {
                        search: $(this).val()
                        },
                success: function(data) {
                    $('table tbody').children().remove();    
                    $('table tbody').append(data);    
                }
            }); 
            });
        });

    </script>
</body>
</html>