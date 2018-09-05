function $id(id){
	return document.getElementById(id);
}	


function update_phone(){
	var xhr = new XMLHttpRequest();

	xhr.onload = function(){
		
		if(xhr.status == 200){
			var reply_phone = xhr.responseText

			if( reply_phone == "請通知服務人員"){
				alert('reply_phone');
			}else{
				document.getElementById("phone_number").value = reply_phone;
				alert('更新成功');
			}

		}else{
			alert(xhr.status);
		}
	}
	

	  xhr.open("Post", "php/updata_phone.php", true);
      xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
      var data_info = "change_tel=" + document.getElementById("phone_number").value
      				+ "&MEM_NO=" + document.getElementById("MEM_NO").value;      
      xhr.send(data_info);
}


function check_phone(){

	phone = /^[09]{2}[0-9]{8}$/;
  if(!phone.test($id('phone_number').value)){
    alert('手機號碼不符合規範');
    $id('update_phone').disabled=true;
  }else{
  	console.log('手機符合規範');
  	$id('update_phone').disabled=false;
  }


}




function  check_old_psw(){

	var xhr = new XMLHttpRequest();
	xhr.onload=function(){

		if(xhr.status == 200){

			if( xhr.responseText == "密碼錯誤" ){
				alert("舊密碼輸入錯誤");
			}else{
				console.log(xhr.responseText);
			}
		

		}else{
			alert(xhr.status);
		}
	}

	 xhr.open("Post", "php/check_old_psw.php", true);
     xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
     var data_info = "old_psw=" + document.getElementById("old_psw").value
      				+ "&MEM_NO=" + document.getElementById("MEM_NO").value; 
      			   
     xhr.send(data_info);

}

function  check_new_psw(){

	 var new_psw1 = $id('new_ps1').value;
     var new_psw2 = $id('new_ps2').value;

    if( new_psw1 == new_psw2 ){
        
       console.log('密碼相符');

    }else{
      alert('密碼不一致,請更改');
     
    }

}

function update_psw(){

	if($id('old_psw').value != "" & $id('new_ps1').value != '' & $id('new_ps2').value != '' ){

		var xhr = new XMLHttpRequest();

		xhr.onload = function(){
			
			if(xhr.status == 200){
				var reply_psw = xhr.responseText

				if( reply_psw == "密碼更新成功"){
					alert(reply_psw);
				}else{
					
					alert('系統發生錯誤,請通知服務人員');
				}

			}else{
				alert(xhr.status);
			}
		}
	

		  xhr.open("Post", "php/updata_psw.php", true);
	      xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
	      var data_info = "new_psw=" + document.getElementById("new_ps1").value
	      				+ "&MEM_NO=" + document.getElementById("MEM_NO").value;      
	      xhr.send(data_info);

	}else{

		alert('表單填寫不完整');
	}

	$id('old_psw').value='';	
	$id('new_ps1').value='';	
	$id('new_ps2').value='';	

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
	//送出修改手機號碼
	$id('update_phone').onclick = update_phone;
	// 確認手機號碼是否符合格式
	$id('phone_number').onchange = check_phone;

	//修改密碼

	//確認原先密碼一致
	$id('old_psw').onchange = check_old_psw;

	//確認新密碼和確認密碼欄位輸入一致
	
	$id('new_ps2').onchange = check_new_psw;

	//送出確認修改密碼
	$id('update_psw').onclick = update_psw;

	if (document.body.clientWidth > 768) {
		$id('bar').onmouseover = show_headerdropdown;

		$id('bar').onmouseout = exit;
	}
}


 window.onload=init;