<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/font.css">    
    <link rel="stylesheet" href="css/sport-share.css">
    <link rel="stylesheet" href="css/basketball.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/sport-share.js"></script>
    <script src="js/site_scrollmagic.js"></script>
    <script src="libs/gsap/src/minified/TweenMax.min.js"></script>
    <script type="text/javascript" src="libs/Scrollmagic/scrollmagic/minified/ScrollMagic.min.js"></script>
    <script type="text/javascript" src="libs/Scrollmagic/scrollmagic/minified/plugins/animation.gsap.min.js"></script>
    <script type="text/javascript" src="libs/Scrollmagic/scrollmagic/minified/plugins/debug.addIndicators.min.js"></script>
</head>
<body>
    <?php include 'header.php';?>
    <div class="bkb_fp">
        <div class="bkb_fp_blue"></div>
        <div class="bkb_fp_black"></div>
        <div class="bkb_fp_black2"></div>
        <div class="bkb_fp_bgimg">
            <img src="images/basketball/firstpage_bgimg.png" alt="">
        </div>
        <div class="kobe">
            <img src="images/basketball/kobe.png" alt="">
        </div>
        <h1>Basketball</h1>
        <h2>籃球場</h2>
</div>
    <div class="site_info">
        <div class="site_info_tri1"></div>
        <div class="site_info_tri2"></div>
        <div class="site_info_wrap">
            <h3>場地介紹</h3>
            <div class="slider">
                <ul class="sport_slider" name="fac_status" value="1">
                    <!-- <li>
                        <img src="images/bowling/bowlingball.png" alt="">
                    </li>
                    <li>
                        <img src="images/bowling/bowlingball.png" alt="">
                    </li>
                    <li>
                        <img src="images/bowling/bowlingball.png" alt="">
                    </li> -->
                </ul>
            </div>
            <div class="info">
                <div class="info_name">
                    <!-- <h3>星幻球場</h3>
                    <p>文案文案文案文案文案文案文案文案文案文案文案文案文案文案文案文案文案文案文案</p>
                    <p>名稱：室內球場A 費用：5000點/小時</p>
                    <p>建議人數：20人</p> -->
                </div>
                <button class="reservation">
                    預約
                </button>
                <button class="group">
                    揪團
                </button>
                <div class="site_select">
                    <input type="hidden" name="cate_no" value="1"> //1.籃球場2.保齡球場3.羽球場4.攀岩場
                    <input type="hidden" name="fac_status" value="1">//1.上架2.下架
                    <!-- <div class="site_item">
                        <img src="images/bowling/bowlingsite.png" alt="">
                        <p>A球場</p>
                        <span>
                            文案文案文案文案文案文案文案文案文案
                        </span>
                    </div>
                    <div class="site_item">
                        <img src="images/bowling/bowlingsite.png" alt="">
                        <p>A球場</p>
                        <span>
                            文案文案文案文案文案文案文案文案文案
                        </span>
                    </div>
                    <div class="site_item">
                        <img src="images/bowling/bowlingsite.png" alt="">
                        <p>A球場</p>
                        <span>
                            文案文案文案文案文案文案文案文案文案
                        </span>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <div class="assess">
        <div class="assess_tri1"></div>
        <div class="assess_tri2"></div>
        <div class="assess_tri3"></div>
        <div class="assess_wrap">
            <h3>場地評價</h3>
            <div class="assess_table">
                <div class="assess_label_cap">
                    <!-- <input type="radio" id="A" name="check_site">
                    <input type="radio" id="B" name="check_site">
                    <input type="radio" id="C" name="check_site">
                    <label for="A" class="site_label">A場地</label>
                    <label for="B" class="site_label">B場地</label>
                    <label for="C" class="site_label">C場地</label> -->
                </div>
                <table id="bookin_list">
                    <!-- <tr>
                        <td>
                            <img src='http://fakeimg.pl/200x200?font=lobster' alt=''/>
                        </td>
                        <td>
                            邱顯成
                        </td>
                        <td>
                            文案文案文案文案文案文案文案文案文案文案文案文案
                        </td>
                        <td>
                            2018/12/10
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src='http://fakeimg.pl/200x200?font=lobster' alt=''/>
                        </td>
                        <td>
                            邱顯成
                        </td>
                        <td>
                            文案文案文案文案文案文案文案文案文案文案文案文案
                        </td>
                        <td>
                            2018/12/10
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src='http://fakeimg.pl/200x200?font=lobster' alt=''/>
                        </td>
                        <td>
                            邱顯成
                        </td>
                        <td>
                            文案文案文案文案文案文案文案文案文案文案文案文案
                        </td>
                        <td>
                            2018/12/10
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src='http://fakeimg.pl/200x200?font=lobster' alt=''/>
                        </td>
                        <td>
                            邱顯成
                        </td>
                        <td>
                            文案文案文案文案文案文案文案文案文案文案文案文案
                        </td>
                        <td>
                            2018/12/10
                        </td>
                    </tr> -->
                </table>
            </div>
        </div>
    </div>
    <div class="group_page">
        <div class="bgcball">
            <img src="images/basketball/basketball.png" alt="">
        </div>
        <div class="group_page_content">
            <h3>加入揪團！尋找運動伙伴</h3>
            <div class="home_team">
                <ul class="teamGroup">
                    <li class="teamItem all">
                        <a href="#">
                            <div class="teamAll">			
                                <div class="all_img">
                                    <img src="images/index/date.png">
                                    <h3>
                                        揪團日期
                                    </h3>
    
                                </div>
                                <div class="teamMore all">
                                    <div class="morebg">查看更多</div>
                                    <div class="moreSkew">></div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <?php
                    
                        require_once("php/connect_g4.php");
                        $sql = "SELECT * FROM team JOIN booking ON (team.BOO_NO = booking.BOO_NO) JOIN facility ON (facility.FAC_NO = booking.FAC_NO) where booking.BOO_DATE > CURRENT_DATE() and facility.CATE_NO = 2 order by facility.FAC_NO desc limit 3";
                        $team = $pdo->query( $sql);
                        $teams = $team->fetchAll(PDO::FETCH_ASSOC);
                        foreach($teams as $i=>$teamsRow){
                    ?>
                    <li class="teamItem">
                        <a href="groupInfo.php?TEAM_NO=<?php echo $teamsRow['TEAM_NO'];?>">
                            <div class="teamOne">
                                <div class="teamDate_top">
                                    <div class="dateGroup">
                                        <div class="teamDay"><?php echo substr($teamsRow['BOO_DATE'],8,2);?></div>
                                        <div class="teamMonth"><?php echo date("M",strtotime($teamsRow['BOO_DATE']));?></div>
                                    </div>
                                </div>
                                <div class="teamPic">
                                    <img src="images/team_pic/<?php echo $teamsRow['TEAM_IMG'];?>" alt="">
                                </div>
                                <div class="teamInfo">
                                    <div class="teamMore">
                                        <div class="morebg">更多資訊</div>
                                        <div class="moreSkew">></div>						
                                    </div>
                                    <div class="teamName">
                                        <?php echo $teamsRow['TEAM_NAME'];?>
                                    </div>
                                    <div class="teamDate">
                                        <?php echo date('Y/m/d',strtotime($teamsRow['BOO_DATE']));?>
                                    </div>
                                    <div class="teamMem">
                                        揪團人數
                                        <?php
                                            $TEAM_NO=$teamsRow['TEAM_NO'];//抓揪團編號
                                            $memCount = "SELECT * FROM team_mem WHERE TEAM_NO = $TEAM_NO";//選擇所有資料 當 揪團編號=自己的揪團編號
                                            $teammem = $pdo->prepare($memCount);
                                            $teammem->execute(); 
                                            $rows = $teammem->rowCount();//計算抓到幾筆資料
                                        ?>
                                        <span><?php echo $rows+1;//揪團人數+1(團長)?></span>
                                        /
                                        <span><?php echo $teamsRow['TEAM_MEM'];?></span>
                                        人
                                    </div>
                                    <div class="teamTxt">
                                        <?php echo $teamsRow['TEAM_INFO'];?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <?php
                            
                        }
                        
                    ?>
                </ul>
            </div>
        </div>
    </div>

    <script src="js/slick.min.js"></script>
    <script>
        function slickItem() {
            if($(window).width()<767){
                $('.teamGroup').slick({
                    dots: true,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows:false,
                    autoplay: true,
                    autoplaySpeed: 2000,
                    focusOnSelect:true,
                });
            }
        }
        $(window).resize(slickItem);
    </script>
	
    <script>
        $.ajax({
            url:'php/facility/sports.php',
            dataType:'text',
            type:'POST',
            data:{
                cate_no:parseInt($('.site_select').find('input').eq(0).val()),
                fac_status:parseInt($('.site_select').find('input').eq(1).val()),
            },
            success:function(data){
                $('.site_select').append(data);
                $('.site_item').on('click',function(){
                    var sitem = parseInt($(this).find('input').eq(0).val());
                    sayYes(sitem);
                    // alert(sitem);
                })
                function sayYes(sitem){
                    $.ajax({
                        url:'php/facility/change_info.php',
                        dataType:'text',
                        type:'POST',
                        data:{
                            fac_no:sitem,
                        },
                        success:function(data2){
                            $('.info_name').find('.info_cap').remove();
                            $('.info_name').append(data2);
                        }
                    });
                };
                //找到第一個class的input的value值
                var firsitem = parseInt($('.site_item').eq(0).find('input').eq(0).val());
                window.addEventListener('load',sayYes(sitem=firsitem));
            }
        });
        $.ajax({
            url:'php/facility/change_img.php',
            dataType:'text',
            type:'POST',
            data:{
                cate_no:parseInt($('.site_select').find('input').eq(0).val()),
                fac_status:parseInt($('.site_select').find('input').eq(1).val()),
            },
            success:function(data3){
                $('.sport_slider').find('li').remove();
                $('.sport_slider').append(data3);
                $('.sport_slider').slick({
                    dots: true,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows:false,
                    autoplay: true,
                    autoplaySpeed: 2000,
                    focusOnSelect:true,
                });
            },
            error:function(){
                alert('ERROR');
            }
        });
        $.ajax({
            url:'php/facility/change_label.php',
            dataType:'text',
            type:'POST',
            data:{
                cate_no:parseInt($('.site_select').find('input').eq(0).val()),
                fac_status:parseInt($('.site_select').find('input').eq(1).val()),
            },
            success:function(data){
                $('.assess_label_cap').children().remove();
                $('.assess_label_cap').append(data);
                $('.site_label').on('click',function(){
                    var label = parseInt($(this).prev('input').val());
                    hahaha(label);
                })
                function hahaha(label){
                    $.ajax({
                        url:'php/facility/change_bookin_list.php',
                        dataType:'text',
                        type:'POST',
                        data:{
                            fac_no:label,
                        },
                        success:function(data2){
                            $('#bookin_list').children().remove();
                            $('#bookin_list').append(data2);
                            var star = $('.rank')
                        }
                    })
                }
                var firstlabel = parseInt($('.assess_label_cap').eq(0).find('input').eq(0).val());
                window.addEventListener('load',hahaha(label=firstlabel));
            }
        });
        $('.group').on('click',function(){
            $.ajax({
                url:'php/facility/session_sport.php',
                dataType:'text',
                type:'POST',
                data:{
                    cate_no:parseInt($('.site_select').find('input').eq(0).val()),
                },
                success:function(data3){
                    window.location.href = "group.php";
                },
                error:function(){
                    alert('gg');
                }
            })
        });
        $('.reservation').on('click',function(){
            $.ajax({
                url:'php/facility/session_sport.php',
                dataType:'text',
                type:'POST',
                data:{
                    cate_no:parseInt($('.site_select').find('input').eq(0).val()),
                },
                success:function(data3){
                    window.location.href = "booking.php";
                },
                error:function(){
                    alert('gg');
                }
            })
        });
    </script>
</body>
</html>