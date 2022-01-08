<?php include('head.php'); ?>
<?php include('navbar.php'); ?>

<!-- <!DOCTYPE html PUBLIC "-//W3C//Dth XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/Dth/xhtml1-transitional.dth">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="refresh" content="">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="css.css" rel="stylesheet" type="text/css" media="screen" />
    <script type="text/javascript" src="highslide/highslide-with-html.js"></script>
    <link rel="stylesheet" type="text/css" href="highslide/highslide.css" /> -->
    <title>::LABORATORY::</title>
    <?php
    //include('link.php');
    ?>
        <?php 
    //   error_reporting(E_ERROR | E_PARSE);
    //   session_start();
    //   if(!$_SESSION['valid_user']){
    //   header("Location: login.php");
    //   exit;
    //   } 
	  // ////////////////////////
	  // $idletime=900;
	  // if(isset($_SESSION['timeout'])){
		//   $session_life = time() - $_SESSION['timeout'];
		//   if($session_life > $idletime){
		// 	   header("Location: logout.php");
		//   }
	  // }
	  // $_SESSION['timeout'] = time();	
	  // /////////////////////
    //   $usr=$_SESSION['name'];
    //   $select_query = "SELECT * FROM users WHERE fullname='$usr'";
    //   $select_query_run = mysqli_query($link,$select_query);
    //   if($select_query_run)
    //   {
    //   if(mysqli_num_rows($select_query_run) > 0)
    //   {
    //   $row = mysqli_fetch_array($select_query_run,MYSQLI_ASSOC);
    //   $use_id=$row['id'];
    //   $fullname=$row['fullname'];
    //   $post=$row['post'];
    //   $username=$row['username'];
    //   $password=$row['password'];
    //   $levels=$row['levels'];
    //   }
    //   else
    //   {  die('Error in the SELECT query' . mysqli_error($link));  }
    //   }
      // if($_SESSION['post']!='laboratin' & $_SESSION['acc']!='accountant' & $_SESSION['post']!='titulaire' & $_SESSION['post']!='admin' & $_SESSION['post']!='Verification')
      // {
      // header("Location: no.php");
      // exit;
      // } 				
    ?>
  </head>
  <body>
<!-- <div class="all_container"> -->
<!-- <div class="show">
</div>
<div class="liguini">
<div class="show">
  <div style="position:absolute;">  
    <?php
      // if ($_SESSION['post']!='nurse' && $_SESSION['post']!='pharmacist')
      // {
      // //echo'<div class="menu1"><a href="home.php"><img  style="position:absolute; left: 210px; top: -13px;" src="img/home.png"  alt="Saisie"  /></a></div>';
      // echo'<div class="menu1"><a href="laboratory.php"><img  style="position:absolute; left: 250px; top: -13px; " src="img/app.png"  /></a></div>';
      // }
    ?>		          
<div class="menu1"><a href="logout.php"><img  style="position:absolute; left: 280px; top: -13px; " src="img/logout.png" /></a></div>
<div class="menu1"><a href="inbox.php" onclick="return hs.htmlExpand(this,{ objectType:'iframe'})"><img style="position:absolute;left:310px;top:-13px;" src="img/coment2.png" />
            <?php
