function $id(id) {
  return document.getElementById(id);
}

function showLoginForm() {

  if ($id('link_member').innerHTML == "登入") {
    $id('sing_in').style.display = 'block';
  }

}

function sendForm() {
  //=====使用Ajax 回server端,取回登入者姓名, 放到頁面上    
  var xhr = new XMLHttpRequest();

  xhr.onload = function () {
    if (xhr.status == 200) {
      if (xhr.responseText == "NG") {
        alert("帳密錯誤");
      } else {
        document.getElementById("pic_a").style.display = "block";
        document.getElementById("pic_a").href = 'memberinfo.php';
        document.getElementById("m_pic").src = 'images/member_pic/' + xhr.responseText;
        document.getElementById("link_member").innerHTML = "";
        window.location.reload();

      }

    } else {
      alert(xhr.status);
    }
  }

  xhr.open("Post", "php/ajax_login.php", true);
  xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
  var data_info = "MEM_ID=" + document.getElementById("MEM_ID").value
    + "&MEM_PSW=" + document.getElementById("MEM_PSW").value;
  xhr.send(data_info);
  //將登入表單上的資料清空，並隱藏起來
  $id('sing_in').style.display = 'none';
  $id('MEM_ID').value = '';
  $id('MEM_PSW').value = '';

}


function close_1() {
  $id('sing_in').style.display = 'none';
  $id('MEM_ID').value = '';
  $id('MEM_PSW').value = '';
}



function show_headerdropdown() {
  var link_member = document.getElementById('link_member');
  if (link_member.innerHTML == '登入') {
    document.getElementsByClassName('headerdropdown')[0].style.display = 'none';
  } else {
    document.getElementsByClassName('headerdropdown')[0].style.display = 'block';
  }
}
function exit() {
  document.getElementsByClassName('headerdropdown')[0].style.display = 'none';
}



function init() {

  // 登入燈箱
  $id('link_member').onclick = showLoginForm;


  // 登入確認
  $id('login_btn').onclick = sendForm;

  // 登入燈箱 註冊登箱 清空關閉
  $id('close_1').onclick = close_1;
  // $id('close_2').onclick = close_2;

  if (document.body.clientWidth > 992) {
    $id('bar').onmouseover = show_headerdropdown;

    $id('bar').onmouseout = exit;
  }


}; //window.onload


window.onload = init;

