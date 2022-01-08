<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="refresh" content="3" >
<script type="text/javascript" src="highslide/highslide-with-html.js"></script>
<link rel="stylesheet" type="text/css" href="highslide/highslide.css" />

<title>Untitled Document</title>
<script>
function getVote(int) {
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("poll").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","sec.php?district="+int,true);
  xmlhttp.send();
}
</script>
</head>

<body>
<?php
include ('link.php');
session_start();

error_reporting(E_ERROR | E_PARSE);

$id=$_GET['id'];
$insu=$_GET['insu'];
$date=$_GET['date'];
$period=$_GET['period'];
$categorie=$_GET['categorie'];
$today=date('Y-m-d');






?>







<table style="font-size:13px; border-collapse: collapse;"  width="0" border="1" cellspacing="0" cellpadding="0">
  <tr bgcolor="#D2E9FF">
    <th scope="col">Consultation</th>
    <th scope="col">Examens</th>
    <th scope="col">Medicaments</th>
    <th scope="col">Consomables</th>
    <th scope="col">Actes</th>
    <th scope="col">Hospitalisation</th>
    <th scope="col">Ambulance</th>
    


  </tr>
  <tr style="font-size:15px;">
  
  <td bgcolor="#F7F7F7" style="width:100px;">
  
    <?php 
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
				 echo ''.$row['item'].'<b>('.$row['unityp'].'Frw)</b><br>';
			    // }
				 }
	}
						   
   ?>
  
  </td>
  
  
  
  
  
  <td>
  
      <?php 
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
				  
				  echo '<div style=" border-bottom:1px solid #000;">'.$i.'-'.$row['item'].'<b>('.$row['unityp'].'Frw)</b><br>';
				 
				  echo'</div>';
				// }
				
				 }
				 $total+=$lab;
				  
	   }
	echo'<strong>TOTAL:'.$total.'</strong>';					  
						   
   ?>
  </td>
  
  <td bgcolor="#F7F7F7">
  
  <?php 
  $i=0;
  $tot=0;
  $med=0;
  $med_not=0;//not insured medecines 
  $total=0;
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
				 echo '<div style=" border-bottom:1px solid #000;">'.$i.'-'.$row['item'].'<b>('.$row['quantity'].'*'.$row['unityp'].'Frw='.$row['unityp']*$row['quantity'].'Frw)</b><br>';
				 echo'</div>';

				// }
			     }
				 $total+=$med;
				  
	   }
	echo'<strong>TOTAL:'.$total.'</strong>';		  
						   
   ?>
  
  
  
  </td>
  
   
  <td>
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
				 echo '<div style=" border-bottom:1px solid #000;">'.$i.'-'.$row['item'].'<b>('.$row['quantity'].'*'.$row['unityp'].'Frw='.$row['unityp']*$row['quantity'].'Frw)</b><br>';
			     echo'</div>';

				// }
				 }
	$total+=$conso;
				  
	   }
	echo'<strong>TOTAL:'.$total.'</strong>';
						   
   ?> 
  </td>
  
  <td bgcolor="#F7F7F7">
  
  <?php 
  $i=0;
  $tot=0;
  $soins=0;
  $soins_not=0;
  $total=0;
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
				 $tot=$row['quantity']*$row['unityp'];
				 if ($row['insured']=='1')
				 $soins+=$tot;
				 else
				 $soins_not+=$tot;
	             $i++;
				 echo '<div style=" border-bottom:1px solid #000;">'.$i.'-'.$row['item'].'<b>('.$row['quantity'].'*'.$row['unityp'].'Frw='.$row['unityp']*$row['quantity'].'Frw)</b><br>';
			     echo'</div>';

				// }
				 }
						   
	
   
   //$gt=$cons+$lab+$med+$conso+$soins;
	$total+=$soins;
				  
	   }
	echo'<strong>TOTAL:'.$total.'</strong>';
						   
   ?> 
  
  </td> 
   
  <td>
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
				 echo '<div style=" border-bottom:1px solid #000;">'.$i.'-'.$row['item'].'<b>('.$row['quantity'].'*'.$row['unityp'].'Frw='.$row['unityp']*$row['quantity'].'Frw)</b><br>';
			     echo'</div>';

				//}
				 }
						   
	
   
  // $gt=$cons+$lab+$med+$conso+$soins+$hosp;
	$total+=$hosp;
				  
	   }
	echo'<strong>TOTAL:'.$total.'</strong>';
   ?> 
  
  </td>



   <td>
  <?php 
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
				 echo '<div style=" border-bottom:1px solid #000;">'.$i.'-'.$row['item'].'<b>('.$row['quantity'].'*'.$row['unityp'].'Frw='.$row['unityp']*$row['quantity'].'Frw)</b><br>';
			     echo'</div>';

				 //}
				 }
						   
	
   
   $gt=$cons+$lab+$med+$conso+$soins+$hosp+$amb;
   if ($cons>0 && $categorie>-1)
   $tm=200;
   else
   $tm=0;
   
   
   if ($amb>0)
	 {
	    $tm1=$amb*0.1;
	    $tm=$tm+$tm1;
	 }																 
																 
   $tot_not=$lab_not+$med_not+$conso_not+$soins_not+$hosp_not+$amb_not;
	}
   ?> 
  </td>
   
  



  </tr>
