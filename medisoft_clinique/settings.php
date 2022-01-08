<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Settings</title>



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
.fram:hover
{
	height: 250px; 
	width: 498px; 
	left: 116px;
	background-color:#F00;
}


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

<body>
<iframe src="internal.php" style="position: absolute; background-color: #EBEBEB; height: 287px; top: 10px; width: 398px;">

</iframe>


<div style="position: absolute; width: 810px; height: 100px; left: 9px; top: 308px;">
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'London')">Address</button>
</div>

<div id="London" class="tabcontent">
  
  <table width="0"  border="0" style="font-size:15px; border-collapse: collapse;" cellspacing="10" cellpadding="10">
    <tr bgcolor="#EAEAEA">
         <td>District</td>
         <td>Hospital</td>
         <td>Health center</td>
         <td></td>
     
    </tr>
  
  
  <?php
  include('link.php');
   $med1 = "SELECT*  FROM address ";
                        $retvalmed1 = mysqli_query($link, $med1);
                        if(! $retvalmed1 )
                               {
                                  die('Could not get data: ' . mysqli_error($link));
                               }    
          
           
                              while($rowmed1 = mysqli_fetch_array($retvalmed1, MYSQLI_ASSOC))
                                      {
					                  echo'<tr>';
				                  	     echo '<td>'.$rowmed1['district'].'</td>';
										 echo '<td>'.$rowmed1['hospital'].'</td>';
										 echo '<td>'.$rowmed1['hc'].'</td>';
										
					              
									 
									  
									 
								
				                       }
									   
		if (isset($_POST['delete']))
		{
		   mysqli_query($link,"TRUNCATE address");
		}
  
  
  ?>
  
  
  <td>
  <form  action="settings.php" method="post">
  <input type="hidden" name="delete" value="delete" />
  <button class="button" ><span>x</span></button>
  </form>
  </td>
  </tr>
  
  
  
  
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