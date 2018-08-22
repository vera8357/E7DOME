$(function(){
    // var scrollMagicController = new ScrollMagic();
    // var tween = TweenMax.to('#site_tri1',1,{
    //     rotation:360
    // });

    // var scene = new ScrollMagic.Scene({
    //     triggerElement: '#peteweber',
    //     offset: 0
    // })

    // .setTween(tween)
    // .addTo(scrollMagicController)

    // scene.addIndicators();

    var controller = new ScrollMagic.Controller({
        globalSceneOptions: {duration: 0}
    });

    var tween = TweenMax.to('.site_info_tri1',.3,{
        right:0
    });

    var scene = new ScrollMagic.Scene({
        triggerElement:'.site_info',
        offset:0,
        reverse:true
    })
    
    .addIndicators()
    .setTween(tween)
    .addTo(controller);
    
    var tween2 = TweenMax.to('.site_info_tri2',.3,{
        left:0
    });

    var scene = new ScrollMagic.Scene({
        triggerElement:'.site_info',
        offset:300,
        reverse:true
    })

    .addIndicators()
    .setTween(tween2)
    .addTo(controller);

    var tween3 = TweenMax.to('.assess_tri1',.3,{
        left:0
    });

    var scene = new ScrollMagic.Scene({
        triggerElement:'.assess',
        offset:0,
        reverse:true
    })

    .addIndicators()
    .setTween(tween3)
    .addTo(controller);

    var tween4 = TweenMax.to('.assess_tri2',.3,{
        right:0
    });

    var scene = new ScrollMagic.Scene({
        triggerElement:'.assess',
        offset:300,
        reverse:true
    })

    .addIndicators()
    .setTween(tween4)
    .addTo(controller);

    var tween5 = TweenMax.to('.group_page_tri',.3,{
        right:0
    });

    var scene = new ScrollMagic.Scene({
        triggerElement:'.assess',
        offset:300,
        reverse:true
    })

    .addIndicators()
    .setTween(tween5)
    .addTo(controller);

    
    var tween6 = TweenMax.to('.bgcball',1.5,{
        left:100,
        rotation:360
    });

    var scene = new ScrollMagic.Scene({
        triggerElement:'.group_page',
        offset:0,
        reverse:true
    })

    .addIndicators()
    .setTween(tween6)
    .addTo(controller);
});