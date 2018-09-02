function $id(id){
	return document.getElementById(id);
}

function alter(e){
	

}

function init(){
	var btn_alter = document.getElementsByClassName('btn_alter');
	for(var i = 0; i < btn_alter.length; i++){
		btn_alter[i].addEventListener('click',alter,false);
	}
}


window.onload = init;