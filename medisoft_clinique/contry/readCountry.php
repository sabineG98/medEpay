<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["keyword"])) {
$query ="SELECT * FROM acts WHERE act like '" . $_POST["keyword"] . "%' ORDER BY act LIMIT 0,12";
$result = $db_handle->runQuery($query);
if(!empty($result)) {
?>
<ul id="country-list">
<?php
foreach($result as $country) {
?>
<li onClick="selectCountry('<?php echo $country["act"]; ?>');"><?php echo $country["act"].'---<strong>'.$country["ta"].'FRW</strong>'; ?></li>
<?php } ?>
</ul>
<?php } } ?>