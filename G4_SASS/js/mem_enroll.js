function $id(id) {
  return document.getElementById(id);
}

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


function init(){

	// 檢察密碼是否相同
  $id('enroll_psw2').onchange = check_psw;

  //檢查電話是否正確
  $id('enroll_tel').onchange = check_tel;

  // 檢查帳號是否有重複
  $id('enroll_id').onchange = check_id;

  if (document.body.clientWidth > 768) {
    $id('bar').onmouseover = show_headerdropdown;

    $id('bar').onmouseout = exit;
}

}
window.onload = init;