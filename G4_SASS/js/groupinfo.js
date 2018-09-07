
    $(document).ready(function(){

    // $('.join').click(function switchJoin(){
    //     var join = document.getElementById("join").text;
    //     if (join === "我要退團") {

    //     }

    // });
    // $("#submitExample").click(function() { //ID 為 submitExample 的按鈕被點擊時
    //     $.ajax({
    //         type: "POST", //$
    //         url: "../php/logout_team.php", //傳送目的地
    //         dataType: "json", //資料格式,
    //         success: function(data) {
    //             if ($('.join') == "我要退團") { //如果後端回傳 json 資料有 nickname
    //                 $("#demo")[0].reset(); //重設 ID 為 demo 的 form (表單)
    //                 $("#result").html('<font color="#007500">您的暱稱為「<font color="#0000ff">' + data.nickname + '</font>」，性別為「<font color="#0000ff">' + data.gender + '</font>」！</font>');
    //             } else { //否則讀取後端回傳 json 資料 errorMsg 顯示錯誤訊息
    //                 $("#demo")[0].reset(); //重設 ID 為 demo 的 form (表單)
    //                 $("#result").html('<font color="#ff0000">' + data.errorMsg + '</font>');
    //             }
    //         },
    //         error: function(jqXHR) {
    //             $("#demo")[0].reset(); //重設 ID 為 demo 的 form (表單)
    //             $("#result").html('<font color="#ff0000">發生錯誤：' + jqXHR.status + '</font>');
    //         }
    //     })
    // });

    // $(".join").click(function() {
    //     if($('.join').innerHTML() == "我要退團"){
    //         var xhr = new XMLHttpRequest();
    //         xhr.onload = function(){
    //             if (xhr.status == 200){
    //                 xhr.open("get", "../php/logout_team.php", true);
    //                 xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    //         }
    //     }
    //     alert(xhr.status);
    //     }
    // });

    // $("#join").click(function checkJoinMem(){
    //     //var xhr = new XMLHttpRequest();
    //     //xhr.onload = function(){
    //         //if (xhr.status == 200){
    //             if($("#link_member").text() == "登入"){
    //             alert("請先登入");
    //             return false;
    //             }//elseif($("#join").text() == "我要參團"){
    //                 //xhr.open("get", "../php/login_team.php", true);
    //             //}
    //                 //xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    //         }
    // //}
    //     });

    var fbhtml_url=window.location.toString();

    $("#join").click(function checkJoin(){
        if($("#link_member").text() == "登入"){
            alert("請先登入");
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
        }else{
            $('messageForm').submit()
        }
        });


    $("#join").click(function logoutTeam(){
            $('leaveForm').submit()
        });
    });



