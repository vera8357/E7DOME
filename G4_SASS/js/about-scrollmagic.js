$(function () {

  var tls = new TimelineMax();
  var controller = new ScrollMagic.Controller();


  var tween_s = tls.to(".business-info .speed-ball", 1, {
    y: 1100,x: -1200, ease: Expo.easeInOut,
    scale: 10, alpha: 1 });


  //第一個場景
  var scence_01 = new ScrollMagic.Scene({
    triggerElement: "#trigger_01",
    offset: 0,
    duration: '85%',
    reverse: true
  }).setTween(tween_s)
    // .addIndicators({name: '羽球爆發'})
    .addTo(controller)

  console.log("scrollmagic")


})
