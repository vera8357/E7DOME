var tl = new TimelineMax({
  repeatDelay: 1,
});

tl.to('.triangle-yellow', 1, {
  x: -200
}, 1).to('.trapezoid-blue , .rectangle-blue', 1, {
  x: 600
}, 2);
function action() {
}

$("#message").delay(3000).fadeIn(1000);