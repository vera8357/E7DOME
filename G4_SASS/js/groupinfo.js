
    $(document).ready(function(){



    $(".createGroup").click(function createGroupCheck(){
        if($("#link_member").text() == "登入"){
            alert("請先登入");
            $("#sing_in").css("display","block");
        }else{
        $id('create_in').style.display = 'block';
        }
    });

    $("#close_3").click(function close3(){
        $id('create_in').style.display = 'none';
    });



    $("#join").click(function checkJoin(){
        if($("#link_member").text() == "登入"){
            $("#sing_in").css("display","block");
            return false;
        }else{
            $('#join').submit()
            return true;
        }
    });


    $(".myGroup").click(function checkMem(){
        if($("#link_member").text() == "登入"){
            alert("請先登入");
            $("#sing_in").css("display","block");
            return false;
        }else{
            $('.myGroup').submit()
        }
    });

    $("#editGroup").click(function editGroup(){
            $("#edit").css("display","block");
    });
    $("#close_4").click(function close4(){
        $('#edit').css("display","none");
    });

    $("#submit").click(function checkMsg(){
        if($("#MSG_INFO").val()==""){
            alert("請輸入留言");
            eval("document.messageForm['MSG_INFO'].focus()");
            return false;
        }else if($("#link_member").text()=="登入"){
            $("#sing_in").css("display","block");
            alert("請先登入");
            return false;
        }else if($("#join").text()=="我要參團"){
            alert("請先加入揪團");
            return false;
        }else{
            $('messageForm').submit()
        }
        });

        $('.selectSport').click(function changesport(){
            var sport = $('.selectSport option:selected').val();
            if(sport == .1){
                $('.group-body').css("background","url('images/fac-bask.jpg') no-repeat center fixed");
                $('.group-body').css("background-size","cover");
                $('.group-body').css("transition",".7s");
                $('.group-body').css("transition-timing-function","ease-in");
                return false;
            }else if(sport == .2){
                $('.group-body').css("background","url('images/fac-bowling.jpg') no-repeat center fixed");
                $('.group-body').css("background-size","cover");
            }else if(sport == .3){
                $('.group-body').css("background","url('images/fac-bad.jpg') no-repeat center fixed");
                $('.group-body').css("background-size","cover");
            }else if(sport == .4){
                $('.group-body').css("background","url('images/fac-climb.jpg') no-repeat center fixed");
                $('.group-body').css("background-size","cover");
            }else{
                $('.group-body').css("background","url('images/climb.jpg') no-repeat center fixed");
                $('.group-body').css("background-size","cover");
            }
        });

});






