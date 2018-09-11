$(document).ready(function(){
  var tl = new TimelineMax();
  var t2 = new TimelineMax({ delay: 1.5 });
  var t3 = new TimelineMax({ delay: 1});
  var bgd = $('.basketfloor , .bowlingfloor , .badminfloor , .climbingfloor');

  tl.from(bgd, 1, { opacity: 0, scale: 0, transformOrigin: 'center center', ease: Elastic.easeOut.config(1, 0.3) });

  t2.from('.item01', 0.5, { opacity: 0 }).from('.item01', 0.5, { y: -50, ease: Elastic.easeOut.config(1, 0.3) });
  t3.from('.item02', 0.5, { opacity: 0 }).from('.item02', 0.5, { y: -50, ease: Elastic.easeOut.config(1, 0.3) });
});


