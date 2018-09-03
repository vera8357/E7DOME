<<<<<<< HEAD

<?php  
try {
    $dsn = "mysql:host=localhost;port=3306;dbname=cd102g4;charset=utf8";
    $user = "root";
    $password = "root";
    $options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
    $pdo = new PDO($dsn, $user, $password, $options);
    if(!isset($_GET['TEAM_NO'])){
    //沒有pid則直接跳轉回products.php
    header("location: group.php");
    }else{
    $TEAM_NO=$_GET['TEAM_NO'];
}
    $sql = "SELECT * FROM team JOIN booking ON (team.BOO_NO = booking.BOO_NO) JOIN facility ON (facility.FAC_NO = booking.FAC_NO) JOIN team_mem ON (team.TEAM_NO = team_mem.TEAM_NO) WHERE team.TEAM_NO=$TEAM_NO";
    $team = $pdo->query( $sql);
    $teams = $team->fetchAll(PDO::FETCH_ASSOC);
    foreach($teams as $i=>$teamsRow){

?>



=======
>>>>>>> upstream/G4-1
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/groupInfo.css">
    <link rel="stylesheet" href="css/group.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/font.css">
    <title>中大籃球火</title>
    <style type="text/css" media="screen">
    ul {}
    </style>
</head>

<body>
    <header>
        <div class="wrapper">
            <div class="humberger_btn">
                <div class="humberger_line top"></div>
                <div class="humberger_line mid"></div>
                <div class="humberger_line bot"></div>
            </div>
            <div class="logo">
                <a href="index.html">
                    <img src="images/e7logo.png" alt=""> </a>
            </div>
            <div class="login">
                <!-- <a href="#"><img src="images/user-icon.png"></a> -->
                <a href="#">登入</a>
            </div>
            <ul>
                <li>
<<<<<<< HEAD
                    <a href="#"> 場地介紹 </a>
=======
                    <a href="site_info.php"> 場地介紹 </a>
>>>>>>> upstream/G4-1
                </li>
                <li>
                    <a href="booking.html"> 預約場地 </a>
                </li>
                <li>
                    <a href="group.html"> 運動揪團 </a>
                </li>
                <li>
                    <a href="about.html"> 關於我們 </a>
                </li>
                <li>
                    <a href="chat-robot.html"> 諮詢專區 </a>
                </li>
            </ul>
        </div>
    </header>
    <section class="group-info-section">
        <div class="group-wrapper">
            <div class="first-wrapper">
                <div class="group-info-image">
<<<<<<< HEAD
                    <img src="images/<?php echo $teamsRow["TEAM_IMG"];?>" alt="">
                </div>
                <div class="group-details">
                    <div><span class="group-info-title"><?php echo $teamsRow["TEAM_NAME"];?></span><span class="group-owner">主揪人：<?php echo $teamsRow["MEM_NAME"];?></span></div>
                    <div class="group-txt">
                        <?php echo $teamsRow["TEAM_INFO"];?>
                    </div>
                    <div id="order-date">
                        預約日期：<span><?php echo $teamsRow["BOO_TIME"];?> <span></span></span>
=======
                    <img src="images/grouptitle.png" alt="">
                </div>
                <div class="group-details">
                    <div><span class="group-info-title">中大籃球火</span><span class="group-owner">主揪人：小遙</span></div>
                    <div class="group-txt">
                        Lorem ipsum dolor sit amet.
                    </div>
                    <div id="order-date">
                        預約日期：<span>2018/08/23 <span>16:00</span></span>
>>>>>>> upstream/G4-1
                    </div>
                    <div class="group-mem">
                        揪團人數
                        <span>3</span> /
<<<<<<< HEAD
                        <span><?php echo $teamsRow["TEAM_MEM"];?></span> 人
                    </div>
                    <div id="order-place">
                        場地：<span><?php echo $teamsRow["FAC_NAME"];?></span>
=======
                        <span>6</span> 人
                    </div>
                    <div id="order-place">
                        場地：<span>室內籃球場A</span>
>>>>>>> upstream/G4-1
                    </div>
                    <div id="group-mem-list">
                        <div class="mem-head" id="mem-head1"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRXjEvEiGoERw9vOMfGBiA9E9HmbEB0lw1ui7WM8RwBpxfrsSiM" alt=""></div>
                        <div class="line"></div>
                        <div class="mem-head" id="mem-head2"><img src="https://static-s.aa-cdn.net/img/ios/915308148/170f1f888a7c53a1650c585a796fc598?v=1" alt=""></div>
                        <div class="mem-head" id="memHead3">
                            <img src="images/user-icon.png" >
                        </div>
                        <div class="mem-head" id="memHead4">
                            <img src="" alt="">
                        </div>
                    </div>
                    <hr class="group-hr">
                    <div class="icon_area">
                        <div class="button join-button" id="join">
                            我要參團
                        </div>
                        <!-- <span class="icon"> -->
                            <img src="images/unlike.png" class="icon fb-share-button" id="heart" title="加入收藏">
<<<<<<< HEAD
                                    <a href="javascript:void(0);" onclick="window.open('http://www.facebook.com/sharer/sharer.php?u='+fbhtml_url+'&src=sdkpreparse');return false;" class="icon-a">
                                        <img src="images/share.png" class="icon">

=======
                               
                                    <a href="javascript:void(0);" onclick="window.open('http://www.facebook.com/sharer/sharer.php?u='+fbhtml_url+'&src=sdkpreparse');return false;" class="icon-a">
                                        <img src="images/share.png" class="icon">

                                    
>>>>>>> upstream/G4-1
                                </a>
                    </div>
                </div>
            </div>
        </div>

    </section>
<<<<<<< HEAD
    <?php
    }
    ?>
    


=======
    
>>>>>>> upstream/G4-1
    <section class="forum-wrapper">
        <div class="group-box1"></div>
        <div class="forum-box1"></div>
        <div class="forum-board">

            <div class="forum-title">討論區</div>
    <div class="forum">
        <div class="forum-border">

            <ul >
<<<<<<< HEAD
    <?php  
    $sql = "SELECT * FROM team_msg JOIN team ON (team_msg.TEAM_NO = team.TEAM_NO) JOIN member ON (team_msg.MEM_NO = member.MEM_NO) WHERE team_msg.TEAM_NO=$TEAM_NO ORDER BY MSG_DATE ASC";
    $team = $pdo->query( $sql);
    $teams = $team->fetchAll(PDO::FETCH_ASSOC);
    foreach($teams as $i=>$teamsRow){
    ?>
=======
>>>>>>> upstream/G4-1
                <li class="message-box">
                    <div class="mem-head01">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRXjEvEiGoERw9vOMfGBiA9E9HmbEB0lw1ui7WM8RwBpxfrsSiM" alt="">
                    </div>
                    <div class="mem-id">
<<<<<<< HEAD
                        <?php echo $teamsRow["MEM_NAME"];?>
                    </div>
                    <div class="message">
                        <p><?php echo $teamsRow["MSG_INFO"];?>
                        </p>
                    </div>
                    <div class="message-time">
                        <span><?php echo $teamsRow["MSG_DATE"];?></span>
                    </div>
                </li>
     <?php
    }
    }
 catch (PDOException $e) {
    echo "錯誤原因 : " , $e->getMessage(), "<br>";
    echo "錯誤行號 : " , $e->getLine(), "<br>";
}
?>
            </ul>
            </div>
            <div class="message-box01">
                <div id="MEM-NO">
                    2
                </div>
                <textarea name="" id="MSG-INFO"></textarea>
                <div class=" submit button" id="submit">送出
                </div>
            </div>
       </div>
    </section>
    <script src="libs/jquery/dist/jquery.min.js"></script>
    <script src="js/msgPost.js"></script>
    <script>


}

