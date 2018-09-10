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
    $TEAM_INFO = $teamsRow["TEAM_INFO"];
    $TEAM_NAME = $teamsRow["TEAM_NAME"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>編輯揪團</title>
    <link rel="stylesheet" type="text/css" href="../css/editGroup.css">
</head>
<body>
    <form  id="file" action="upfile_group.php" method="POST" enctype="multipart/form-data">
        <table border="1">
            <tr>
                <th>揪團標題：</th>
                <td>
                    <input type="text" minlength="3" maxlength="10" value="<?php echo $TEAM_NAME?>" required>
                </td>
            </tr>
            <tr>
                <th>揪團簡介：
                </th>
                <td>
                    <textarea class="describe" required><?php echo $TEAM_INFO;?></textarea>
                </td>
            </tr>
            <tr>
                <th>揪團人數：</td>
                    <td>
                        <select name="group">
                            <option value="2">2人</option>
                            <option value="3">3人</option>
                            <option value="4">4人</option>
                            <option value="5">5人</option>
                            <option value="6">6人</option>
                        </select>
                    </td>
            </tr>
            <tr>
                <th>上傳揪團海報：</td>
                    <td>
                    	<label class="btn btn-info">
						<input Type="File" name="upfile" id="upfile" style="display:none;" ;>
                        <input Type="hidden" value="<?php echo $TEAM_NO; ?>";>
						<i class="fa fa-photo"></i> +
						</label>
                    </td>
            </tr>
            <tr>
                <td colspan="2">
                    <img src="../images/<?php echo $teamsRow["TEAM_IMG"];?>" id="show_pic" id="" width="300" height="250" >
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button class="submit">送出揪團</button>
                </td>
            </tr>
        </table>
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
<script src="../js/upfile.js"></script>
<script>

</script>
</body>
</html>












