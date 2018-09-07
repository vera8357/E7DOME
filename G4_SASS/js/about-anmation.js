// 機械手臂互動
$("#animation-crane").hover(
  function() {
    $(this).addClass("activate"),
      $(".an-crane-1-wrap, .an-crane-2-wrap, .an-crane-area-wrap").css(
        "animation-play-state",
        "running"
      ),
      $(".an-crane-3-wrap").css("animation-play-state", "paused");
    var e = $(".an-crane-area-2");
    $(this)
      .mousemove(function(t) {
        var n = e.offset().left + e.width() / 2,
          a = e.offset().top + e.height() / 2,
          r = parseInt((t.pageX - n) / 5),
          i = parseInt((t.pageY - a) / 10);
        e.css({
          transform: "translateX(" + r + "px) translateY(" + i + "px)"
        });
      })
      .mouseleave(function(t) {
        t.preventDefault(),
          e.css({
            transform: "translateX(0) translateY(0)"
          });
      }),
      $(this).click(function(e) {
        e.preventDefault(), $(".an-crane-area-2").fadeOut(3e3);
      });
  },
  //手臂執行程式事件
  function() {
    $(".an-crane-area-2").fadeIn(),
      $(".an-crane-1-wrap, .an-crane-1-wrap, .an-crane-area-wrap").css(
        "animation-play-state",
        "paused"
      ),
      $(".an-crane-3-wrap").css("animation-play-state", "running");
  }
);

//3d動態影片牆jQuery
$(document).ready(function() {
  var e = $(".playItem").get(0);
  $(".showPlayer").on("touchstart", function() {
    $(this).unbind("mouseover mouseleave");
  }),
    $(".showPlayer")
      .bind("mouseover", function() {
        $(".playControl")
          .stop()
          .fadeIn("slow"),
          $("#animation-first")
            .stop()
            .fadeOut("slow");
      })
      .bind("mouseleave", function() {
        $(".playControl")
          .stop()
          .fadeOut("slow"),
          $("#animation-first")
            .stop()
            .fadeIn("slow");
      }),
    $(".playControl")
      .bind("mouseover", function() {
        setTimeout(function() {
          e.play();
        }, 500);
      })
    //點擊觸發影片撥放控制
    //   .bind("mouseleave", function() {
    //     e.pause();
    //   }),
    // $(".playControl, .play_video").click(function() {
    //   $("body").append(
    //     '<div class="popup popup_video"><div class="container"><div class="popup_bg"></div><div id="player" class="index_player"></div><div class="close close_video"></div></div></div>'
    //   ),
    //     $(".popup_video").addClass("open"),
    //     onYouTubePlayerAPIReady(),
    //     $(".close_video, .popup_video .popup_bg").click(function() {
    //       $(".popup_video")
    //         .removeClass("open")
    //         .addClass("close"),
    //         setTimeout(function() {
    //           $(".popup_video").remove();
    //         }, 1400);
    //     });
    // });
});

var tag = document.createElement("script");
tag.src = "https://www.youtube.com/player_api";
var firstScriptTag = document.getElementsByTagName("script")[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
var player,
  card = $(".playControl");
//控制css transform角度計算
$(".showPlayer").mousemove(function(e) {
  var t = card.offset().left + card.width() / 2,
    n = card.offset().top + card.height() / 2,
    a = parseInt(-(e.pageX - t) / 10),
    r = parseInt((e.pageY - n) / 5);
  card.css({
    transform:
      "rotateY(" +
      a +
      "deg) rotateX(" +
      r +
      "deg) translateY(" +
      -a / 10 +
      "%)",
    boxShadow: a / 2 + "px " + -r / 2 + "px 30px 0 rgba(253, 196, 72, 0.514)" //陰影計算
  });
}),
  $(document).ready(function() {
    function e() {
      $(t).each(function(n) {
        setTimeout(function() {
          var a = Math.floor(11 * Math.random()),
            r = $(t)[a];
          $(r).addClass("animation"),
            n === $(t).length - 1 &&
              $(".animation").length !== $(t).length &&
              e();
        }, 1500 * n);
      });
    }
    if (window.matchMedia("(min-width: 960px)").matches) {
      var t = $(".pulseJs");
      e();
    }
  });
//視差滑鼠動態
// var scene = document.getElementById("parallax_box");
// var parallax = new Parallax(scene);
$("#scene2").parallax();

//在此留名 :o
console.log("%c \n1101 \n11                   0000000000000   000 \n100001 11 10100000000   0000100011     100011110 \n0000000000000 00000000000   1111100000000000000000000 \n000100000           00000  0000000001111   0000  0000 \n10000           00000       10001111   0000  0001 \n10000000000000  1111000000   0000000000001  0001 10001 \n0000000000111  00000000001  1001  10011001 10001 10001 \n111                                         00000     00000        10011000  100  0000  1000 \n1 111111  111111000000000000000                              111        00000     00000        1000000  1000  0000  0000 \n1111111111100000000000000000000000000001            111111000000000000000    000 00000000 100000        0000000000010  0000  0000 \n1111111111 10000000000000000000000000000        00000000000000000000000000    000 00000000 100000000000  11   00011111 10000  0000 \n1111     1 00000000000000000000000000000        000000000000111111           1001 00001     10111111 1   0000000000000000000  0000 \n1100000000000000000010000000000        1                            1000000001           11101  1111100011111000001 10000 \n1110000011111111     1000000000                                     100000000000000000000000001 0000000000000000000 100001 \n1                   1000000000                                      10000000000000000000000000  10111               100001 \n1      1 1000000000                                       1000 1000111111                                 10001 \n111111000000000001     1 0000000000                                                                   1111110000000000001 \n1000000000000000000000000001     1 0000000000                            11                    1111110       00000000000000000000001 \n00000000000000000000000000      1 0000000000              1 111111111111111 1111110000001    0000000001      0000000000000000000000 \n1110000000000000000000000000      110000000001           111111110011 111 1000000000000000000   0000000000     00000000000 \n111000000000000000000000011      110000000001    000000000000000000001   000000000000000000001  0000000000    100011000001       11111 \n11 10000000011111111             110000000001    1000000000000000000000   0000000011111 0000001 100001 0000    0000 101100 100000000000 \n11 000000000               111 1110000000001     0000000000000010000000  1000001        000000  100101 111111111  1    100 000000000001 \n11 00000000011111000000000000  110000000001      000000          000000  000000         00001 11     111    11  11  111000 11111 \n1110000000000000000000000001   10000000001       000000         1000000  000000         0001  1 111111  0001 1000   000000 \n111000000000000000000000001  110000000001        000000         0000001  000000        1000000  000001  000010000  1000001 00000000000 \n1 100000000000000000000001 1100000000001        1000000         0000001  000000        1000001  00000   00000000   1000001 00000000000 \n11 10000000001111111111    11 1                  11111111111111  000000  1000001 1111111000000  100000   10000001   000000 100000000001 \n11 0000000001                        1111111111111     11111 1  1000000  100000000000000000001  000000    000000    000011 111 \n11 000000000     1111100000000001  11111111111111         1111000000001   0000000000000000001   000001    111 \n11 0000000000000000000000000000   111111111111   000000000000000000001     000000000111111 \n111000000000000000000000000000                  10000000000000000011 \n1 100000000000000000000000000                   101111 \n11 10000000000000000000000011 \n11100000001111111111111111 \n111111111111 ")