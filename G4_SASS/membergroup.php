


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/membergroup.css">
    <title>我的揪團</title>
    

</head>
<body>
 <?php
        require_once("header.php");
?>

<?php
$member_pic = 'images/member_pic/'.$_SESSION["MEM_IMG"];
?>

<div class="div"></div>
<section>

    <div class="wrap">
        <!-- 左邊攔 會員選項-->
        <div class="member_item">


            <form  id="file" action="php/new_upfile.php"   method="post" enctype="multipart/form-data">

                <div class="pic_wrap">
                    <label>
                        <input  type="file" name="upfile" id="upfile">
                        <img id="show_pic" class="pic" src="<?php echo$member_pic; ?>">
                        <div class="change_pic">變更大頭照</div>
                    </label>
                </div>

                <input id="member_pic" type="submit" value="確認上傳">
                
             </form>



             <div id="show_name"><span><img src="images/member_pic/photography-portrait-mode.png"><?php echo $_SESSION['MEM_ID']; ?></span>
                <span><img src="images/member_pic/coin.png"><?php echo $_SESSION['MEM_POINTS']; ?></span>
                <span><img src="images/member_pic/smartphone.png"><?php echo $_SESSION['MEM_PHONE']; ?></span></div>




            <ul class="m_item">

                <li><a href="memberinfo.php"><span class="line"></span>個人資料</a></li>
                <li><a href="memberbooking.php"><span class="line"></span>預約紀錄</a></li>
                <li><a href="memberpoints.php"><span class="line"></span>儲值紀錄</a></li>
                <li id="meminfo_active"><a href="#"><span class="line"></span>我的揪團</a></li>
                <li><form action="php/logout.php" method="post"><input id="btn_logout" type="submit" value="登出"></form> </li>

              
                
               
            </ul>
            

        </div>


        



        <!-- 右邊攔 選項內容-->
        <div class="content">

            <div class="group">
                <h1 id="member_h1">我的揪團</h1>

                <div class="group_title">
                    <span  id="show_leader" class="title title_line">我的開團</span>
                    <span  id="show_staff" class="title title_line">我的參團</span>
                    <span  id="show_collect" class="title">我的收藏</span>
                </div>
                    
                <div class="group_content">


                    <div id="leader_content" class="text_content" >

                        <ul class="text_title leader">
                            
                            <li>團隊名稱</li>
                            <li>場地名稱</li>
                            <li>預約日期</li>
                            <li>預定人數</li>
                            <li></li>
                        </ul>
                      
                     <?php
                        
                        try{
                            require_once("php/connect_g4.php");
                            $sql = "select * from facility join booking on (facility.FAC_NO = booking.FAC_NO)join team on (team.BOO_NO = booking.BOO_NO) where team.MEM_NO =".$_SESSION['MEM_NO']." ORDER BY BOOKING.BOO_DATE DESC";
                            $member = $pdo->query($sql);
                            

                            if($member->rowCount()==0){
                                echo "<ul class='my_group'><li style='width:100%; text-align: center;'>無紀錄</li><ul>";
                            }else{

                                    while ($booking = $member->fetch(PDO::FETCH_ASSOC)){
                       
                              
                            
                                        echo " <ul class='my_group'>";
                                        echo "<li><span>團隊名稱</span>".$booking['TEAM_NAME']."</li>";
                                        echo "<li><span>場地名稱</span>".$booking['FAC_NAME']."</li>";
                                        echo "<li><span>預定日期</span>".$booking['BOO_DATE']."</li>";
                                        echo "<li><span>預定人數</span>".$booking['TEAM_MEM']."</li>";
                                        echo "<li><a class='link_group' href='groupinfo.php?TEAM_NO=".$booking['TEAM_NO']."'> 前往團隊</a></li>";
                                        echo " </ul>";
                                    } 
                                        
                            }

                        }catch(PDOException $e){

                            echo $e->getMessage();
                        }


                    ?>    
                        
                          
                    </div>
                        

                     <div id="staff_content" class="text_content">


                        <ul class="text_title staff">
                          
                            <li>團隊名稱</li>
                            <li>場地名稱</li>
                            <li>團隊隊長</li>
                            <li>預約日期</li>
                            <li>預定人數</li>
                            <li></li>
                        </ul>
   
                       
                         <?php
                        
                        try{
                            require_once("php/connect_g4.php");
                            $sql = "SELECT * FROM facility JOIN booking ON (facility.FAC_NO = booking.FAC_NO) JOIN team ON (booking.BOO_NO = team.BOO_NO) JOIN team_mem ON(team_mem.TEAM_NO =team.TEAM_NO) WHERE team_mem.MEM_NO =".$_SESSION['MEM_NO']." ORDER BY BOOKING.BOO_DATE DESC ";
                            $member = $pdo->query($sql);
                            

                            if($member->rowCount()==0){
                                echo "<ul class='other_group'><li style='width:100%; text-align: center;'>無紀錄</li><ul>";
                            }else{

                                    while ($booking = $member->fetch(PDO::FETCH_ASSOC)){

                                   
                                        echo "<ul class='other_group'>";
                                        echo "<input type='hidden' name='TEAM_NO' value='".$booking['TEAM_NO']."'>";
                                        echo "<li><span>團隊名稱</span>".$booking['TEAM_NAME']."</li>";
                                        echo "<li><span>場地名稱</span>".$booking['FAC_NAME']."</li>";
                                        echo "<li><span>團隊隊長</span>".$booking['MEM_NAME']."</li>";
                                        echo "<li><span>預定日期</span>".$booking['BOO_DATE']."</li>";
                                        echo "<li><span>預定人數</span>".$booking['TEAM_MEM']."</li>";
                                        echo "<li><a class='link_group' href='groupinfo.php?TEAM_NO=".$booking['TEAM_NO']."'>前往團隊</a></li>";
                                        echo "</ul>";
                                       
                                    } 
                                        
                            }

                        }catch(PDOException $e){

                            echo $e->getMessage();
                        }


                         ?>

                    </div>

                    <div id="collect_content" class="text_content">


                        <ul class="text_title staff">
                          
                            <li>團隊名稱</li>
                            <li>場地名稱</li>
                            <li>團隊隊長</li>
                            <li>預約日期</li>
                            <li>預定人數</li>
                            <li></li>
                        </ul>
   
                       
                         <?php
                        
                        try{
                            require_once("php/connect_g4.php");
                            $sql = "SELECT * FROM facility JOIN booking ON (facility.FAC_NO = booking.FAC_NO) JOIN team ON (booking.BOO_NO = team.BOO_NO) JOIN team_keep ON(team_keep.TEAM_NO = team.TEAM_NO) WHERE team_keep.MEM_NO =".$_SESSION['MEM_NO']." ORDER BY BOOKING.BOO_DATE DESC ";
                            $member = $pdo->query($sql);
                            

                            if($member->rowCount()==0){
                                echo "<ul class='other_group'><li style='width:100%; text-align: center;'>無紀錄</li><ul>";
                            }else{

                                    while ($booking = $member->fetch(PDO::FETCH_ASSOC)){

                                   
                                        echo "<ul class='other_group'>";
                                        echo "<input type='hidden' name='TEAM_NO' value='".$booking['TEAM_NO']."'>";
                                        echo "<li><span>團隊名稱</span>".$booking['TEAM_NAME']."</li>";
                                        echo "<li><span>場地名稱</span>".$booking['FAC_NAME']."</li>";
                                        echo "<li><span>團隊隊長</span>".$booking['MEM_NAME']."</li>";
                                        echo "<li><span>預定日期</span>".$booking['BOO_DATE']."</li>";
                                        echo "<li><span>預定人數</span>".$booking['TEAM_MEM']."</li>";
                                        echo "<li><a class='link_group' href='groupinfo.php?TEAM_NO=".$booking['TEAM_NO']."'>前往團隊</a></li>";
                                        echo "</ul>";
                                       
                                    } 
                                        
                            }

                        }catch(PDOException $e){

                            echo $e->getMessage();
                        }


                         ?>
                        



                    </div>

                </div>

            </div>

        </div>

    </div>

</section>
    <script src="js/upfile.js"></script>

    <script src="js/member_group.js"></script>
 
    

</body>
</html>