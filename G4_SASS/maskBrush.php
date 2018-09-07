<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/maskbrush.css">
    <link rel="stylesheet" href="css/font.css">
    <title>maskBrush</title>
</head>

<body>
    <header>
        <div class="wrapper">
            <div class="humberger_btn">
                <div class="humberger_line top"></div>
                <div class="humberger_line mid"></div>
                <div class="humberger_line bot"></div>
            </div>
            <div class="logo">
                <a href="index.html">
                    <img src="images/e7logo.png" alt=""> </a>
            </div>
            <div class="login">
                <!-- <a href="#"><img src="images/user-icon.png"></a> -->
                <a href="#">登入</a>
            </div>
            <ul>
                <li>
                    <a href="#"> 場地介紹 </a>
                </li>
                <li>
                    <a href="booking.html"> 預約場地 </a>
                </li>
                <li>
                    <a href="group.html"> 運動揪團 </a>
                </li>
                <li>
                    <a href="about.html"> 關於我們 </a>
                </li>
                <li>
                    <a href="chat-robot.html"> 諮詢專區 </a>
                </li>
            </ul>
        </div>
    </header>
    <div class="layouts">
        <div class="bomb-rocket"></div>
        <div class="bomb-rocket"></div>
        <div class="bomb-rocket"></div>
        <div class="bomb-rocket"></div>
        <div class="bomb-rocket"></div>
        <div class="normal-rocket"></div>
        <div class="normal-rocket"></div>
        <div class="normal-rocket"></div>
        <div class="normal-rocket"></div>
        <div class="normal-rocket"></div>
        <div class="vtb-intro-body">
            <!-- <div class="vtb-intro-container">
                <div class="vtb-intro-header">
                    <h1>
                        <span>SCRATCH</span>
                        <span><b>CARD</b></span>
                    </h1>
                </div>
                <div class="vtb-intro-description">
                    <p>註冊完成即可享有E7DOME<br>5000元儲值點數</p>
                </div>
            </div> -->
            <ul id="scene-mask" class="scene">
            <li class="layer wow bounceIn" data-wow-duration=".3s" data-wow-delay="4s" data-depth="-1" >
                <div class="gift1">
                    <img src="images/brush/alert.png" alt="gift2">
                </div>
            </li>
            <li class="layer wow bounceIn" data-wow-duration=".3s" data-wow-delay="4.5s" data-depth="-4">
                <div class="gift2">
                    <img src="images/brush/no-prize.png" alt="gift2">
                </div>
            </li>
            <li class="layer wow bounceIn" data-wow-duration=".3s" data-wow-delay="5s" data-depth="-3">
                <div class="gift3">
                    <img src="images/brush/ticket.png" alt="gift3">
                </div>
            </li>
            <li class="layer wow bounceIn" data-wow-duration=".3s" data-wow-delay="5.5s" data-depth="-6">
                <div class="gift4">
                    <img src="images/brush/alert-d.png" alt="gift4">
                </div>
            </li>
        </ul>
        </div>
        <div class="text">Summer Games</div>
        <div class="light"></div>
        <div class="light"></div>
        <div class="vtb-intro-mask">
            <div class="vtb-intro-mask-overlay"></div>
        </div>
        <div class="vtb-intro-mask_hover">
            <div class="vtb-intro-mask_hover-overlay"></div>
        </div>
        <div class="bg"></div>
        <canvas id="mycanvas"></canvas>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://thefrontendblog.com/hosted/jquery.parallax.min.js"></script>
    <script src="js/pixi.min.js"></script>
    <script src="js/maskbrush.js"></script>
    <script>
        $('.humberger_btn').click(function () {
            $(this).toggleClass('active');
        })
    </script>
</body>

</html>