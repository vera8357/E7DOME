<?php
                    if(!isset($_SESSION["MEM_NO"]) != "null"){
                        $MEM_NO = $_SESSION["MEM_NO"];
                        $team_leader = "SELECT * FROM team WHERE team.TEAM_NO=$TEAM_NO ";
                        $team_member = "SELECT MEM_NO FROM team_mem WHERE team_mem.TEAM_NO=$TEAM_NO";
                        $leader = $pdo->query( $team_leader );
                        $leader = $leader->fetch(PDO::FETCH_ASSOC);
                        if(isset($leader) && is_array($leader) && ($MEM_NO === $leader["MEM_NO"])){
                            echo "<a href='php/editgroup.php?TEAM_NO=$TEAM_NO'>";
                            echo "<button class='button join-button' id='join'>管理揪團";
                            echo "</button></a>";
                        } else {
                            $members = $pdo->query( $team_member );
                            $members = $members->fetchAll(PDO::FETCH_ASSOC);
                            if (isset($members) && is_array($members)) {
                                foreach($members as $member) {
                                    if($MEM_NO === $member['MEM_NO']){
                                        echo "<form action='php/leaveTeam.php' method='get' id='leaveForm' name='leaveForm'>";
                                        echo "<input type='hidden' name='TEAM_NO' value='$TEAM_NO'>";
                                        echo "<button class='button join-button' id='join'>我要退團";
                                        echo "</button></form>";
                                        return;
                                    }
                                }
                                if($rows+1 == $teamsRow["TEAM_MEM"]){
                                    echo "<a href='membergroup.php'>";
                                    echo "<button class='button join-button' id='join' disabled>人數已滿";
                                    echo "</button></a>";
                                }else{
                                    echo "<form action='php/joinTeam.php' method='get' id='joinForm' name='joinForm'>";
                                    echo "<input type='hidden' name='TEAM_NO' value='$TEAM_NO'>";
                                    echo"<button class='button join-button' id='join'>我要參團";
                                    echo "</button></form>";
                                }
                            }
                        }
                    }else{
                        echo "<button class='button join-button' id='join'>請先登入";
                        echo "</button>";
                    };

?>
