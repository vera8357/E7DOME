

// function alter(e){
// var alert = e.target




// }

// console.log(i);

// function init(){
// 	var btn_alter = document.getElementsByClassName('btn_alter');
// 	for(var i = 0; i < btn_alter.length; i++){
// 		btn_alter[i].addEventListener('click',alter,false);
		
// 		return i
// 	}
// }


// window.onload = init;

function alert(no){

	var status = "status" + no;
	var perm ="perm" + no;
	console.log(status);
	document.getElementById(status).disabled = false;
	document.getElementById(perm).disabled = false;
}