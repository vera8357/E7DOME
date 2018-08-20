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
				// document.getElementById("phone_number").value = reply_phone;
				alert('更新成功');
			}

		}else{
			alert(xhr.status);
		}
	}
	

	  xhr.open("Post", "../php/updata_phone.php", true);
      xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
      var data_info = "change_tel=" + document.getElementById("phone_number").value
      				+ "&MEM_NO=" + document.getElementById("MEM_NO").value;      
      xhr.send(data_info);
}






function init(){
	//修改手機號碼
	$id('update_phone').onclick = update_phone;

	//修改密碼
}


 window.onload=init;