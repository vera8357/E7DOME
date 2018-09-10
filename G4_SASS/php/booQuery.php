<?php
ob_start();
session_start();

$CATE_NO = $_POST["CATE_NO"];
$BOO_DATE = $_POST["BOO_DATE"];


	// connect DB
	require_once("connect_g4.php");	
	

	// print all fac
	$sqlFac = "SELECT * from facility where CATE_NO = $CATE_NO AND FAC_STATUS = 1";
	$fac = $pdo->query($sqlFac);

	// BOO_TIME convertor
	$BOO_TIME = array('上午', '下午', '晚上');						
	while ($rowFac = $fac->fetch())
	{	
		$i = 0; 
		for ($j=0; $j <3 ; $j++) { 
?>						
	<tr>
		<td><?php echo $rowFac['FAC_NAME'] ?></td>
		<td><?php echo $BOO_TIME[$i] ?></td>
		<td><?php echo $rowFac['FAC_POINTS']; ?></td>
<?php
	$sqlBooking = "
	SELECT facility.FAC_NO,CATE_NO,FAC_NAME,FAC_POINTS,booking.BOO_NO,BOO_DATETIME,BOO_DATE,BOO_TIME,TEAM_NO FROM facility
	LEFT JOIN booking ON booking.FAC_NO = facility.FAC_NO
	LEFT JOIN team ON booking.BOO_NO = team.BOO_NO
	WHERE facility.FAC_NO = $rowFac[FAC_NO] AND FAC_STATUS = 1 AND  BOO_TIME = $i AND BOO_DATE = '$BOO_DATE'
	ORDER BY facility.FAC_NO";
					
		$booking = $pdo->query($sqlBooking);
		$rowBooking = $booking->fetch();

		if ( !empty( $rowBooking["BOO_NO"]) && !empty( $rowBooking["TEAM_NO"]) ) {
			echo '<td><a href="groupInfo.php?TEAM_NO=',$rowBooking["TEAM_NO"],'" class="btn dim-orange">查看揪團</a></td>';

		}elseif ( !empty( $rowBooking["BOO_NO"]) ) {
			echo '<td><a href="#" class="btn dim-gray default opacity-1">已預約</a></td>';

		}else{
			echo '<td><a href="#" class="btn dim-blue myBtn">預約</a>';
			echo '<input class="prodId" name="prodId" type="hidden" value="', $rowFac["FAC_NO"], '">';
			echo '<input class="prodIx" name="prodId" type="hidden" value="', $i, '"></td>';
		}
		$i++;

		} // for
	} // while

	

	try {						
	} catch (Exception $e) {					
		echo $e->getMessage(), '<br>';
		echo $e->getLine();					
	}					
?>
</tr>