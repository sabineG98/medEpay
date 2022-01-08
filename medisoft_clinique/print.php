

<script>
    window.print();
</script>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.</title>
</head>

<body>

<center>
<?php
include ('link.php');
session_start();

error_reporting(E_ERROR | E_PARSE);

$id=$_GET['id'];
$insu=$_GET['insu'];
$date=$_GET['date'];
$period=$_GET['period'];
$categorie=$_GET['categorie'];
$total=$_GET['tot'];
$today=date('Y-m-d');





$last = "SELECT DISTINCT *  FROM clients WHERE insurance_code='$insu' OR client_id='$id'";
        $retval_last = mysqli_query($link, $last);
        if(! $retval_last )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowlast = mysqli_fetch_array($retval_last, MYSQLI_ASSOC))
                 {
					 $insu=$rowlast['insurance'];
					 $bene=$rowlast['beneficiary'];
					 $insucode=$rowlast['insurance_code'];
					 
				
				 }

?>

<font size="-1" face="Tahoma, Geneva, sans-serif">
REPUBLIC OF RWANDA <br />
MINISTRY OF HEALTH<br />
GASABO DISTRICTt<br />
KABUYE HEALTH CENTER<br />
-------------------------------------<br />
    INVOICE NO.:<br />
-------------------------------------<br />
CLIENT: <br /><?php echo $bene; ?><br />
<?php // echo $insu; ?>-<?php // echo $insucode ;?>

-------------------------------------<br />


<?php 
//CONSULTATION
	$cons=0;
	$tot=0;
	if (!empty($id))
	{
    $products = "SELECT* FROM orders WHERE client_id=$id AND type='consultation' AND date='$date'";
        $retval = mysqli_query($link, $products);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
			    // $time=date("Y-m-d", strtotime($row['time']));
				// if (date("Y-m-d", strtotime($row['time']))==$today)
				// {
	             $cons+=$row['unityp'];
				 echo '-'.$row['item'].'<b>('.$row['unityp'].'Frw)</b><br>';
			    // }
				 }
	}
						   
   ?>



 <?php 
 //LABO
	  $lab=0;
	  $lab_not=0;//lab not covered by the insurance 
	  $i=0;
	  $total=0;
	  if (!empty($id))
	   {
    $products = "SELECT* FROM orders WHERE client_id=$id AND type='laboratoire' AND date='$date'";
        $retval = mysqli_query($link, $products);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
				/* $time=date("Y-m-d", strtotime($row['time']));
				 if (date("Y-m-d", strtotime($row['time']))==$today)
				 {*/
	              $i++;
				  if ($row['insured']=='1')
				  $lab+=$row['unityp'];//calculation for insured services 
				  else
				  $lab_not+=$row['unityp'];//calculation for not insured services 
				  
				  echo '<div style="">-'.$row['item'].'<b>('.$row['unityp'].'Frw)</b><br>';
				 
				  echo'</div>';
				// }
				
				 }
				 $total+=$lab;
				  
	   }
	//echo'<strong>TOTAL:'.$total.'</strong>';					  
						   
   ?>





<?php 

