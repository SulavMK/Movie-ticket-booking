<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["keyword"])) {
$query ="SELECT DISTINCT query,Solution FROM complain WHERE Status= 'SOLVED' AND Flag=1 ORDER BY query";
$result = $db_handle->runQuery($query);
if(!empty($result))
{
?>

<table id ='ffy' class="container100">
<tbody>


<?php
foreach($result as $row) {
?>
<tr onClick="selectCountry('<?php echo $row["query"]; ?>', '<?php echo $row["Solution"]; ?>');">

					<td> <?php echo $row["query"]; ?> </td>
					

</tr>
<?php } ?>
</tbody>
</table>

<?php } } ?>