</table>


<br />
<center>
<table  style="font-size:13px; border-collapse: collapse;border-style:thin; border-color:#F00; font-size:20px;" width="0" border="1" cellspacing="0" cellpadding="0">
<tr>
<td colspan="3">Assurance et TM  </td>
<th rowspan="2" width="200">TM + autres services non couverts par l'assurance</th>
<td rowspan="3">
<iframe style="border:0px solid white;" src="ind.php?id=<?php echo $id; ?>&categorie=<?php echo $categorie; ?>&date=<?php echo $date; ?>&period=<?php echo $period; ?>">
</iframe>
</td>
</tr>

    <tr bgcolor="#D2E9FF">    
    <th scope="col">TOTAL</th>
    <th scope="col"><?php if (!empty($id)) echo $insu; ?></th>
    <th scope="col" width="50">TICKET MODERATEUR</th>

  </tr>

  <tr>
    <th scope="row"><?php if (!empty($id)) echo $gt; ?></th>
    <td>
    <?php
	if (!empty($id))// check if client exists and then calculate by percentages paid by the insurance.
	{
	$ass=0;
	$adh=0;

	$musap=$gt-$tm; 
	//$musa_ass=200;
	$rssbp=$gt*0.85;
	$rssb_ass=$gt*0.15;
	$mmip=$gt*0.85;
	$mmi_ass=$gt*0.15;
	$mediplanp=$gt*0.90;
	$mediplan_ass=$gt*0.10;
		$corarp=$gt*0.90;//NOT YET CONFIRMED
		$corar_ass=$gt*0.10;//NOT YET CONFIRMED
		$radiantp=$gt*0.90;//NOT YET CONFIRMED
		$radiant_ass=$gt*0.10;//NOT YET CONFIRMED

	$comp=$gt;
	$comp_ass=$gt;
	$indig=0;
	$prive=$gt;
	
	if ($insu=='MUSA')
	{
	echo $musap;
	}
	
	elseif ($insu=='MEDIPLAN')
	{	
	echo $mediplanp;
	}
	elseif ($insu=='COMPASSION')
	{
	echo $comp;
	}
	
	elseif ($insu=='PRIVE')
	{
	//echo $prive;
	}
	elseif ($insu=='INDIGENI')
	{
	$prive;
	}
	
	elseif ($insu=='RSSB')
	{
	echo $rssbp;	
	}
	elseif ($insu=='MMI')
	{
	echo $mmip;	
	}
	elseif ($insu=='CORAR')
	{
	echo $corarp;	
	}	
	elseif ($insu=='RADIANT')
	{
	echo $radiantp;	
	}		
	}
	?>
    
    
    </td>
    <th bgcolor="">
     <?php
	 if (!empty($id))//check if client exists
	{
	 if ($insu=='MUSA')
	 
	{
	echo $tm;
	$tot_not=$tot_not+$tm;
	}
	
	elseif ($insu=='MEDIPLAN')
	{	
	echo $mediplan_ass;
	$tot_not=$tot_not+$mediplan_ass;
	}
	
	elseif ($insu=='COMPASSION')
	{
	echo 0;
	
	}
	
	elseif ($insu=='PRIVE')
	{
	//echo $tot_not;
	//$tot_not=$gt;
	}
	elseif ($insu=='INDIGENI')
	{
	//echo $prive;
	}
	
	elseif ($insu=='RSSB')
	{
	echo $rssb_ass;	
	$tot_not=$tot_not+$rssb_ass;
	}
	elseif ($insu=='MMI')
	{
	echo $mmi_ass;	
	$tot_not=$tot_not+$mmi_ass;
	}	
	
	elseif ($insu=='CORAR')
	{
	echo $corar_ass;	
	$tot_not=$tot_not+$corar_ass;
	}	
	
	elseif ($insu=='RADIANT')
	{
	echo $radiant_ass;	
	$tot_not=$tot_not+$radiant_ass;
	}	
	}
	
	 
	?>
    
    
    </th>

<th rowspan="2" bgcolor="#00FF00">
 <div style="box-shadow: 0px 0px 20px 0px #000;">

<?php 

if ($insu=='PRIVE')
{
echo $tot_not+$prive;
}
elseif ($insu=='INDIGENT')
{
echo $tot_not+$prive;
}
else
{
echo $tot_not;
}

$_SESSION['amount']=$tot_not;//amount to pay



 ?>
</div>
</th>

  </tr>

</table>


<hr />

</center>

</body>
</html>