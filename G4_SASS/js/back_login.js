	function $id(id){
			return document.getElementById(id);
		}



		function login() {

  			var xhr = new XMLHttpRequest();

  			xhr.onload = function () {
    			if (xhr.status == 200) {
     			 	if (xhr.responseText == "帳號密碼錯誤") {
       			 		alert("帳密錯誤");
     			 	} else {
      					window.location.href='back_mem.php'
     			 	}
   				 } else {
      			alert(xhr.status);
   				}
 			 }

  			xhr.open("Post", "php/back_ajax_login.php", true);
  			xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
  			var data_info = "admin_id=" + document.getElementById("admin_id").value
   			 			+ "&admin_psw=" + document.getElementById("admin_psw").value;
  			xhr.send(data_info);

		}





		function init(){
			$id('btn_login').onclick = login;
		}



		window.onload = init;