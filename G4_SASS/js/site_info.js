window.onpageshow = function(event) {
    if (event.persisted) {
        window.location.reload() 
    }
};
$(function(){
    $("#bowling_site").click(function () {
        // var bowling = $(".bowling");
        // var bowlingbgc = $(".bgc");
        $('.ani_bowling').addClass("active");
        if($(window).width() < 415){
            $('.ani_bowling_bgc').animate({
                left: '-50%',
            }, 1400, function () {
                window.location.href = "bowling.php";
            });
        }else{
            $('.ani_bowling_bgc').animate({
                left:'-50%',
            },1680,function(){
                window.location.href = "bowling.php";
            });
        }
    });
    $("#basketball_site").click(function () {
        // var bowling = $(".bowling");
        // var bowlingbgc = $(".bgc");
        $('.ani_basketball').addClass("active");
        if ($(window).width() < 415) {
            $('.ani_basketball_bgc').animate({
                right: '-50%',
            }, 1500, function () {
                window.location.href = "basketball.php";
            });
        }else{
            $('.ani_basketball_bgc').animate({
                right: '-50%',
            }, 1900, function () {
                window.location.href = "basketball.php";
            });
        }
    });
    $("#badminton_site").click(function () {
        // var bowling = $(".bowling");
        // var bowlingbgc = $(".bgc");
        $('.ani_badminton').addClass("active");
        if ($(window).width() < 415) {
            $('.ani_badminton_bgc').animate({
                top: '0',
            }, 1000, function () {
                window.location.href = "badminton.php";
            });
        } else {
            $('.ani_badminton_bgc').animate({
                top: '0',
            }, 1200, function () {
                window.location.href = "badminton.php";
            });
        }
    });
    $("#climbimg_site").click(function () {
        // var bowling = $(".bowling");
        // var bowlingbgc = $(".bgc");
        $('.ani_climbimg').addClass("active");
        if ($(window).width() < 415) {
            $('.ani_climbimg_bgc').animate({
                bottom: '0',
            }, 1475, function () {
                window.location.href = "climbimg.php";
            });
        } else {
            $('.ani_climbimg_bgc').animate({
                bottom: '0',
            }, 1425, function () {
                window.location.href = "climbimg.php";
            });
        }
    });
})