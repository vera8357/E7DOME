



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
    <title>運動揪團</title>
    <link rel="stylesheet" href="css/group.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/font.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ"
        crossorigin="anonymous">
</head>

<body class="group-body">
    <header>
        <div class="wrapper">
            <div class="humberger_btn">
                <div class="humberger_line top"></div>
                <div class="humberger_line mid"></div>
                <div class="humberger_line bot"></div>
            </div>
            <div class="logo">
                <a href="index.php">
                    <img src="images/e7logo.png" alt=""> </a>
            </div>
            <div class="login">
                <!-- <a href="#"><img src="images/user-icon.png"></a> -->
                <a href="#">登入</a>
            </div>
            <ul>
                <li>
                    <a href="site_info.php"> 場地介紹 </a>
                </li>
                <li>
                    <a href="booking.php"> 預約場地 </a>
                </li>
                <li>
                    <a href="group.php"> 運動揪團 </a>
                </li>
                <li>
                    <a href="about.php"> 關於我們 </a>
                </li>
                <li>
                    <a href="chat-robot.php"> 諮詢專區 </a>
                </li>
            </ul>
        </div>
    </header>
    <section>
        <div class="select_bar cl-12">
            <span class="selectSport black select-width select">
                <select class="filters-select">
                    <option value="*">全部</option>
                    <option value=".1">籃球</option>
                    <option value=".2">羽毛球</option>
                    <option value=".3">保齡球</option>
                    <option value=".4">攀岩</option>
                </select>
            </span>
            <span class="selectTime black select-width select">
                <select class="filters-select">
                    <option value="*">全部</option>
                    <option value=".5">上午</option>
                    <option value=".6">下午</option>
                    <option value=".7">晚上</option>
                </select>
            </span>
            <div class="groupbtn">
                <a href="#.html"><span class="myGroup button button_a">我的揪團</span></a>
                <a href="edit-group.html"><span class="createGroup button button_a">開始揪團</span></a>
            </div>
        </div>
    </section>
    <section>
         <ul class="group-list grid">

<?php

//連線資料庫
try {
    $dsn = "mysql:host=localhost;port=3306;dbname=cd102g4;charset=utf8";
    $user = "root";
    $password = "root";
    $options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
    $pdo = new PDO($dsn, $user, $password, $options);

    $sql = "SELECT * FROM team JOIN booking ON (team.BOO_NO = booking.BOO_NO) JOIN facility ON (facility.FAC_NO = booking.FAC_NO) JOIN team_mem ON (team.team_NO = team_mem.team_NO)";
    $team = $pdo->query( $sql);

;
    $teams = $team->fetchAll(PDO::FETCH_ASSOC);
    foreach($teams as $i=>$teamsRow){
?>

            <li class="groupblock cl-3 cl-12 all <?php echo $teamsRow["FAC_NO"];?> <?php echo ($teamsRow["BOO_TIME"] + 4);?>">
                <a href="groupInfo.html">
                    <div class="group01">
                        <div class="group-img">
                            <img src="images/<?php echo $teamsRow["TEAM_IMG"];?>" alt="">
                        </div>
                        <div class="group-more">
                            更多資訊
                            <div class="more-skew">
                                >
                            </div>
                        </div>
                        <div class="group-date">
                            <span id="group-day"><?php echo substr($teamsRow["BOO_DATE"],8,2);?></span>
                            <span id="group-month"><?php echo date("M",strtotime($teamsRow["BOO_DATE"]));?></span>
                        </div>
                        <div class="group-info">
                            <div class="group-title"><?php echo $teamsRow["TEAM_NAME"];?></div>
                            <div class="group-mem">
                                揪團人數
                                <span><?php echo $teamsRow["TEAM_MEM"];?></span> /
                                <span><?php echo $teamsRow["TEAM_MEM"];?></span> 人
                            </div>
                            <div class="group-txt">
                                <?php echo $teamsRow["TEAM_INFO"];?>
                            </div>
                        </div>
                    </div>
                </a>
            </li>
     
   <?php        
    }
    echo '</table>';
} catch (PDOException $e) {
    echo "錯誤原因 : " , $e->getMessage(), "<br>";
    echo "錯誤行號 : " , $e->getLine(), "<br>"; 
}
?>
</ul>
     </section>

    <script src="libs/jquery/dist/jquery.min.js"></script>
    <script src="libs/isotope-layout/dist/isotope.pkgd.min.js"></script>
    <script>
        $(document).ready(function () {

            var $grid = $('.grid').isotope({
                itemSelector: '.groupblock',
                layoutMode: 'fitRows',
            });
            // filter functions
            var filterFns = {
                // show if number is greater than 50
                // numberGreaterThan50: function() {
                //   var number = $(this).find('.number').text();
                //   return parseInt( number, 10 ) > 50;
                // },
                // // show if name ends with -ium
                // ium: function() {
                //   var name = $(this).find('.name').text();
                //   return name.match( /ium$/ );
                // }
            };
            // bind filter on select change
            $('.filters-select').on('change', function () {
                // get filter value from option value
                var filterValue = this.value;
                // use filterFn if matches value
                filterValue = filterFns[filterValue] || filterValue;
                $grid.isotope({ filter: filterValue });
            });
        });

    </script>
    <script>
        $('.humberger_btn').click(function () {
            $(this).toggleClass('active');
        })
    </script>
</body>

</html>