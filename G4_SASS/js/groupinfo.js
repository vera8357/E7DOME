
    $(document).ready(function(){

    var fbhtml_url=window.location.toString();

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
});





