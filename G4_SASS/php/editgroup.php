<?php
try {
    require_once("connect_g4.php");
    if(!isset($_GET['TEAM_NO'])){
    header("location: group.php");
    }else{
    $TEAM_NO= $_GET['TEAM_NO'];

    $sql = "SELECT * FROM team JOIN booking ON (team.BOO_NO = booking.BOO_NO) JOIN facility ON (facility.FAC_NO = booking.FAC_NO) JOIN member ON (team.MEM_NO = member.MEM_NO)  WHERE team.TEAM_NO = $TEAM_NO";
    $team = $pdo->query( $sql);
    $teams = $team->fetchAll(PDO::FETCH_ASSOC);
    foreach($teams as $i=>$teamsRow){
    $selectitem=$teamsRow["TEAM_MEM"]
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
    <form action="createFinish.php" method="get">
    	 <form>
        <table border="1">
            <tr>
                <th>揪團標題：</th>
                <td>
                    <input type="text" minlength="3" maxlength="10" value="<?php echo $teamsRow["TEAM_NAME"]?>" required>
                </td>
            </tr>
            <tr>
                <th>揪團簡介：
                </th>
                <td>
                    <textarea class="describe" required><?php echo $teamsRow["TEAM_INFO"];?></textarea>
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
                    <form  id="file" action="php/upfile_group.php"   method="post" enctype="multipart/form-data">
                    	<label class="btn btn-info">
						<input id="upload_img" style="display:none;" type="upfile">
						<i class="fa fa-photo"></i> +
						</label>
					</form>
                    </td>
            </tr>
            <tr>
                <td colspan="2">
                    <img src="../images/<?php echo $teamsRow["TEAM_IMG"];?>" id="add_product_image" width="265" height="175" />
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="submit">送出揪團</div>
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
function sendimg(){
      var xhr = new XMLHttpRequest();

      xhr.onload = function(){
        if( xhr.status == 200){  
          if( xhr.responseText == "NG"){
            alert("帳密錯誤");
          }else{
            document.getElementById("add_product_image").innerHTML = xhr.responseText;
          }

        }else{
          alert(xhr.status);
        }
      }

      xhr.open("Post", "editGroup.php", true);
      xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
      xhr.send(data_info);

      
    }
</script>
</body>
</html>












