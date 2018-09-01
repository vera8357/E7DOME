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
                <a href="#">管理員管理</a>
            </li>
            <li>
                <a href="#">登出</a>
            </li>
        </ul>
    </div>
    <div class="back_content">
        <h2>點數卡商品管理</h2>
        
        <button class="btn">新增商品</button>
        <form action="back_card_add.php" method="post">           
            <table>
                <thead>
                    <tr>
                        <th>商品編號</th>
                        <th>商品名稱</th>
                        <th>商品售價</th>
                        <th>商品點數</th>
                        <th>商品狀態</th>
                    </tr>
                </thead>
                <tbody>
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
                }
                ?>
                </tbody>
            </table>
            <div id="card_add">
                <div class="card_add_content">
                    <div class="cancle"></div>
                    <h3>新增點數商品</h3>
                    <label for="card_name">商品名稱:</label>
                    <input type="text" name="card_name" id="card_name">

                    <label for="card_price">商品售價:</label>
                    <input type="text" name="card_price" id="card_price">

                    <label for="card_points">商品點數:</label>
                    <input type="text" name="card_points" id="card_points">
                    <input type="submit">
                </div>
            </div>
        </form>
    </div>
    <script>
        $('.btn').click(function(){
            $('#card_add').show();
        });
        $('.cancle').click(function(){
            $('#card_add').hide();
        });
    </script>
    
</body>
</html>