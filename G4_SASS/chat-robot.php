<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>chat-robot</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/robot.css">
  <link rel="stylesheet" href="css/font.css">
</head>

<body>
    <?php include 'header.php';?>
  <section>
    <div class="triangle-yellow"></div>
    <div class="trapezoid-blue"></div>
    <div class="rectangle-blue"></div>
    <div id="messageall">
      <div id="message">
      <div class="clearboth"></div>
    </div>
    <div class="field">
      <input id="register" maxlength="20" type="text">
      <label for="register">
        <span>please tell me</span>
      </label>
      <!-- <button id="okbtn">OK</button> -->
    </div>
    </div>
    <div class="coach_img">
      <!-- <img class="coach" src="images/chatrobot/coach.png" alt="coach"> -->
    </div>
    <!-- <img class="coach" src="images/chatrobot/coach.png" alt="coach"> -->
  </section>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <script src="libs/gsap/src/minified/TweenMax.min.js"></script>
  <script src="js/robot.js"></script>
  <script>
    $('.humberger_btn').click(function () {
      $(this).toggleClass('active');
    })
  </script>
  <script type="text/javascript">
    $(document).ready(function () {
      newUl = document.createElement('ul');
      newUl.id = 'talk';
      document.getElementById('message').prepend(newUl);

      var li = document.createElement("li");
      newUl.appendChild(li);
      li.className = "li_ans";
      $('.li_ans').html("<img class='portrait' src='images/chatrobot/anse.jpeg'>歡迎來到E7DOME,有任何問題都可問我"); //載入後出現的問候

      $('#register').keyup(function (e) {
        var convalue = this.value.trim();
        // console.log(convalue);
        if (event.keyCode == 13) {
          $.ajax({
            url: 'php/bot.php',
            data: { content: convalue },
            type: 'POST',
            dataType: 'text',
            success: function (data) {
              var li = document.createElement("li");  //機器人的答案
              var ri = document.createElement("li");  //使用者輸入問題
              newUl.appendChild(ri); //使用者
              newUl.appendChild(li);  //機器人

              li.className = "li_ans";  //機器人li
              ri.className = "rli_ans"; //使用者li
              // console.log(data);
              li.innerHTML = '<img class="portrait" src="images/chatrobot/anse.jpeg">' + data;
              ri.innerHTML = '<img class="portrait" src="images/chatrobot/user-default-light64x64.png">' + convalue;
              
            }
          });
          this.value = "";
        }
      });
    });
  </script>
</body>

</html>