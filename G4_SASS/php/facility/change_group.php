<?php
try {
    $dsn = "mysql:host=localhost;port=3306;dbname=cd102g4;charset=utf8";
    $user = "root";
    $password = "root";
    $options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
    $pdo = new PDO($dsn, $user, $password, $options);

    $sql = "SELECT * FROM team JOIN booking ON (team.BOO_NO = booking.BOO_NO) JOIN facility ON (facility.FAC_NO = booking.FAC_NO) ";
    $team = $pdo->query( $sql);


    $teams = $team->fetchAll(PDO::FETCH_ASSOC);
    foreach($teams as $i=>$teamsRow){
?>

    <li class="teamItem cl-3 cl-12 <?php echo $teamsRow["FAC_NO"];?> <?php echo ($teamsRow["BOO_TIME"] + 4);?>">
        <a href="groupInfo.php?TEAM_NO=<?php echo $teamsRow["TEAM_NO"];?>">
   <div class="teamOne ">
    <div class="teamDate_top">
     <div class="dateGroup">
      <div class="teamDay"><?php echo substr($teamsRow["BOO_DATE"],8,2);?></div>
      <div class="teamMonth"><?php echo date("M",strtotime($teamsRow["BOO_DATE"]));?></div>
     </div>
    </div>
    <div class="teamPic">
                    <img src="images/<?php echo $teamsRow["TEAM_IMG"];?>" alt="">
    </div>
    <div class="teamInfo">
     <div class="teamMore">
      <div class="morebg">更多資訊</div>
         <div class="moreSkew">></div>
        </div>
     <div class="teamName"><?php echo $teamsRow["TEAM_NAME"];?></div>
     <div class="teamDate"><?php echo date('Y/m/d',strtotime($teamsRow["BOO_DATE"]));?></div>
     <div class="teamMem">
                        揪團人數
                        <?php
                        $TEAM_NO=$teamsRow['TEAM_NO'];//抓揪團編號
                        $memCount = "SELECT * FROM team_mem WHERE TEAM_NO = $TEAM_NO";//選擇所有資料 當 揪團編號=自己的揪團編號
                        $teammem = $pdo->prepare($memCount);
                        $teammem->execute(); 
                        $rows = $teammem->rowCount();//計算抓到幾筆資料
                        ?>
                        <span><?php echo $rows+1;//揪團人數+1(團長)?></span>/
                        <span><?php echo $teamsRow["TEAM_MEM"];?></span>人
                    </div> 
        <div class="teamTxt">
                    <?php echo $teamsRow["TEAM_INFO"];?>
     </div>
    </div>
   </div>
  </a>
 </li>
 <?php
        }
    }
    catch (PDOException $e) {
        echo "錯誤原因 : " , $e->getMessage(), "<br>";
        echo "錯誤行號 : " , $e->getLine(), "<br>"; 
    }
?>