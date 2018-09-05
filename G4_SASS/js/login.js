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


function close_2() {
  $id('check_id').innerHTML = '';
  $id('check_psw').innerHTML = '';
  $id('enroll_id').value = '';
  $id('enroll_psw1').value = '';
  $id('enroll_psw2').value = '';
  $id('enroll_name').value = '';
  $id('enroll_tel').value = '';
  $id('enroll').style.display = 'none';
  $id('sing_in').style.display = 'none';

}



function show_enroll() {
  $id('enroll').style.display = 'block';
  $id('sing_in').style.display = 'none';
}

// 檢察密碼是否相同
function check_psw() {
  var psw_1 = $id('enroll_psw1').value;
  var psw_2 = $id('enroll_psw2').value;

  if (psw_2 == psw_1) {
    $id('check_psw').innerHTML = "";
    $id('enroll_send').disabled = false;

  } else {
    $id('check_psw').innerHTML = "密碼不同";
    $id('enroll_send').disabled = true;
  }


}


function check_tel() {
  re = /^[09]{2}[0-9]{8}$/;
  if (!re.test($id('enroll_tel').value)) {
    alert('手機號碼不符合規範');
    $id('enroll_send').disabled = true;
  } else {
    $id('enroll_send').disabled = false;
  }
}




function check_id() {

  var xhr = new XMLHttpRequest();

  xhr.onload = function () {

    if (xhr.status == 200) {
      var reply = xhr.responseText

      if (reply == "帳號已存在") {
        document.getElementById("check_id").innerHTML = reply;
        $id('enroll_send').disabled = true;
      } else {
        document.getElementById("check_id").innerHTML = "";
        $id('enroll_send').disabled = false;
      }

    } else {
      alert(xhr.status);

    }
  }
  var url = "php/check_id.php?enroll_id=" + document.getElementById("enroll_id").value;
  xhr.open("get", url, true);
  xhr.send(null);

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
  $id('close_2').onclick = close_2;

  // 顯示註冊登箱
  $id('enroll_btn').onclick = show_enroll;

  // 檢察密碼是否相同
  $id('enroll_psw1').onchange = check_psw;
  $id('enroll_psw2').onchange = check_psw;

  //檢查電話是否正確
  $id('enroll_tel').onchange = check_tel;

  // 檢查帳號是否有重複
  $id('enroll_id').onchange = check_id;

  if (document.body.clientWidth > 768) {
    $id('bar').onmouseover = show_headerdropdown;

    $id('bar').onmouseout = exit;
  }






}; //window.onload


window.onload = init;

