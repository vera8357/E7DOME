// $(document).ready(function () {
//     $("#bowling_site").click(function () {
//         $(".bowling").addClass("active");
//         $(".bgc").addClass("active");
//     });
// });

$(function(){
    $("#bowling_site").click(function () {
        // var bowling = $(".bowling");
        // var bowlingbgc = $(".bgc");
        $('.ani_bowling').addClass("active");
        $('.ani_bowling_bgc').animate({
            left:'-50%',
        },1750,function(){
            window.location.href = "bowling.html";
        });
    });
    $("#basketball_site").click(function () {
        // var bowling = $(".bowling");
        // var bowlingbgc = $(".bgc");
        $('.ani_basketball').addClass("active");
        $('.ani_basketball_bgc').animate({
            right: '-50%',
        }, 1900, function () {
            window.location.href = "basketball.html";
        });
    });
    $("#badminton_site").click(function () {
        // var bowling = $(".bowling");
        // var bowlingbgc = $(".bgc");
        $('.ani_badminton').addClass("active");
        $('.ani_badminton_bgc').animate({
            top: '0',
        }, 700, function () {
            window.location.href = "badminton.html";
        });
    });
})