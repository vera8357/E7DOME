<?php


try {
    require_once("php/connect_g4.php");
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
    <link rel="stylesheet" type="text/css" href="css/groupInfo.css">
    <link rel="stylesheet" type="text/css" href="css/editGroup.css">
    <link rel="stylesheet" href="css/group.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/font.css">
    <title>中大籃球火</title>
</head>

<body>
    <script>

  (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/zh_TW/sdk.js#xfbml=1&version=v3.1&appId=499403757194446&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
    </script>

    <?php include 'header.php';?>
    <!-- <div class="group-details">
    </div> -->
    <section class="group-info-section">
        <div class="group-wrapper">
            <div class="first-wrapper">
                <div class="group-info-image">
                    <img src="images/team_pic/<?php echo $teamsRow["TEAM_IMG"];?>" alt="">
                </div>
                <div class="group-details">
                    <div><span class="group-info-title"><?php echo $teamsRow["TEAM_NAME"];?></span>

                <?php
                    $TEAM_NO=$teamsRow['TEAM_NO'];
                    $sql = "SELECT * FROM team_mem JOIN team ON (team_mem.TEAM_NO = team.TEAM_NO) JOIN member ON (team_mem.MEM_NO = member.MEM_NO)  WHERE team_mem.TEAM_NO=$TEAM_NO ";

                    $teams = $team->fetchAll(PDO::FETCH_ASSOC);
                    $team_mem = $pdo->query( $sql);
                    ?>
                    <div class="group-txt">
                        <?php echo $teamsRow["TEAM_INFO"];?>
                    </div>
                    <div class="group-owner">
                    主揪人：
                    <?php echo $teamsRow["MEM_NAME"];?>
                    </div>
                    <div id="order-date">
                        預約日期： <span><?php echo $teamsRow["BOO_DATE"];?> </span><span>
                            <?php

                             switch ($teamsRow["BOO_TIME"]) {
                                        case '1':

                                            $teamsRow['BOO_TIME'] = "10:00";
                                            break;
                                        case '2':
                                            $teamsRow['BOO_TIME'] = "14:00";
                                            break;
                                        default:
                                            $teamsRow['BOO_TIME'] = "16:00";
                                     }

                                     echo $teamsRow['BOO_TIME'];
                        ?>
                        </span>
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
                    <?php
                    $sql = "SELECT * FROM team_mem JOIN team ON (team_mem.TEAM_NO = team.TEAM_NO) JOIN member ON (team_mem.MEM_NO = member.MEM_NO)  WHERE team_mem.TEAM_NO=$TEAM_NO ORDER BY TEAM_MEM_NO ASC";
                    $team_mem = $pdo->query( $sql);
                    foreach($team_mem as $e=>$memRow){
                    ?>
                        <div class="mem-head" id="mem-head1"><img src="images/member_pic/<?php echo $memRow["MEM_IMG"];?>" alt=""></div>
                    <?php
                    }
                    ?>
                    </div>
                    <hr class="group-hr">
                    <div class="icon_area">
                        <?php include("php/memBn_check.php"); ?>
                        <!-- <span class="icon"> -->
                            <?php
                                if(isset($_SESSION['MEM_NO'])) {
                                    $MEM_NO = $_SESSION['MEM_NO'];
                                    $sql = "SELECT * FROM team_keep WHERE team_keep.TEAM_NO = $TEAM_NO AND team_keep.MEM_NO =  $MEM_NO";
                                    $team_keep = $pdo->prepare($sql);
                                    $team_keep->execute(); 
                                    $rows = $team_keep->rowCount();
                                    echo '<form action="php/team_keep.php" method="POST">
                                    <input type="hidden" name="team_no" value="'. $TEAM_NO.'">
                                    <input type="hidden" name="mem_no" value="'. $MEM_NO.'">';
                                    if($rows==0)
                                    echo '<input type="image" src="images/unlike.png" class="icon icon-a" id="heart" title="加入收藏" border="0" name="team_keep" value="1"/>';
                                        // echo '<img src="images/unlike.png" >
                                        // <input type="hidden" name="team_keep" value="1">';
                                    else
                                    echo '<input type="image" src="images/like.png" class="icon icon-a" id="heart" title="取消收藏" border="0" name="team_keep" value="2"/>';
                                        // echo '<img src="images/like.png" class="icon fb-share-button" id="heart" title="取消收藏">
                                        // <input type="hidden" name="team_keep" value="2">';
                                    echo'</form>';
                                 }
                                else
                                echo '<input type="image" src="images/unlike.png" class="icon  icon-a" id="heart" title="加入收藏" border="0" alt="Submit" value="1"/>';
                            ?>

                            <a id="icon" class="icon" target="_blank" href="https://social-plugins.line.me/lineit/share?url=http://140.115.236.72/demo-projects/CD102/CD102G4/groupInfo.php?TEAM_NO=<?php echo $teamsRow["TEAM_NO"];?>">
                            <img src="images/share.png" class="icon";>
    
                  </a>
                            </div>
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
                    <div class="mem-mid">
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
                <!-- <div id="MEM-NO"></div> -->
                <textarea name="MSG_INFO" id="MSG_INFO" placeholder="請輸入內容..."></textarea>
                <input type="hidden" name="TEAM_NO" value="<?php echo $TEAM_NO ?>">
                <button type="submit" class="submit button" id="submit">送出</button>
            </div>
    </form>


    </section>
    <div class="edit" id="edit">
        <?php include 'php/editgroup.php';?>
    </div>

<script src="libs/jquery/dist/jquery.min.js"></script>
    <script src="js/groupinfo.js"></script>
    
    <script>

    $(document).ready(function(){

        var myDiv = document.getElementById('forum-border');
        myDiv.scrollTop = myDiv.scrollHeight;

});

    </script>

</body>

</html>