// MEDECINES
  $i=0;
  $tot=0;
  $med=0;
  $med_not=0;//not insured medecines 
  $total=0;
  $a=0;
  $b=0;
  if (!empty($id))
	{
    $products = "SELECT* FROM orders WHERE client_id=$id AND type='med' AND date='$date'";
        $retval = mysqli_query($link, $products);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
				 /*$time=date("Y-m-d", strtotime($row['time']));
				 if (date("Y-m-d", strtotime($row['time']))==$today)
				 {*/
				 $tot=$row['quantity']*$row['unityp'];
				 if ($row['insured']=='1')
				 $med+=$tot;
				 else
				 $med_not+=$tot;
	             $i++;
				 echo '<div style=" ">-'.$row['item'].'<b>('.$row['quantity'].'*'.$row['unityp'].'Frw='.$row['unityp']*$row['quantity'].'Frw)</b><br>';
				 echo'</div>';

				// }
				
				$drug=$row['item'];
	//detect of a client has malaria																						

	if ( 
	
	   substr( $drug, 0, 3 ) == "Coa" 
	or substr( $drug, 0, 3 ) == "COA"
	or substr( $drug, 0, 3 ) == "coa"
	or substr( $drug, 0, 3 ) == "ART"
	or substr( $drug, 0, 3 ) == "art"
	or substr( $drug, 0, 3 ) == "Art"
	or substr( $drug, 0, 3 ) == "qui"
	or substr( $drug, 0, 3 ) == "QUI"
	or substr( $drug, 0, 3 ) == "Qui")
	
	
    {
	$a=1;
	}
	
	if($a==1)
	{
		$b=1;
	}// end of detect
				
				
				
				
				
				
				
				
				
			     }
				 $total+=$med;
				  
	   }
	//echo'<strong>TOTAL:'.$total.'</strong>';		  
						   
   ?>


 <?php 
  $i=0;
  $tot=0;
  $conso=0;
  $conso_not=0;
  $total=0;
  if (!empty($id))
	{
    $products = "SELECT* FROM orders WHERE client_id=$id AND type='consommable' AND date='$date'";
        $retval = mysqli_query($link, $products);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
				/*  $time=date("Y-m-d", strtotime($row['time']));
				 if (date("Y-m-d", strtotime($row['time']))==$today)
				 {*/
				 $tot=$row['quantity']*$row['unityp'];
				 if ($row['insured']=='1')
				 $conso+=$tot;
				 else
				 $conso_not+=$tot;
	             $i++;
				 echo '<div style=" ">-'.$row['item'].'<b>('.$row['quantity'].'*'.$row['unityp'].'Frw='.$row['unityp']*$row['quantity'].'Frw)</b><br>';
			     echo'</div>';

				// }
				 }
	$total+=$conso;
				  
	   }
	//echo'<strong>TOTAL:'.$total.'</strong>';
						   
   ?> 
   
   
   
   
   
   <?php 
   
   //SOINS
  $i=0;
  $tot=0;
  $soins=0;
  $soins_not=0;
  $total=0;
  $acc=0;
  if (!empty($id))
	{
    $products = "SELECT* FROM orders WHERE client_id=$id AND type='soins' AND date='$date'";
        $retval = mysqli_query($link, $products);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
				 /*$time=date("Y-m-d", strtotime($row['time']));
				 if (date("Y-m-d", strtotime($row['time']))==$today)
				 {*/
				 $accou=$row['item'];
				 if ($accou='Acc%')
				 {
				    $acc=1;
				 }
				 $tot=$row['quantity']*$row['unityp'];
				 if ($row['insured']=='1')
				 $soins+=$tot;
				 else
				 $soins_not+=$tot;
	             $i++;
				 echo '<div style="">-'.$row['item'].'<b>('.$row['quantity'].'*'.$row['unityp'].'Frw='.$row['unityp']*$row['quantity'].'Frw)</b><br>';
			     echo'</div>';

				// }
				 }
						   
	
   
   //$gt=$cons+$lab+$med+$conso+$soins;
	$total+=$soins;
				  
	   }
	//echo'<strong>TOTAL:'.$total.'</strong>';
						   
   ?> 
   
   


 <?php 
  $i=0;
  $tot=0;
  $hosp=0;
  $hosp_not=0;
  $total=0;
  if (!empty($id))
	{
    $products = "SELECT* FROM orders WHERE client_id=$id AND type='hospitalisation' AND date='$date'";
        $retval = mysqli_query($link, $products);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
				 /*$time=date("Y-m-d", strtotime($row['time']));
				 if (date("Y-m-d", strtotime($row['time']))==$today)
				 {*/
				 $tot=$row['quantity']*$row['unityp'];
				 if ($row['insured']=='1')
				 $hosp+=$tot;
				 else
				 $hosp_not+=$tot;
	             $i++;
				 echo '<div style="">-'.$row['item'].'<b>('.$row['quantity'].'*'.$row['unityp'].'Frw='.$row['unityp']*$row['quantity'].'Frw)</b><br>';
			     echo'</div>';

				//}
				 }
						   
	
   
  // $gt=$cons+$lab+$med+$conso+$soins+$hosp;
	$total+=$hosp;
				  
	   }
	//echo'<strong>TOTAL:'.$total.'</strong>';
   ?> 
   
   
   
   
   
   <?php 
   
   // AMBULANCE
  $i=0;
  $tot=0;
  $amb=0;
  $amb_not=0;
  if (!empty($id))
	{
    $products = "SELECT* FROM orders WHERE client_id=$id AND type='ambulance' AND date='$date'";
        $retval = mysqli_query($link, $products);
        if(! $retval )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                 {
				/*$time=date("Y-m-d", strtotime($row['time']));
				 if (date("Y-m-d", strtotime($row['time']))==$today)
				 {*/
				 $tot=$row['quantity']*$row['unityp'];
				 if ($row['insured']=='1')
				 $amb+=$tot;
				 else
				 $amb_not+=$tot;
	             $i++;
				 echo '<div style="">-'.$row['item'].'<b>('.$row['quantity'].'*'.$row['unityp'].'Frw='.$row['unityp']*$row['quantity'].'Frw)</b><br>';
			     echo'</div>';

				 //}
				 }
						   
	
   
   $gt=$cons+$lab+$med+$conso+$soins+$hosp+$amb;
   
 if ($cons==0)
 $tm=0;

		
if ($categorie>1 && $cons>0)	
{
$tm=200;	
}

if ($categorie==2 && $b==1)	
{
$tm=0;	
}

 if ($acc==1)	
{
$tm=0;	
}
   
   
   
   
   
   
   if ($amb>0)
	 {
	    $tm1=$amb*0.1;
	    $tm=$tm+$tm1;
	 }																 
																 
   $tot_not=$lab_not+$med_not+$conso_not+$soins_not+$hosp_not+$amb_not;
	}
   ?> 

-------------------------------------<br />
TOTAL:<?php $total ?><br />
<?php echo $insu; ?>:1323<br />
TM:200<br />
--------------------------------------<br />
PAYABLE:5688<br />

</font>

</center>
</body>
</html>