=======
                        小遙
                    </div>
                    <div class="message">
                        <p>大家一起來運動!
                            <br> ヽ(∀ﾟ )人(ﾟ∀ﾟ)人( ﾟ∀)人(∀ﾟ )人(ﾟ∀ﾟ)人( ﾟ∀)ﾉ
                        </p>
                    </div>
                    <div class="message-time">
                        <span>2018/08/23 10:29</span>
                    </div>
                </li>
                <li class="message-box">
                    <div class="mem-head01">
                        <img src="https://static-s.aa-cdn.net/img/ios/915308148/170f1f888a7c53a1650c585a796fc598?v=1" alt="">
                    </div>
                    <div class="mem-id">
                        小拉
                    </div>
                    <div class="message">
                        <p>有沒有不用動的運動???_(:з」∠)_
                        </p>
                    </div>
                    <div class="message-time">
                        <span>2018/08/23 12:29</span>
                    </div>
                </li>
                <li class="message-box">
                    <div class="mem-head01">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQYs5zhb1TEbjQxZmQPajtHh5_CselWcqmWMr_3-wqDeIS6bzBg" alt="">
                    </div>
                    <div class="mem-id">
                        小傑
                    </div>
                    <div class="message">
                        <p>+1+1 d(d＇∀＇)
                        </p>
                    </div>
                    <div class="message-time">
                        <span>2018/08/23 12:35</span>
                    </div>
                </li>
                <li class="message-box">
                    <div class="mem-head01">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQYs5zhb1TEbjQxZmQPajtHh5_CselWcqmWMr_3-wqDeIS6bzBg" alt="">
                    </div>
                    <div class="mem-id">
                        小傑
                    </div>
                    <div class="message">
                        <p>+1+1 d(d＇∀＇)
                        </p>
                    </div>
                    <div class="message-time">
                        <span>2018/08/23 12:35</span>
                    </div>
                </li>
                <li class="message-box">
                    <div class="mem-head01">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQYs5zhb1TEbjQxZmQPajtHh5_CselWcqmWMr_3-wqDeIS6bzBg" alt="">
                    </div>
                    <div class="mem-id">
                        小傑
                    </div>
                    <div class="message">
                        <p>+1+1 d(d＇∀＇)
                        </p>
                    </div>
                    <div class="message-time">
                        <span>2018/08/23 12:35</span>
                    </div>
                </li>
            </ul>
            </div>
            <div class="message-box01">
                <textarea name=""></textarea>
                <div class=" submit button">送出
                </div>
            </div>

       </div>
    </section>
    <script src="libs/jquery/dist/jquery.min.js"></script>
    <script>


