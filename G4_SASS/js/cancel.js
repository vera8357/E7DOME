
function cancel_booking(e){
	
	var xhr = new XMLHttpRequest();

	xhr.onload =function(){
		if(xhr.status == 200){
			
			document.getElementById('booking_check').innerHTML="已取消";
			alert('已完成取消');
		
		}else{
			alert(xhr.status);
		}

	}
    var book_order_no = e.target.nextSibling.value;
	var url = "php/cancel_booking.php?booking_no="+book_order_no;
	xhr.open("get", url,true);
	xhr.send(null)

}


function init(){
var cancel= document.getElementsByClassName('cancel');
	for(var i=0; i<cancel.length; i++){
		cancel[i].addEventListener("click", cancel_booking , false);
	}


}


window.onload =init;