

window.addEventListener("load",function(){

	document.getElementById('upfile').onchange=function(e){

		var file = e.target.files[0];

		var reader = new FileReader();

		reader.onload=function(){

			document.getElementById('show_pic').src=reader.result;
		}

		reader.readAsDataURL(file);


	}


},false)