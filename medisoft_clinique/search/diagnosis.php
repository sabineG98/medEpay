<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["keyword"])) {
	
$query ="SELECT * FROM diagnosis WHERE diagnosis like '%" . $_POST["keyword"] . "%'  ORDER BY diagnosis LIMIT 0,10";
$result = $db_handle->runQuery($query);
if(!empty($result)) {
?>
<ul id="country-list">
<?php
foreach($result as $country) {
?>


<li onClick="selectCountry('<?php echo $country["diagno_id"]; ?>');"><?php echo'#'. $country["diagno_id"].'__'.$country["diagnosis"]; ?></li>
<?php } ?>
</ul>
<?php } } ?>