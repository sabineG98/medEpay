<?php include('head.php'); ?>
<title>.::REVENUES::.</title>
<?php include('navbar.php'); ?>
<div class="container">
  <div class="col-lg-12 mt-5">
    <div style="background-color:#ECF5FF !important;width:100%;opacity:1;position:relative;box-shadow:0px 0px 0px #888;padding:2px;margin:1px 0;box-shadow:inset 5px 5px 5px rgba(0,0,0,.2);-webkit-box-shadow:inset 0 1px 4px rgba(0,0,0,.2);-webkit-border-radius:10px;border-color:#000;box-shadow:0px 0px 5px #000;height:79vh;overflow:auto;">
      <div style="position:absolute;border: 0px solid #09F;overflow:hidden;background-color:#FFF;left:-1px;top:7px;width:100%;height:600px;">
         <div  style="width:99.5%; height:90%; box-shadow: 0px 0px 5px 0px #000; border: 1px solid #09F; position:relative; background-color:#FFF; left: 4px; top: 60px;">
            <div class="text-dark" style="position:absolute; border-radius: 0px 200px 10px 10px;  width:200px; border: 1px solid #09F; height:25px; background-color:#BDF; left: -2px; top: -27px;"><b><strong>ALL BILLS</strong></b></div><br>
            <?php if($_SESSION['status']=='activated'){ ?>
            <table width="0" bgcolor="#CCC">
               <form action="revenuesx.php" method="post">
                  <tr>
                     <td style="color:#000;">&nbsp;<b>Period</b></td>
                     <td><select class="form-control" style="width:230px;" name="periode">
                        <?php 
                        $per = "SELECT DISTINCT period  FROM orders ORDER BY time DESC";
                           $retvalper = mysqli_query($link,$per);
                           if(! $retvalper )
                              { die('Could not get data: ' . mysqli_error($link));   }                         
                              while($rowper = mysqli_fetch_array($retvalper, MYSQLI_ASSOC))
                                    { echo '<option value="'.$rowper['period'].'">'.$rowper['period'].'</option>';  }
                        ?>
                     </select>
                     </td>
                     <td><button class="button"><span>Ok</span></button></td>
                  </tr>
               </form>
            </table>
            <hr />

            <?php
               $defper = "SELECT DISTINCT period  FROM orders ORDER BY time DESC LIMIT 1";
               $defretvalper = mysqli_query($link,$defper);
                  if(! $retvalper )
                     { die('Could not get data: ' . mysqli_error($link));  }                         
                     while($defrowper = mysqli_fetch_array($defretvalper, MYSQLI_ASSOC))
                           { $defperiod=$defrowper['period'];  }
                        
                        if(isset($_POST['periode']))
                                 { $defperiod=$_POST['periode']; }				 
            ?>
            <table class="text-dark" width="100%" height="194" border="1" cellpadding="0" cellspacing="0">  
               <tr bgcolor="#AAD5FF">
                  <th colspan="3" class="text-center"><?php echo $defperiod ?></th>   
               </tr>
               <tr bgcolor="#CCC">
                  <th width="36" scope="col" class="text-center">No</th>
                  <th width="432" scope="col" style="padding-left:10px;">DESCRIPTION</th>
                  <th width="137" scope="col" style="padding-left:10px;">AMOUNT</th>
               </tr>
               <tr>
                  <td class="text-center">1</td>
                  <td style="padding-left:10px;">CONSULTATIONS</td>
                  <td style="padding-left:10px;">                     
                        <?php     
                        $totm=0;
                                       $med1 = "SELECT SUM(total)  FROM invoice WHERE type='CONSULTATION'  AND period='$defperiod'";
                                            $retvalmed1 = mysqli_query($link, $med1);
                                            if(! $retvalmed1 ){ die('Could not get data: ' . mysqli_error($link)); }                         
                                                  while($rowmed1 = mysqli_fetch_array($retvalmed1, MYSQLI_ASSOC))
                                                          {
                                                       $medcost=$rowmed1['SUM(total)'];					 
                                                       }
                                    $totm=$medcost;
                        echo $totm.' FRW';
                           ?>
                  </td>
               </tr>
               <tr>
                  <td class="text-center">2</td>
                  <td style="padding-left:10px;">LABORATORY</td>
                  <td style="padding-left:10px;">                  
                  <?php     
                     $totm=0;
					      $med1 = "SELECT SUM(total)  FROM invoice WHERE type='LABORATOIRE'  AND period='$defperiod'";
                        $retvalmed1 = mysqli_query($link, $med1);
                        if(! $retvalmed1 ){ die('Could not get data: ' . mysqli_error($link)); }                         
                              while($rowmed1 = mysqli_fetch_array($retvalmed1, MYSQLI_ASSOC))
                                      {
				                   	 $medcost=$rowmed1['SUM(total)'];					 
				                       }
					      $totm=$medcost;
                     echo $totm.' FRW';
                  ?>                 
                  </td>
               </tr>
               <tr>
                  <td class="text-center">3</td>
                  <td style="padding-left:10px;">MEDICAL IMAGING</td>
                  <td style="padding-left:10px;">
                  <?php     
                     $totm=0;
                     $med1 = "SELECT SUM(total)  FROM invoice WHERE type='IMAGING'  AND period='$defperiod'";
                           $retvalmed1 = mysqli_query($link, $med1);
                           if(! $retvalmed1 ){ die('Could not get data: ' . mysqli_error($link)); }                         
                                 while($rowmed1 = mysqli_fetch_array($retvalmed1, MYSQLI_ASSOC))
                                       {
                                    $medcost=$rowmed1['SUM(total)'];					 
                                    }
                     $totm=$medcost;
                     echo $totm.' FRW';
                  ?>              
                  </td>
               </tr>
               <tr>
                  <td class="text-center">4</td>
                  <td style="padding-left:10px;">HOSPITALISATION</td>
                  <td style="padding-left:10px;">                  
                  <?php     
                   $totm=0;
					    $med1 = "SELECT SUM(total)  FROM invoice WHERE type='HOSPITALISATION'  AND period='$defperiod'";
                        $retvalmed1 = mysqli_query($link, $med1);
                        if(! $retvalmed1 ){ die('Could not get data: ' . mysqli_error($link)); }                         
                              while($rowmed1 = mysqli_fetch_array($retvalmed1, MYSQLI_ASSOC))
                                      {					 
				                   	 $medcost=$rowmed1['SUM(total)'];
				                       }
					    $totm=$medcost;
                   echo $totm.' FRW';
	               ?>              
                  </td>
               </tr>
               <tr>
                  <td class="text-center">5</td>
                  <td style="padding-left:10px;">INJECTABLE MEDECINES</td>
                  <td style="padding-left:10px;">   
                  <?php     
                     $totm=0;  
                     $med1 = "SELECT SUM(total)  FROM invoice WHERE type='MEDICAMENTS INJECTAB'  AND period='$defperiod'";
                           $retvalmed1 = mysqli_query($link, $med1);
                           if(! $retvalmed1 ){ die('Could not get data: ' . mysqli_error($link)); }                         
                                 while($rowmed1 = mysqli_fetch_array($retvalmed1, MYSQLI_ASSOC))
                                       {					 
                                    $medcost=$rowmed1['SUM(total)'];
                                    }
                     $totm=$medcost;
                     echo $totm.' FRW';
                  ?>               
                  </td>
               </tr>
            </table>
            <?php }else{ echo '<iframe style="position: absolute; border: 0px solid #09F; overflow: hidden; background-color: #FFF; left: -1px; top: -27px; width: 1200px; height: 500px;" src="no.php"></iframe>'; } ?>
            <br />
         </div>
      </div>       
    </div>
  </div>
</div>
<?php include('foot.php'); ?>