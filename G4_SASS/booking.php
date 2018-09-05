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
	<header>
		<?php include 'header.php';?>
	</header>

<div class="container">
	<div class="area accordion">
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
		<div class="area accordion activeNow">
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
		<div class="area accordion">
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

		<div class="area accordion">
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


<form action="php/booInsert.php" method="post">
	<table class="table-modal" id="tbl-md">
	
	</table>
	<div class="modal-btn-container margin-top-16">
		<div class="modal-btn">
			<input type="button" class="btn dim-orange cancel" value="取消預約">
		</div>
		<div class="modal-btn">
			<input type="submit" class="btn dim-blue" value="確認預約" name="submitBoo">
		</div>
	</div>
</form>

			</div><!-- modal-body -->
		</div>
	</div><!-- modal -->

</div><!-- container -->
	


<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>


<script src="js/booking.js"></script>

<script>

function x1x(){
	var yyyy = new Date().getFullYear();
	$('.date').click(function(){
		var mm = 0 + $(this).text().split('/')[0].slice(-2);
		var dd = 0 + $(this).text().split('/')[1].slice(-2);
		var targetDate = yyyy +'-' + mm + '-' + dd;
		var cate_no = $(this).parent().parent().parent().data('cate');

	    $.post("php/booQuery.php",
	    	{
	    		CATE_NO: cate_no,
	    		BOO_DATE: targetDate
	    	},
	    function(data){
	    	var cateNo =  '#queryFac' + cate_no; console.log(cateNo);
	        $(cateNo).html(data);

	        $('.myBtn').click(function(){
		    	var fac_no 		= $(this).nextAll().eq(0).val();
		    	var boo_time_i 	= $(this).nextAll().eq(1).val();
		    	showInfo(fac_no,targetDate,boo_time_i);
	        });

	    });

	});
}

function showInfo(fac_no,targetDate,boo_time_i){
	$.post("php/booModal.php",
	{
		FAC_NO: fac_no,
		BOO_DATE: targetDate,
		BOO_TIME_i: boo_time_i
	},
		function (data){
			$('#tbl-md').html(data);
			modalOpen();
		}
	);
}


function modalOpen(){
	// Get the modal
	var modal = document.getElementById('myModal');
	console.log(modal);	   
	
	$(".myBtn").each(function(){
		$(this).click(function(){
		    
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




</script>	
<script>window.addEventListener('load',x1x);</script>
</body>

</html>