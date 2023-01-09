<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["keyword"])) {
$query ="SELECT SID FROM seat ORDER BY SID";
$result = $db_handle->runQuery($query);
$i = 0;
// Establish the output variable
$dyn_table = '<table border="1" cellpadding="10">';
while($row = mysql_fetch_array($result)){ 
    
    //$id = $row["SID"];
    $member_name = $row["SID"];
    
    if ($i % 5 == 0) { // if $i is divisible by our target number (in this case "3")
        $dyn_table .= '<tr><td>'<?php echo $row["SID"]; ?> '</td>';
    } else {
        $dyn_table .= '<td>' <?php echo $row["SID"]; ?> '</td>';
    }
    $i++;
}
$dyn_table .= '</tr></table>';
?>
