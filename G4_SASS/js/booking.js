console.log('booking.js');

// accordion
var acc = document.getElementsByClassName("accordion");
var i;

function removeActive() {
	for (var i = 0; i < acc.length; i++) {
		acc[i].classList.remove("active");
	}
}

for (i = 0; i < acc.length; i++) {
	acc[i].addEventListener("click", function() {
 	// clear all active
 	removeActive();
 	// add class
  	this.classList.add("active");
	})
}

// booking calendar
function $(className){
	return document.getElementsByClassName(className);
}
// create 7 days calendar from today
function bookingCal(argument) {
	var tdy = new Date(); // console.log(tdy);
	var dd = tdy.getDate(); // console.log(dd);
	var mm = tdy.getMonth() + 1;  //console.log(mm);

	// GNR8 cal table
	calTable();

	// GNR8 date
	for (var j = 0; j < 4; j++) {
		for (var i = 0; i < 7; i++) {
			var dds = dd + i;
			$('date')[j*7 + i].innerHTML = '<a href="#" class="text-white text-hover-yellow">' + mm + '/' + dds + '</a>';
		}
	}

}

function calTable(argument) {
	// var tbl = document.getElementById('tbl');
	var tblDate = document.getElementsByClassName('table-date'); // console.log(tblDate[1]);

	var row = []; // console.log(row);
	for (var k = 0; k < tblDate.length; k++) {
		row[1] = tblDate[k].insertRow(1);

		for (var j = 0; j < 7; j++) {
			row[1].insertCell(j).className = 'date';
		}

	}
}
window.addEventListener('load',bookingCal);



// MODAL
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
var cancel = document.getElementsByClassName("cancel")[0];

// When the user clicks on the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

cancel.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}