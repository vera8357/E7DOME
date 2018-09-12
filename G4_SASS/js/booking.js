console.log('booking.js');
// create 7 days calendar from today
function bookingCal() {
	let tdy = new Date();
	tdy.setDate(tdy.getDate()+1); // OFFSET DATE TO TOMORROW!!!
	
	let y = tdy.getFullYear(); // console.log(y);
	let d = tdy.getDate(); 
	let w = tdy.getDay(); //console.log(w);
	let m = tdy.getMonth(); // console.log(m);

	let idx = {'0':31, '1':28, '2':31, '3':30, '4':31, '5':30,
			   '6':31, '7':31, '8':30, '9':31, '10':30, '11':31}

	let mln = idx[m];
	if (m == 1 && ly() == true) { mln = idx[m] + 1; } // if FEB and LY, d = 29

	tbl();// GNR8 cal table

	const mmm = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'];
	
	const www = ['SUN', 'MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT'];
	// GNR8 date
	for (var j = 0; j < 4; j++) { // 4 fac booking cal

		var wwwText ='';
		for (var i = 0; i < 7; i++) { // 7 days
			
			var yyyy = y; var m12 = m; var d7  = d + i; // tdy +1, +7
			 if ( d7 > mln ) { 
			 	d7 = ( d + i ) - mln; // crossing mth d str from 1 again
			 	m12 = m + 1; // mth +1 to next mth

			 	if ( m12 > 11 ){
			 		m12 = (m + 1) - 12; // crossing year fix
			 		yyyy = y + 1; //console.log(yyyy);
			 	}
			 }

			 var w7 = w + i; // crossing week
			 if( w7 > 6) { 	w7 = w7 - 7; }		 

			 var wwwText = wwwText + '.date:nth-child(' +( i+1 )+ ') .date-btn:after { content: "' +www[w7]+ '"; }\n';

			// 0-6, 7-13, 14-20, 21-27
			$('.date')[j*7 + i].innerHTML =
			'<a href="#" class="text-hover-yellow date-btn" data-yyyy="' +yyyy+ '">' +mmm[m12]+ '/' +d7 + '</a>';
		}
	}
	$('head').append('<style></style>');
	$('style').html(wwwText);

}

//	CHK Leap Year
function ly(){
	let tdy = new Date();
	let y = tdy.getFullYear();	// a.d. 96, 400 = LY /  a.d 100 != LY
	return ( ((y % 4 == 0) && ( y % 100 != 0)) || (y % 400 == 0) ) ? true : false;
}

// GNR8 CAL TABLE
function tbl() {
	var tblDate = $('.table-date');

	var row = [];
	for (var k = 0; k < tblDate.length; k++) {
		row[1] = tblDate[k].insertRow(1);

		for (var j = 0; j < 7; j++) {
			row[1].insertCell(j).className = 'date';
		}

	}
}

function targetBgc(){
	$('.date-btn').each(function(){
		$(this).click(function(){
			$('.date-btn').not(this).css("background-color", "#FFFFFF");
			$(this).css("background-color", "#FB9A00");
			
		});
	});
}