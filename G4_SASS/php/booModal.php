<?php
ob_start();
session_start();


$FAC_NO = $_POST["FAC_NO"];
$BOO_DATE = $_POST["BOO_DATE"];
$BOO_TIME_i = $_POST["BOO_TIME_i"];

$MEM_NO = $_SESSION["MEM_NO"];
$MEM_POINTS = $_SESSION["MEM_POINTS"];


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
			<?php echo '<input type="hidden" name="FAC_POINTS" value="'.$rowFacBoo["FAC_POINTS"].'">' ?>

			<?php echo '<input type="hidden" name="BOO_DATETIME" value="'.date("Y-m-d H:i:s").'">' ?>
			<?php echo '<input type="hidden" name="BOO_DATE" value="'.$BOO_DATE.'">' ?>
			<?php echo '<input type="hidden" name="BOO_TIME" value="'.$BOO_TIME_i.'">' ?>

			<?php echo '<input type="hidden" name="MEM_NO" value="'.$MEM_NO.'">' ?>
			<?php echo '<input type="hidden" name="MEM_POINTS" value="'.$MEM_POINTS.'">' ?>

			<?php echo '<input type="hidden" name="BOO_STATUS" value="1">' ?>
		</td>
	</tr>
					