>>>>>>> upstream/G4-1

        //收藏↓
    function switchFavorite() {
        var heart = document.getElementById("heart");
        if (heart.title === "加入收藏") {
            heart.src = "images/unlike.png";
            heart.title = "取消收藏";
        } else {
            heart.src = "images/like.png";
            heart.title = "加入收藏";
        }

    }


    

    //     //

    function switchMember() {
        var join = document.getElementById("join");
        var memHead3 = document.getElementById("memHead3");
        if (join.innerHTML === "我要參團") {
            memHead3.src = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQYs5zhb1TEbjQxZmQPajtHh5_CselWcqmWMr_3-wqDeIS6bzBg";
            join.innerHTML = "我要退團";
        } else {
            memHead3.src = "images/user-icon.png";
            join.innerHTML = "我要參團";
        }

    }

<<<<<<< HEAD
          var fbhtml_url=window.location.toString();

    function init() {
        var submit = document.getElementById("submit");
        submit.addEventListener("click", submitPost, false);
=======
          var fbhtml_url=window.location.toString(); 

    function init() {
        
>>>>>>> upstream/G4-1
        //設定[加入收藏 或 取消收藏]的點按事件
        var join = document.getElementById("join");
        //heart.onclick = switchFavorite;
        join.addEventListener("click", switchMember, false);
        var heart = document.getElementById("heart");
        //heart.onclick = switchFavorite;
        heart.addEventListener("click", switchFavorite, false);
    } init

    window.onload = init;
    </script>
    <script>
        $('.humberger_btn').click(function () {
            $(this).toggleClass('active');
        })
    </script>
</body>

</html>