//  $products="SELECT count(msg) AS msgs FROM messages,users WHERE users.id=messages.from_id AND messages.to_id='$use_id' AND ifread=0 ORDER BY msg_date DESC";
//               $retval = mysqli_query($link,$products);
//               if(! $retval )
//               {  die('Could not get data: ' . mysqli_error($link));  }    
//               while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
//               {								 			 
//               $msgs=$row['msgs'];
//               if($msgs>0)
//               {
//               echo'<span class="blink" style="position:absolute; left: 330px; top: -22px; background-color:#FF0; border-radius:60%; ">';
//               echo $msgs;
//               echo'</span>';
//               }
//               }
            ?>
            </a></div>
            <?php 
              // $noon=date('12:00:00');
              // $evening=date('17:30:00');
              // $now=date('H:i:s');
              // if($now>$noon && $now<$evening)
              // {  echo'<br>Bon Apres-midi <a style="color:white;" href="userprofile.php?user='.$_SESSION['name'].'">'.ucwords($_SESSION['name']).'</a> !'; }
              // elseif($now>$evening)
              // {  echo'<br>Bonsoir <a style="color:white;" href="userprofile.php?user='.$_SESSION['name'].'">'.ucwords($_SESSION['name']).'</a> !'; }
              // else
              // {  echo'<br>Bonjour <a style="color:white;" href="userprofile.php?user='.$_SESSION['name'].'">'.ucwords($_SESSION['name']).'</a> !'; } 
            ?>
          </div>  
        </div>
      </div> -->




      <!-- <div class="content"><br /><br /><br />
      <div style="position:absolute; border-radius: 0px 200px 10px 10px;  width:350px; border: 1px solid #09F; height:25px; background-color:#BDF; left: 1px; top: 7px;"><b>EXAMENS DE LABORATOIRE</b></div>
      <?php 
        // if ($_SESSION['lab']=='laboratin' || $_SESSION['post']=='accountant' || $_SESSION['post']=='titulaire' || $_SESSION['post']=='admin' || $_SESSION['post']=='Verification')
        // {
        // echo '<form action="labo.php" method="post">
        // <button class="button" style="position: absolute; color: white; left: 830px; top: 1px;" ><span>LABORATORY</span></button>
        // </form>';
        // }
      ?>
      <div  style="width:978px; height:440px; box-shadow: 0px 0px 5px 0px #000; border: 1px solid #09F; overflow:auto; position:absolute; background-color:#FFF; left: 4px; top: 35px;">    
        <iframe style="position: absolute; border: 0px solid #09F; overflow: hidden; background-color: #FFF; left: -1px; top: 7px; width: 933px; height: 600px;" src="examin/tabs-exam.php"></iframe>
      </div>
    </div> -->



<!-- <div class="container">
  <div class="col-lg-12 mt-5">
    <div style="background-color:#ECF5FF !important;width:100%;opacity:1;position:relative;box-shadow:0px 0px 0px #888;padding:2px;margin:1px 0;box-shadow:inset 5px 5px 5px rgba(0,0,0,.2);-webkit-box-shadow:inset 0 1px 4px rgba(0,0,0,.2);-webkit-border-radius:10px;border-color:#000;box-shadow:0px 0px 5px #000;height:79vh;overflow:auto;">
      <iframe style="position: absolute; border: 0px solid #09F; overflow: hidden; background-color: #FFF; left: -1px; top: 7px; width: 100%; height: 600px;" src="examin/tabs-exam.php"></iframe>  
    </div>
  </div>
</div> -->

