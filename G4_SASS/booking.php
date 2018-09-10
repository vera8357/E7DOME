<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Examples</title>
	<link rel="stylesheet" href="css/booking.css">
	<link rel="stylesheet" href="css/font.css">
</head>

<body>
	<?php include 'header.php';?>

<?php
	if( isset($_SESSION['refreshChk']) ){
		unset($_SESSION['refreshChk']);
	}

    if(isset($_SESSION["cate_no"])){
        $cate_no = $_SESSION["cate_no"];
        // unset($_SESSION["cate_no"]);
    }else{
        $cate_no = 2;
    }
?>

<div class="container">
	<div class="area area1">
		<h3 class="text-lg">籃球場</h3>
		<div class="mask">
			<div class="court panel">
				<h3 class="text-xxlg padding-32">籃球場</h3>
				<table id="tbl1" class="table-date" data-cate="1">
					<caption class="text-white text-lg padding-16">選擇預約日期</caption>
					<tr></tr>
				</table>
				<table class="table-select text-white">
					<thead class="table-select-thead">
						<tr>
							<th>場地</th>
							<th>時段</th>
							<th>點數</th>
							<th>狀態</th>
						</tr>
					</thead>
					<tbody class="table-select-scroll" id="queryFac1">

			  		</tbody>
				</table>
			</div><!-- panel -->
			<div class="content"></div>
		</div>
	</div>

		<!-- BADMINTON -->
		<div class="area area2">
			<h3 class="text-lg">保齡球場</h3>
			<div class="mask">
				<div class="court panel">
					<h3 class="text-xxlg padding-32">保齡球場</h3>
					<table id="tbl2" class="table-date" data-cate="2">
						<caption class="text-white text-lg padding-16">選擇預約日期</caption>
						<tr>
						</tr>
					</table>
					<table class="table-select text-white">
						<thead class="table-select-thead">
							<tr>
								<th>場地</th>
								<th>時段</th>
								<th>點數</th>
								<th>狀態</th>
							</tr>
						</thead>
						<tbody class="table-select-scroll" id="queryFac2">	

				  		</tbody>
					</table>
				</div><!-- panel -->
				<div class="content">
				</div>
			</div>
		</div>

		<!-- CLIMBLING -->
		<div class="area area4">
			<h3 class="text-lg">攀岩場</h3>
			<div class="mask">
				<div class="court panel">
					<h3 class="text-xxlg padding-32">攀岩場</h3>
					<table id="tbl3" class="table-date" data-cate="4">
						<caption class="text-white text-lg padding-16">選擇預約日期</caption>
						<tr>
						</tr>
				<table class="table-select text-white">
					<thead class="table-select-thead">
						<tr>
							<th>場地</th>
							<th>時段</th>
							<th>點數</th>
							<th>狀態</th>
						</tr>
					</thead>
					<tbody class="table-select-scroll" id="queryFac4">

			  		</tbody>
				</table>
				</div><!-- panel -->
				<div class="content">
				</div>
			</div>
		</div>

		<div class="area area3">
			<h3 class="text-lg">羽球場</h3>
			<div class="mask">
				<div class="court panel">
					<h3 class="text-xxlg padding-32">羽球場</h3>
					<table id="tbl4" class="table-date" data-cate="3">
						<caption class="text-white text-lg padding-16">選擇預約日期</caption>
						<tr>
						</tr>
					</table>
				<table class="table-select text-white">
					<thead class="table-select-thead">
						<tr>
							<th>場地</th>
							<th>時段</th>
							<th>點數</th>
							<th>狀態</th>
						</tr>
					</thead>
					<tbody class="table-select-scroll" id="queryFac3">

			  		</tbody>
				</table>
				</div><!-- panel -->
				<div class="content">
				</div>
			</div>
		</div>

	<!-- The Modal -->
	<div id="myModal" class="modal">
		<!-- Modal content -->
		<div class="modal-content">
			<div class="modal-header">
				<div class="padding-md dim-blue text-white clearfix">
					<h3 class="left">確認預約</h3>
					<span class="close">&times;</span>
				</div>
			</div>
			<div class="modal-body padding-32">


