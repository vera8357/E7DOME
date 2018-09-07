<?php
                    if(!isset($_GET["MEM_NO"]))
                    $team_leader = "SELECT * FROM team WHERE team.TEAM_NO=$TEAM_NO ";
                    $team_member = "SELECT * FROM team_mem WHERE team_mem.TEAM_NO=$TEAM_NO";
                    $leader = $pdo->query( $team_leader );
                    $member = $pdo->query( $team_member );
                    $leader = $leader->fetch(PDO::FETCH_ASSOC);
                    $member = $member->fetch(PDO::FETCH_ASSOC);
                    @$MEM_NO = $_SESSION["MEM_NO"];
                    $mem = $member["MEM_NO"];
                            if($MEM_NO == $mem){
                                echo "<form action='php/leaveTeam.php' method='get' id='leaveForm' name='leaveForm'>";
                                echo "<input type='hidden' name='TEAM_NO' value='$TEAM_NO'>";
                                echo "<button class='button join-button' id='join'>我要退團";
                                echo "</button></form>";

                            }elseif($MEM_NO == ($leader["MEM_NO"])){
                                echo "<a href='membergroup.php'>";
                                echo "<button class='button join-button' id='join'>管理揪團";
                                echo "</button></a>";
                            }else{
                                echo "<form action='php/joinTeam.php' method='get' id='joinForm' name='joinForm'>";
                                echo "<input type='hidden' name='TEAM_NO' value='$TEAM_NO'>";
                                echo "<button class='button join-button' id='join'>我要參團";
                                echo "</button></form>";
                            }
                   

?>
