
$(document).ready(function(){
    var sliderCount = $('.slider ul li').length;
    var sliderWidth = $('.slider ul li').width();

    function movieleft(){
        console.log(sliderWidth);        
        $('.slider ul li:last-child').prependTo('.slider ul');
    
    };

    function movieright(){
        console.log(sliderWidth);
        $('.slider ul li:first-child').appendTo('.slider ul');
        $('.slider ul')
    
    };

    $('.control_prev').click(function(){
        console.log(sliderWidth);
        movieleft();
    });


    $('.control_next').click(function(){
        console.log(sliderWidth);
        movieright();
    });
});