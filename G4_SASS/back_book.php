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

    <script src="libs/jquery/dist/jquery.min.js"></script>
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
        <h2>預約訂單管理</h2>
        <form action="#">
            <div class="search">
                <input type="text" id="book_search" placeholder="輸入會員帳號"> 
                <button class="search_btn btn" id="search-btn">查詢</button>
            </div>
            
            <table>
                <thead>
                    <tr>
                        <th>預約編號</th>
                        <th>會員帳號</th>
                        <th>預約場地</th>
                        <th>預約日期</th>
                        <th>預約時段</th>
                        <th>預約狀態</th>
                    </tr>
                </thead>
                <tbody id="table-query-result">

                </tbody>
            </table>
        </form>
    </div>
    
<script>

function booQuery(){
$('#search-btn').click(function(){
    var mem_no = $('#book_search').val();

    $.ajax({
        url: "php/back_bookQuery.php",
        type: 'post',
        // async: false,
        data: {MEM_NO: mem_no},
        success:function(data){
   	        $('#table-query-result').html(data);
   	    }
    });
});

}
window.addEventListener('load',booQuery);
</script>

</body>
</html>