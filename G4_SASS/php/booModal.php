<?php

$FAC_NO = $_POST["FAC_NO"];
$BOO_DATE = $_POST["BOO_DATE"];
$BOO_TIME_i = $_POST["BOO_TIME_i"];


	// connect DB
	require_once("connect_g4.php");

	$sqlFacBoo = "SELECT * from facility where FAC_NO = '$FAC_NO'";
	$facBoo = $pdo->query($sqlFacBoo);

	$rowFacBoo = $facBoo->fetch();

	$BOO_TIME = array('上午', '下午', '晚上');

?>

	<tr>
		<td><?php echo $rowFacBoo['FAC_NAME'] ?></td>
		<td><?php echo $BOO_DATE ?></td>
		<td><?php echo $BOO_TIME["$BOO_TIME_i"] ?></td>
		<td><?php echo $rowFacBoo['FAC_POINTS'] ?></td>
		<td>
			<?php echo '<input type="hidden" name="FAC_NO" value="'.$FAC_NO.'">' ?>
			<?php echo '<input type="hidden" name="FAC_POINTS" value="500">' ?>

			<?php echo '<input type="hidden" name="BOO_DATETIME" value="2018-08-09 04:08:22">' ?>
			<?php echo '<input type="hidden" name="BOO_DATE" value="'.$BOO_DATE.'">' ?>
			<?php echo '<input type="hidden" name="BOO_TIME" value="'.$BOO_TIME_i.'">' ?>

			<?php echo '<input type="hidden" name="MEM_NO" value="1">' ?>
			<?php echo '<input type="hidden" name="MEM_POINTS" value="5000">' ?>

			<?php echo '<input type="hidden" name="BOO_STATUS" value="0">' ?>
		</td>
	</tr>
					




