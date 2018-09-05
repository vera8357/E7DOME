<?php  
try {
    include("php/connect_g4.php");
    if(!isset($_GET['TEAM_NO'])){
    //沒有pid則直接跳轉回products.php
    header("location: group.php");
    }else{
    $TEAM_NO=$_GET['TEAM_NO'];
}
    $sql = "SELECT * FROM team JOIN booking ON (team.BOO_NO = booking.BOO_NO) JOIN facility ON (facility.FAC_NO = booking.FAC_NO) JOIN member ON (team.MEM_NO = member.MEM_NO)  WHERE team.TEAM_NO=$TEAM_NO";
    $team = $pdo->query( $sql);
    $teams = $team->fetchAll(PDO::FETCH_ASSOC);
    foreach($teams as $i=>$teamsRow){
?>

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
        <?php include 'header.php';?>
    </header>
    <div class="group-details">
    </div>
    
    <section class="group-info-section">
        <div class="group-wrapper">
            <div class="first-wrapper">
                <div class="group-info-image">
                    <img src="images/<?php echo $teamsRow["TEAM_IMG"];?>" alt="">
                </div>
                <div class="group-details">
                    <div><span class="group-info-title"><?php echo $teamsRow["TEAM_NAME"];?></span>

                <?php
                    $TEAM_NO=$teamsRow['TEAM_NO'];
                    $sql = "SELECT * FROM team_mem JOIN team ON (team_mem.TEAM_NO = team.TEAM_NO) JOIN member ON (team_mem.MEM_NO = member.MEM_NO)  WHERE team_mem.TEAM_NO=$TEAM_NO ";

                    $teams = $team->fetchAll(PDO::FETCH_ASSOC);
                    $team_mem = $pdo->query( $sql);
                    ?>
                    <span class="group-owner">
                    主揪人：
                    <?php echo $teamsRow["MEM_NAME"];?>
                    </span></div>
                    <div class="group-txt">
                        <?php echo $teamsRow["TEAM_INFO"];?>
                    </div>
                    <div id="order-date">
                        預約日期：<span><?php echo $teamsRow["BOO_DATETIME"];?> <span></span></span>
                    </div>
                    <div class="group-mem">
                        揪團人數
                        <span>
                            <?php
    
                            $sql ="SELECT * FROM team_mem WHERE TEAM_NO = '$TEAM_NO'";
                            $teammem = $pdo->prepare( $sql);
                            $teammem->execute(); 
                            $rows = $teammem->rowCount();//計算抓到幾筆資料
                            echo $rows+1;//揪團人數+1(團長)
                            ?>
                            </span> /
                        <span><?php echo $teamsRow["TEAM_MEM"];?></span> 人
                    </div>
                    <div id="order-place">
                        場地：<span><?php echo $teamsRow["FAC_NAME"];?></span>
                    </div>
                    <?php
                    $MEM_NO=$teamsRow['MEM_NO'];
                    $sql = "SELECT * FROM team_mem JOIN team ON (team_mem.TEAM_NO = team.TEAM_NO) JOIN member ON (team_mem.MEM_NO = member.MEM_NO)  WHERE team_mem.MEM_NO=$MEM_NO ";
                    ?>
                    <div id="group-mem-list">
                        <div class="mem-head" id="mem-head1"><img src="images/<?php echo $teamsRow["MEM_IMG"];?>" alt=""></div>
                        <div class="line"></div>
                    <?php
                    $sql = "SELECT * FROM team_mem JOIN team ON (team_mem.TEAM_NO = team.TEAM_NO) JOIN member ON (team_mem.MEM_NO = member.MEM_NO)  WHERE team_mem.TEAM_NO=$TEAM_NO ";
                    $team_mem = $pdo->query( $sql);
                    foreach($team_mem as $e=>$memRow){
                    ?>
                        <div class="mem-head" id="mem-head1"><img src="images/<?php echo $memRow["MEM_IMG"];?>" alt=""></div>
                    <?php
                    }
                    ?>
                    </div>
                    <hr class="group-hr">
                    <div class="icon_area">
                        <div class="button join-button" id="join">
                            我要參團
                        </div>
                        <!-- <span class="icon"> -->
                            <img src="images/unlike.png" class="icon fb-share-button" id="heart" title="加入收藏">
                                    <a href="javascript:void(0);" onclick="window.open('http://www.facebook.com/sharer/sharer.php?u='+fbhtml_url+'&src=sdkpreparse');return false;" class="icon-a">
                                        <img src="images/share.png" class="icon">

                                </a>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <?php
    }
    ?>
    <?php
                    
                    ?>


    <section class="forum-wrapper">
        <div class="group-box1"></div>
        <div class="forum-box1"></div>
        <div class="forum-board">

            <div class="forum-title">討論區</div>
    <div class="forum">
        <div class="forum-border">

            <ul >
    <?php  
    $sql = "SELECT * FROM team_msg JOIN team ON (team_msg.TEAM_NO = team.TEAM_NO) JOIN member ON (team_msg.MEM_NO = member.MEM_NO) WHERE team_msg.TEAM_NO=$TEAM_NO ORDER BY MSG_DATE ASC";
    $team = $pdo->query( $sql);
    $teams = $team->fetchAll(PDO::FETCH_ASSOC);
    foreach($teams as $i=>$teamsRow){
    ?>
                <li class="message-box">
                    <div class="mem-head01">
                        <img src="images/<?php echo $teamsRow["MEM_IMG"];?>" alt="">
                    </div>
                    <div class="mem-id">
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

          var fbhtml_url=window.location.toString();

    function init() {
        var submit = document.getElementById("submit");
        submit.addEventListener("click", submitPost, false);
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