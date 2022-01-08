<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
.button {
	border:hidden;
  display: inline-block;
  border-radius: 4px;
  background-color:#069;
  color: #FFFFFF;
  text-align: center;
  font-size: 16px;
  padding: 7px;
  width: auto;
  transition: all 0.5s;
  cursor: pointer;
  margin: 2px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '»';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}

input, select{border: 1px solid #069;  height:22px; padding-left:30px;  font-size:16px;}

/* Style the tab */
div.tab {
	
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
div.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of buttons on hover */
div.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
div.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
	display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
}
</style>

</head>

<body><h3>

<?php 
	include('link.php');
	
	?>

<div style="position: absolute; left: 509px; top: 13px;">
<em>Requisition existant</em>
<hr />
<form action="stock_req.php" method="post">
<table width="200" border="0">
  <tr>
    <td>CODE:</td>
    <td><input type="text" name="finder" /></td>
  </tr>

   <tr>
    <td></td>
    <td><button class="button" ><span>Trouver/Find</span></button></td>
  </tr>
</table>
<form>
</div>





<div style="position: absolute; left: 10px; top: 14px;">
<em>Nouvelle requisition</em>
<hr />


<table width="200" border="0">
<form action="stock_req.php" method="post">
  <tr>
    <td>CODE:</td>
    <td bgcolor="#EEEEEE">
    
    
    <?php 
	 $per = "SELECT req_number  FROM stock_req_code ORDER BY time ASC";
        $retvalper = mysqli_query($link, $per);
        if(! $retvalper )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowper = mysqli_fetch_array($retvalper, MYSQLI_ASSOC))
                 {
				
                 $code=$rowper['req_number'];
	             }
				 $code=$code+1;
				 
	
	?>
   
    
    
    
    
    
    
   <?php echo $code;?> <input type="hidden" name= "code"  value="<?php echo $code; ?>" /></td>
  </tr>
  <tr>
    <td>Date:</td>
    <td><input type="text" name="date" value="<?php echo date('Y-m-d') ?>" /></td>
  </tr>
  <tr>
    <td>Supplier:</td>
    <td>
    
    
    <select name="supplier">
   
    <?php
   $med1 = "SELECT*  FROM suppliers ";
                        $retvalmed1 = mysqli_query($link, $med1);
                        if(! $retvalmed1 )
                               {
                                  die('Could not get data: ' . mysqli_error($link));
                               }    
          
           
                              while($rowmed1 = mysqli_fetch_array($retvalmed1, MYSQLI_ASSOC))
                                      {
					                  
				                  	     echo '<option value="'.$rowmed1['supp_name'].'">'.$rowmed1['supp_name'].'</option>';
										
					              						 
									 
								
				                       }
  
  
  ?>
   
   
   
   
   
   
   
    </select>
    
    </td>
  </tr>
   <tr>
    <td></td>
    <td><button class="button" ><span>Ajouter</span></button></td>
  </tr>
  
  </form>
</table>
</div>



<div style="position: absolute; width: 810px; height: 100px; left: 9px; top: 211px;">
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'London')">REQUISITIONS EXISTANTS</button>
  
</div>

<div id="London" class="tabcontent">
  
  <table width="0"  border="1" style="font-size:15px; border-collapse: collapse;" cellspacing="0" cellpadding="0">
    <tr bgcolor="#EAEAEA">
         <td>NUMERO D'ORDRE</td>
         <td>CODE DE REQUISITION</td>
         <td>FOURNISSEUR</td>
         <td>DATE</td>
     
    </tr>
  
  
  <?php
   $i=1;
   $med1 = "SELECT req_number, date, supp_name  FROM stock_req_code, suppliers WHERE stock_req_code.supp_id=suppliers.supp_id ORDER BY stock_req_code.req_number DESC LIMIT 10 ";
                        $retvalmed1 = mysqli_query($link, $med1);
                        if(! $retvalmed1 )
                               {
                                  die('Could not get data: ' . mysqli_error($link));
                               }    
          
           
                              while($rowmed1 = mysqli_fetch_array($retvalmed1, MYSQLI_ASSOC))
                                      {
					                  echo'<tr>';
									  
									     echo '<td>'.$i++.'</td>';
				                  	     echo '<td><font color="#FF0000">'.$rowmed1['req_number'].'</font></td>';
										 echo '<td>'.$rowmed1['supp_name'].'</td>';
										 echo '<td>'.$rowmed1['date'].'</td>';
										
					                  echo'</tr>';
									 
								
				                       }
  
  
  ?>
  
  
  
  
  
  
  
  
  
  
  </table>
  
  
  
  
  
</div>



</div>

<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>





</body>
</html>