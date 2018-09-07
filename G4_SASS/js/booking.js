console.log('booking.js');

// accordion
var acc = document.getElementsByClassName("accordion");
var i;

function removeActive() {
	for (var i = 0; i < acc.length; i++) {
		acc[i].classList.remove("activeNow");
	}
}

for (i = 0; i < acc.length; i++) {
	acc[i].addEventListener("click", function() {
 	// clear all active
 	removeActive();
 	// add class
  	this.classList.add("activeNow");
	})
}

// booking calendar
// function $(className){
// 	return document.getElementsByClassName(className);
// }
// create 7 days calendar from today
function bookingCal(argument) {
	var tdy = new Date(); // console.log(tdy);
	var year = tdy.getFullYear();
	var dd = tdy.getDate(); // console.log(dd);
	// var dd = 28;
	var mm = tdy.getMonth() + 1;
	// mm =12;  //console.log(mm);
	var dd_length = 0;//當月最大天數
	if(mm<=7){//7月份以前
		if(mm%2==0){
			if(mm==2){//判斷2月份天數
				if(year % 4 == 0 && year % 100 != 0 || year % 100 ==0 && year % 400 == 0)
				dd_length = 29;
				else
				dd_length = 28;
			}
			else
			dd_length = 30; //偶數月30天
		}	
		else
		dd_length = 31; //奇數月31天
	}
	else{//7月份以後 
		if(mm%2==0)
		dd_length = 31; //偶數月30天
		else
		dd_length = 30; //奇數月31天
	}

	// GNR8 cal table
	calTable();

	// GNR8 date
	for (var j = 0; j < 4; j++) {
		var dds   = dd; //抓當日的日期
		var mms	  = mm; //抓當月的月份
		var years = year;//抓當月的年份

		for (var i = 0; i < 7; i++) {
			var dds = dd + i;
			if(dds>dd_length){//當日期大於最大日
				mms+=1;//月份+一天
				if(mms>12){//超過12月}
				mms=1;//月份回到1月
				years+=1;//+一年
				}
				dds=1;
			}
					
			$('.date')[j*7 + i].innerHTML = '<a href="#" class="text-hover-yellow date-btn">' + mm + '/' + dds + '</a>';
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