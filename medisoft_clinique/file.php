<?php
error_reporting(E_ERROR | E_PARSE);
ini_set('memory_limit', '50M');
ini_set('max_execution_time', 3000);

if ($_FILES["file"]["error"] > 0) {
  echo "Error: " . $_FILES["file"]["error"] . "<br>";
} 
else 
{
 $inputFileName=$_FILES["file"]["tmp_name"];
}

if (isset($_POST["facility"])) 
$facility=$_POST['facility'];

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css.css" rel="stylesheet" type="text/css" media="screen" />
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>

<title>Import excel file</title>
</head>

<body>

<div class="all_container">
<img src="img/facturation1.jpg" height="97" class="img1">

<div class="content">





<center>

<?php
/************************ YOUR DATABASE CONNECTION START HERE   ****************************/

define ("DB_HOST", "localhost"); // set database host
define ("DB_USER", "root"); // set database user
define ("DB_PASS","kabuyedm"); // set database password
define ("DB_NAME","Rapidb"); // set database name

$link = mysqli_connect(DB_HOST, DB_USER, DB_PASS) or die("Couldn't make connection.");
$db = mysqli_select_db(DB_NAME, $link) or die("Couldn't select database");


$databasetable = "facture";

/************************ YOUR DATABASE CONNECTION END HERE  ****************************/


set_include_path(get_include_path() . PATH_SEPARATOR . 'Classes/');
include 'PHPExcel/IOFactory.php';

// This is the file path to be uploaded.
//$inputFileName = 'discussdesk.xlsx'; 

try {
	$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
} catch(Exception $e) {
	die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
}


$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
$arrayCount = count($allDataInSheet);  // Here get total count of row in that Excel sheet


for($i=2;$i<=$arrayCount;$i++){
$Record_date = trim($allDataInSheet[$i]["B"]);
//$p =date("M-Y",strtotime($date));
$Period =date("M-Y",strtotime($Record_date));
$facility;
$perfac="".$Period."-".$facility."";
$MS_code = trim($allDataInSheet[$i]["C"]);
$Benef_fname = trim($allDataInSheet[$i]["D"]);
$Service = trim($allDataInSheet[$i]["E"]);
$Consultation = trim($allDataInSheet[$i]["F"]);
$Laboratory = trim($allDataInSheet[$i]["G"]);
$Imagery = trim($allDataInSheet[$i]["H"]);
$Hospit = trim($allDataInSheet[$i]["I"]);
$Medec = trim($allDataInSheet[$i]["J"]);
$Medec_acts = trim($allDataInSheet[$i]["K"]);
$Materials = trim($allDataInSheet[$i]["L"]);
$TM = trim($allDataInSheet[$i]["M"]);
$Total_amount = trim($allDataInSheet[$i]["N"]);

//$query = "SELECT name FROM facture WHERE name = '".$userName."' and email = '".$userMobile."'";


$query = "SELECT Record_date FROM facture WHERE Record_date = '".$Record_date."' and Period = '".$Period."' and facility='".$facility."' and Perfac='".$perfac."' and MS_code = '".$MS_code."'and Benef_fname = '".$Benef_fname."'and Service = '".$Service."'and Consultation = '".$Consultation."'and Laboratory = '".$Laboratory."'and Imagery = '".$Imagery."'and Hospit = '".$Hospit."'and Medec = '".$Medec."'and Medec_acts = '".$Medec_acts."'and Materials = '".$Materials."'and TM = '".$TM."'and Total_amount = '".$Total_amount."'";

//$query = "SELECT Record_date FROM facture WHERE  Record_date = '".$Record_date."'";


$sql = mysqli_query($link,$query);
$recResult = mysqli_fetch_array($sql);
$existName = $recResult["Record_date"];
if($existName === FALSE) {
    die(mysqli_error($link)); // TODO: better error handling
}
if($existName=="") {
$insertTable= mysqli_query($link,"insert into facture (Record_date, Period, Facility, Perfac, MS_Code, Benef_fname, Service, Consultation, Laboratory, Imagery, Hospit, Medec, Medec_acts, Materials, TM, Total_amount) values('".$Record_date."','".$Period."','".$facility."','".$perfac."', '".$MS_code."', '".$Benef_fname."', '".$Service."', '".$Consultation."', '".$Laboratory."', '".$Imagery."', '".$Hospit."',  '".$Medec."', '".$Medec_acts."', '".$Materials."', '".$TM."',  '".$Total_amount."')");


//'".$Record_date."', '".$MS_code."', '".$Benef_fname."', '".$Service."', '".$Consultation."', '".$Laboratory."', '".$Imagery."', '".$Hospit."',  '".$Medec."', '".$Medec_acts."', '".$Materials."', '".$TM."',  '".$Total_amount."'




$msg = '<center>Record has been added successfully<br>Facture ajouté avec succès. <div style="Padding:20px 0 0 0;"><a href="districts.php">Voir le resumé des districts</a></div>';
} else {
$msg = 'Record already exist. <div style="Padding:20px 0 0 0;"><a href=""></a></div>';
}
}
echo "<div style='font: bold 18px arial,verdana;padding: 45px 0 0 500px;'>".$msg."</div></center>";





 

?>

</center>




</div>

<?php 
//include"menu.php"; 

?>



</div>
</body>
</html>