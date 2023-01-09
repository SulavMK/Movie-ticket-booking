<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["keyword"])) {
$query ="SELECT SID FROM seat ORDER BY SID ";
$result = $db_handle->runQuery($query);
if(!empty($result))
{
?>

<table id ='ffy' class="container100">
<tbody>


<?php
$pos = 0;
foreach($result as $row)
{
?>
<tr onClick="selectCountry('<?php echo $row["SID"]; ?>', '<?php echo $row["SID"]; ?>');">

					<td> <?php echo $row["SID"]; ?> </td>
					

</tr>
<?php $pos++;} ?>
</tbody>
</table>

<?php } } ?>