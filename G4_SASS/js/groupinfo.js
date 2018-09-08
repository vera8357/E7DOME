
    $(document).ready(function(){

    var fbhtml_url=window.location.toString();
    $(".createGroup").click(function createGroupCheck(){
        if($("#link_member").text() == "登入"){
            alert("請先登入");
        }else{
        $id('create_in').style.display = 'block';
        }
    });

    $("#close_3").click(function close3(){
        $id('create_in').style.display = 'none';
    });


    $("#join").click(function checkJoin(){
        if($("#link_member").text() == "登入"){
            alert("請先登入");
            return false;
        }else{
            $('#join').submit()
            return true;
        }
    });


    $(".myGroup").click(function checkMem(){
        if($("#link_member").text() == "登入"){
            alert("請先登入");
            return false;
        }else{
            $('.myGroup').submit()
        }
    });


    $("#submit").click(function checkMsg(){
        if($("#MSG_INFO").val()==""){
            alert("請輸入留言");
            eval("document.messageForm['MSG_INFO'].focus()");
            return false;
        }else if($("#link_member").text()=="登入"){
            alert("請先登入");
            return false;
        }else if($("#join").text()=="我要參團"){
            alert("請先加入揪團");
            return false;
        }else{
            $('messageForm').submit()
        }
        });
        $('#heart').click(function(){
            if($("#link_member").text() == "登入"){
                alert("請先登入");
                return false;
            }else{
                $('#heart').submit()
            }
        });
});





