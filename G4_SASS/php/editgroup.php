<?php
try {
    require_once("connect_g4.php");
    $TEAM_NO= $_GET['TEAM_NO'];
    if(!isset($TEAM_NO)){
        header('location:../php/groupInfo.php?TEAM_NO=$TEAM_NO');
    }else{


    $sql = "SELECT * FROM team JOIN booking ON (team.BOO_NO = booking.BOO_NO) JOIN facility ON (facility.FAC_NO = booking.FAC_NO) JOIN member ON (team.MEM_NO = member.MEM_NO)  WHERE team.TEAM_NO = $TEAM_NO";
    $team = $pdo->query( $sql);
    $teams = $team->fetchAll(PDO::FETCH_ASSOC);
    foreach($teams as $i=>$teamsRow){
    $selectitem=$teamsRow["TEAM_MEM"];
    $TEAM_INFO = trim($teamsRow["TEAM_INFO"]);
    $TEAM_NAME = $teamsRow["TEAM_NAME"];
?>
    <form  id="file" action="php/upfile_group.php" method="POST" enctype="multipart/form-data">
        <input Type="hidden" name="TEAM_NO" value="<?php echo $TEAM_NO; ?>";>
        <h1>管理揪團</h1>
        <span id="close_4"><img src="images/member_pic/close.png"></span>
        <div class="edittd">
        <label class="editth">揪團標題：</label>
            <input type="text" minlength="3" maxlength="10" value="<?php echo $TEAM_NAME?>" name="TEAM_NAME" required>
        </div>
        <div class="edittd">
            <label class="editth">揪團簡介：</label>
            <textarea class="describe" name="TEAM_INFO" required><?php echo $TEAM_INFO?></textarea>
        </div>
        <div class="edittd">
        <label class="editth">揪團人數：</label>
            <div class="select-td">
                <select name="TEAM_MEM" required>
                    <?php
                    for($i=1; $i<$teamsRow['FAC_MEM']; $i++){
                        if($i == $teamsRow['TEAM_MEM']){
                        echo '<option value="'.$i.'" selected>'.$i.'</option>';
                        }else{
                        echo '<option value="'.$i.'">'.$i.'</option>';
                        };
                    }

                    ?>
                </select>

            </div>
        </div>
        <div class="edittd">
        <label class="editth">上傳揪團海報：</label>
        <label class="btn btn-info">
            <input Type="File" name="upfile" id="upfile" style="display:none;" ;>
                <img src="images/<?php echo $teamsRow["TEAM_IMG"];?>" id="show_pic" id="">
        </div>
        </label>
            <div class="td">
                <button class="submit">修改完成</button>
            </div>
        </div>
     </form>
<?php
 }
 }
}
 catch (PDOException $e) {
    echo "錯誤原因 : " , $e->getMessage(), "<br>";
    echo "錯誤行號 : " , $e->getLine(), "<br>";
};
?>
<script src="js/upfile.js"></script>












