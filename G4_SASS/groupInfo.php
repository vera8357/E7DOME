
<?php


try {
    include("php/connect_g4.php");
    if(!isset($_GET['TEAM_NO'])){
    header("location: group.php");
    }else{
    $TEAM_NO= $_GET['TEAM_NO'];
}


    $sql = "SELECT * FROM team JOIN booking ON (team.BOO_NO = booking.BOO_NO) JOIN facility ON (facility.FAC_NO = booking.FAC_NO) JOIN member ON (team.MEM_NO = member.MEM_NO)  WHERE team.TEAM_NO = $TEAM_NO";
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
                        預約日期： <span><?php echo $teamsRow["BOO_DATE"];?> <span></span></span>
                    </div>
                    <div class="group-mem">
                        揪團人數：
                        <span>
                            <?php
    
                            $sql ="SELECT * FROM team_mem WHERE TEAM_NO = '$TEAM_NO'";
                            $teammem = $pdo->prepare( $sql);
                            $teammem->execute(); 
                            $rows = $teammem->rowCount();//計算抓到幾筆資料
                            echo $rows+1;//揪團人數+1(團長)
                            ?>
                            </span>  /
                        <span><?php echo $teamsRow["TEAM_MEM"];?></span> 人
                    </div>
                    <div id="order-place">
                    預約場地： <span><?php echo $teamsRow["FAC_NAME"];?></span>
                    </div>
                    <?php
                    $MEM_NO=$teamsRow['MEM_NO'];
                    $sql = "SELECT * FROM team_mem JOIN team ON (team_mem.TEAM_NO = team.TEAM_NO) JOIN member ON (team_mem.MEM_NO = member.MEM_NO)  WHERE team_mem.MEM_NO=$MEM_NO ";
                    ?>
                    <div id="group-mem-list">
                        <div class="mem-head" id="mem-head1"><img src="images/<?php echo $teamsRow["MEM_IMG"];?>" alt=""></div>
                        <div class="line"></div>
                    <?php
                    $sql = "SELECT * FROM team_mem JOIN team ON (team_mem.TEAM_NO = team.TEAM_NO) JOIN member ON (team_mem.MEM_NO = member.MEM_NO)  WHERE team_mem.TEAM_NO=$TEAM_NO ORDER BY TEAM_MEM_NO ASC";
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
                        <?php include("php/memBn_check.php"); ?>
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
    <section class="forum-wrapper">
        <div class="group-box1"></div>
        <div class="forum-box1"></div>
        <div class="forum-board">

            <div class="forum-title">討論區</div>
    <div class="forum">
        <div class="forum-border" id="forum-border">

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
                        <p>
                            <?php 
                            $MSG_INFO = htmlspecialchars ($teamsRow["MSG_INFO"]); 
                            echo $MSG_INFO;
                            ?>
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
    <form action="php/submitMsg.php" method="get" class="messageForm" id="messageForm" name="messageForm" onclick="return checkMsg()">
            <div class="message-box01">
                <div id="MEM-NO">
                </div>
                <textarea name="MSG_INFO" id="MSG_INFO"></textarea>
                <input type="hidden" name="TEAM_NO" value="<?php echo $TEAM_NO ?>">
                <button type="submit" class="submit button" id="submit">送出</div>
            </button>
    </form>
    </div>

    </section>
    <script src="libs/jquery/dist/jquery.min.js"></script>
    <script src="js/groupinfo.js"></script>


    <script>

        $('.humberger_btn').click(function () {
            $(this).toggleClass('active');
        });

        var myDiv = document.getElementById('forum-border');
        myDiv.scrollTop = myDiv.scrollHeight;


    </script>
</body>

</html>