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

var scene = document.getElementById('parallax_box');
var parallax = new Parallax(scene);