<div class="container">
  <div class="col-lg-12 mt-5">
    <div style="background-color:#ECF5FF !important;width:100%;opacity:1;position:relative;box-shadow:0px 0px 0px #888;padding:2px;margin:1px 0;box-shadow:inset 5px 5px 5px rgba(0,0,0,.2);-webkit-box-shadow:inset 0 1px 4px rgba(0,0,0,.2);-webkit-border-radius:10px;border-color:#000;box-shadow:0px 0px 5px #000;height:88vh;overflow:auto;">
      <div style="position:absolute;border:0px solid #09F;overflow:hidden;background-color:#FFF;left:-1px;top:7px;width:100%;height:660px;">
	  	 <div style="position:absolute;z-index:1;border-radius:0px 200px 10px 10px;width:220px;border:1px solid #09F;height:25px;background-color:#BDF;left:4px;top:33px;color:#000;padding-left:20px;padding-top:3px;"><b>LABORATORY EXAMS</b></div>
              <?php 
                // if ($_SESSION['lab']=='laboratin' || $_SESSION['post']=='accountant' || $_SESSION['post']=='titulaire' || $_SESSION['post']=='admin' || $_SESSION['post']=='Verification')
                // {
                echo '<form action="labo.php" method="post">
                <button class="buttonlab" style="position: absolute; color: white; left: 250px; top: 20px;" ><span>LABORATORY</span></button>
                </form>';
                // }
              ?>
         	<div style="width:99.5%;height:95%;box-shadow:0px 0px 5px 0px #000;border:1px solid #09F;position:relative;background-color:#FFF;left:4px;top:60px;overflow:auto;">	
           <!-- <iframe style="position: absolute; border: 0px solid #09F; overflow: hidden; background-color: #FFF; left: -1px; top: 7px; width: 100%; height: 600px;" src="laboratory.php"></iframe> -->
           <?php if($_SESSION['status']=='activated'){ ?>

<div  style="width:99.6%; height:580px; box-shadow: 0px 0px 5px 0px #000; border: 1px solid #09F; overflow:auto; position:absolute; background-color:#FFF; left: 4px; top: 35px;">

<table width="0" bgcolor="#CCCCCC" border="0" cellspacing="0" cellpadding="0">
 <form action="laboratoryx.php" method="post">
  <tr>
    <td>Period</td>
    <td><select name="periode">
    <?php 
    $per = "SELECT DISTINCT period  FROM invoice ORDER BY date DESC";
        $retvalper = mysqli_query($link, $per);
        if(! $retvalper ){ die('Could not get data: ' . mysqli_error($link));  }                         
         while($rowper = mysqli_fetch_array($retvalper, MYSQLI_ASSOC))
                 {  echo '<option value="'.$rowper['period'].'">'.$rowper['period'].'</option>';  }
    ?>
    </select>
    </td>
    <td><input type="submit" value="OK" class="bg-primary"/></td>
  </tr>
 </form>
</table>
<hr />

<?php
$defper = "SELECT DISTINCT period  FROM invoice ORDER BY date DESC LIMIT 1";
        $defretvalper = mysqli_query($link, $defper);
        if(! $retvalper ){ die('Could not get data: ' . mysqli_error($link));   }                         
         while($defrowper = mysqli_fetch_array($defretvalper, MYSQLI_ASSOC))
                 {  $defperiod=$defrowper['period'];  }
				 
				if(isset($_POST['periode']))
           { 
  				 $defperiod=$_POST['periode'];
					 }
				 
    ?>
<table width="99.9%" border="1" cellspacing="0" cellpadding="0">
  <tr bgcolor="#AAD5FF">
    <th colspan="4"><center><?php echo $defperiod ?></center></th>   
  </tr>
  <tr bgcolor="#CCCCCC">
    <th><center>No</center></th>
    <th><center>DESIGNATION</center></th>
    <th><center>CONSUMMED QUANTITY</center></th>
    <th><center>AMOUNT(RWf)</center></th>
  </tr><?php 
$i=0;

//find the month
$tot=0;
$med = "SELECT DISTINCT act FROM invoice WHERE type='LABORATOIRE' AND period='$defperiod'";
        $retvalmed = mysqli_query($link, $med);
        if(! $retvalmed ){ die('Could not get data: ' . mysqli_error($link));  }                         
         while($rowmed = mysqli_fetch_array($retvalmed, MYSQLI_ASSOC))
                 {
					 $i++;
					 $med=$rowmed['act'];
					 echo '<tr><td><center>'.$i.'</center></td>';					 
					 echo'<td>'.$med.'</td>';					 						
					    $med1 = "SELECT SUM(quantity), unityp  FROM invoice WHERE type='LABORATOIRE' AND act='$med' AND period='$defperiod'";
                        $retvalmed1 = mysqli_query($link, $med1);
                        if(! $retvalmed1 ){ die('Could not get data: ' . mysqli_error($link));  }                         
                              while($rowmed1 = mysqli_fetch_array($retvalmed1, MYSQLI_ASSOC))
                                      {					 
				                   	 $medcost=$rowmed1['SUM(quantity)']*$rowmed1['unityp'];
				                  	 echo '<td><center>'.$rowmed1['SUM(quantity)'].'</center></td>';
					                 echo '<td style="text-align:right;">'.$medcost.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>';					 
				                       }
					 $tot+=$medcost;
					 echo '</tr>';
				 }
?>

  <tr bgcolor="#CCCCCC">
    <th colspan="3">TOTAL</th>    
    <th style="text-align:right;"><?php echo $tot ?>&nbsp;Rwf&nbsp;</th>
  </tr>  
</table><br />

<?php }else{ echo '<iframe style="position: absolute; border: 0px solid #09F; overflow: hidden; background-color: #FFF; left: -1px; top: 0px; width: 933px; height: 500px;" src="no.php"></iframe>'; } ?>

</div>
          </div>       
       </div>
      </div>
    </div>
  </div>
</div>

  <?php include('foot.php'); ?>