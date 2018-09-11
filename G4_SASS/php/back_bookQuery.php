<?php
$MEM_NO = $_POST["MEM_NO"];

// connect DB
    require_once("connect_g4.php");

    $sqlBoo = "SELECT * FROM booking
LEFT JOIN facility ON booking.FAC_NO = facility.FAC_NO
LEFT JOIN member ON booking.MEM_NO = member.MEM_NO
WHERE booking.MEM_NO = $MEM_NO";
    $boo = $pdo->query($sqlBoo);
    
    $BOO_TIME = array('清晨', '上午', '下午', '晚上');

    while ($rowBoo = $boo->fetch()){
?>
    <tr>
        <td><?php echo $rowBoo["BOO_NO"] ?></td>
        <td><?php echo $rowBoo["MEM_NO"] ?></td>
        <td><?php echo $rowBoo["FAC_NAME"] ?></td>
        <td><?php echo $rowBoo["BOO_DATE"] ?></td>
        <td><?php echo $BOO_TIME[$rowBoo["BOO_TIME"]] ?></td>
        <td>
        <form action="php/back_bookUpdate.php" method="post">
            <select id="book_status" name="BOO_STATUS">

<?php
switch ($rowBoo["BOO_STATUS"]) {
    case '1':
?>

      <option value="1" selected>預約中</option>
      <option value="2">已取消</option>
      <option value="3">已入場</option>
<?php      
        break;
    case '2':
?>
      <option value="1">預約中</option>
      <option value="2" selected>已取消</option>
      <option value="3">已入場</option>

<?php
        break;
    case '3':
?>
      <option value="1">預約中</option>
      <option value="2">已取消</option>
      <option value="3" selected>已入場</option>

<?php
        break;
    default:
?>
      <option value="1">安安</option>
      <option value="2">你好</option>
      <option value="3" selected>再見</option>
<?php
        break;
}
 ?>

            </select>
            <input type="hidden" name="BOO_NO" value="<?php echo $rowBoo['BOO_NO'] ?>">
            <input type="submit" value="修改">
        </form>
        </td>
    </tr>

<?php
    } // while