<form action="booInsert.php" method="get">
	<table class="table-modal">
		<thead>
			<tr>
				<th>預約場地</th>
				<th>預約日期</th>
				<th>預約時段</th>
				<th>場地點數</th>
			</tr>
		</thead>
		<tbody id="tbl-md">
			
		</tbody>
	</table>
	<div class="modal-btn-container margin-top-16">
		<div class="modal-btn">
			<input type="button" class="btn dim-orange cancel" value="取消預約">
		</div>
		<div class="modal-btn">
			<input type="submit" class="btn dim-blue" value="確認預約">
		</div>
	</div>
</form>

			</div><!-- modal-body -->
		</div>
	</div><!-- modal -->

</div><!-- container -->
	


<script src="libs/jquery/dist/jquery.min.js"></script>
<script src="js/booking.js"></script>

<script>
// accordion
function accActiveNow(){
	var cate_no = <?php echo $cate_no ?>;

	switch(cate_no){
	    case 1:
	        $('.area1').addClass('activeNow');
	        break;
	    case 2:
	        $('.area2').addClass('activeNow');
	        break;
	    case 3:
	        $('.area3').addClass('activeNow');
	        break;
	    case 4:
	        $('.area4').addClass('activeNow');
	        break;
	    default:
	        $('.area1').addClass('activeNow');
	        break;
	};

	$('.area').on('click',function(){
	    $('.area').not(this).removeClass('activeNow');
	    $(this).addClass('activeNow');
	});
}


function showTdyInfo(){
	console.log('hi');
	var tdy = new Date(); 
	var tdyDate = tdy.toISOString().slice(0,10);

	for (var i = 1; i <=4 ; i++) {
		var cate_no = i; // console.log(i);
    	$.ajax({
    		url: "php/booQuery.php",
    		type: 'post',
    		async: false,
    		data: {
    			CATE_NO: cate_no,
    			BOO_DATE: tdyDate    		
    		},
    		success:function(data){
	    		var cateNo =  '#queryFac' + cate_no; // console.log(cateNo);
	        	$(cateNo).html(data); console.log('hi');
				
				$('.myBtn').click(function(){
			    	var fac_no 		= $(this).nextAll().eq(0).val();
			    	var boo_time_i 	= $(this).nextAll().eq(1).val();
			    	showInfo(fac_no,tdyDate,boo_time_i);
		        });
        	}
    	});
    	
	}

}

function showTargetInfo(targetDate){
	$('.date').click(function(){
		var mm 	 = ('0' + $(this).text().split('/')[0]).slice(-2);
		var dd 	 = ('0' + $(this).text().split('/')[1]).slice(-2);
		var yyyy = $(this).children().data('yyyy');

		var targetDate = yyyy +'-' + mm + '-' + dd;
		var cate_no = $(this).closest('.table-date').data('cate');
		// console.log(targetDate);

	    $.post("php/booQuery.php",
	    	{
	    		CATE_NO: cate_no,
	    		BOO_DATE: targetDate
	    	},
	    function(data){
	    	var cateNo =  '#queryFac' + cate_no; // console.log(cateNo);
	        $(cateNo).html(data);
	        modalOpen();console.log('hi1');

	        $('.myBtn').click(function(){
		    	var fac_no 		= $(this).nextAll().eq(0).val();
		    	var boo_time_i 	= $(this).nextAll().eq(1).val();
		    	showInfo(fac_no,targetDate,boo_time_i);
	        });

	    });

	});
}

function showInfo(fac_no,targetDate,boo_time_i){
	console.log('hi2');
	$.post("php/booModal.php",
	{
		FAC_NO: fac_no,
		BOO_DATE: targetDate,
		BOO_TIME_i: boo_time_i
	},
		function (data){
			$('#tbl-md').html(data);
			// modalOpen();
		}
	);
}


function modalOpen(){
	// Get the modal
	var modal = document.getElementById('myModal');
	// console.log(modal);   
	
	$(".myBtn").each(function(){
		$(this).click(function(){ 
			// console.log('hi');
			modal.style.display = "block";
		});
	});
	
	$(".close").each(function(){
		$(this).click(function(){
			modal.style.display = "none";
		});
	});
	
	$(".cancel").each(function(){
		$(this).click(function(){
			modal.style.display = "none";
		});
	});
	
	window.onclick = function(event) {
    	if (event.target == modal) {
        	modal.style.display = "none";
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
</script>

<script>
	window.addEventListener('load',function(){
		showTdyInfo();
		accActiveNow();
		modalOpen();
		showTargetInfo();
		targetBgc();
	});
</script>

</body>

</html>