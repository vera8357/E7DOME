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
  //執行程式
  function() {
    $(".an-crane-area-2").fadeIn(),
      $(".an-crane-1-wrap, .an-crane-1-wrap, .an-crane-area-wrap").css(
        "animation-play-state",
        "paused"
      ),
      $(".an-crane-3-wrap").css("animation-play-state", "running");
  }
);

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
      .bind("mouseleave", function() {
        e.pause();
      }),
    $(".playControl, .play_video").click(function() {
      $("body").append(
        '<div class="popup popup_video"><div class="container"><div class="popup_bg"></div><div id="player" class="index_player"></div><div class="close close_video"></div></div></div>'
      ),
        $(".popup_video").addClass("open"),
        onYouTubePlayerAPIReady(),
        $(".close_video, .popup_video .popup_bg").click(function() {
          $(".popup_video")
            .removeClass("open")
            .addClass("close"),
            setTimeout(function() {
              $(".popup_video").remove();
            }, 1400);
        });
    });
});

var tag = document.createElement("script");
tag.src = "https://www.youtube.com/player_api";
var firstScriptTag = document.getElementsByTagName("script")[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
var player,
  card = $(".playControl");
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
    boxShadow: a / 2 + "px " + -r / 2 + "px 30px 0 rgba(47, 144, 211, 0.4)"
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

var scene = document.getElementById("parallax_box");
var parallax = new Parallax(scene);
