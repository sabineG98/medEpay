<?php include('head.php'); ?>
<title>.::LABORATORY::.</title>
<?php include('navbar.php'); ?>
<?php
    if(isset($_POST['client']))
    {					   
    $code=$_POST['client'];
    $defper = "SELECT * FROM clients WHERE insurance_code='$code' OR client_id='$code' OR beneficiary LIKE'%$code%'  LIMIT 1";
            $retvalper = mysqli_query($link,$defper);
            if(! $retvalper )
            {  die('Could not get data: ' . mysqli_error($link));   }                            
            while($defrowper = mysqli_fetch_array($retvalper, MYSQLI_ASSOC))
                    {  $id=$defrowper['client_id'];   }
    }
?>
    <div class="card-body" style="background-image:url(img/31.jpg);" >
<!--==============================================Search=======================================-->
<div class="form-group row">                
                    <div class="col-md-5" style=" top:33px; background-color:#FFF; background-image: url(assets/images/bg.jpg); border: 1px solid #000;height:92.9vh;" >
                        <div id="overv2" style="width:585px; left:3px; top:2px; background-color:#FFF; background-image:none;">                           
                            <iframe src="labo1.php" style="width:570px; height:440px; border:0px solid #aaa; top:0px;"></iframe>
                        </div>
                        <div class="card-body " style="top:60px; background-color:#FFF;"></div>
                        <div class="card-body " style="top:160px; background-color:#FFF;">
				 		 <?php
                              if(!empty($id))
                                  { echo'<iframe src="waiting-list.php" style="width:100%; height:440px; border:0px solid #aaa; top:0px;"></iframe>';  }
                              else
                                  { echo'<iframe src="waiting-list.php" style="width:100%; height:440px; border:0px solid #aaa; top:0px;"></iframe>';  }
                          ?>
                            </div>                           
                    </div>
<!--==============================================Medicaments==================================-->
                    <div class="col-md-7" id="Div1" style="top:33px;height: 92.9vh;">
                        <div class="card-body" style=" background-color:#FFF; box-shadow:#999 0px 2px 2px 0px; overflow:auto; height: 92.9vh;">
                            <div class="form-group row">
                               <!---------------------------umwirondoro--------------------------------->
                                <div class="row" style="width:100%;">
                                    <div class="col-12 d-flex no-block align-items-center" style="width:100%;">
                                        <div class="card" style="width:100%;">
                                            <div class="card-header"  style="box-shadow:#999 0px 2px 2px 0px; width: 100%;z-index:1;">
                                                <?php
if(isset($_POST['code']))
{
$code=$_POST['code'];
$date=$_POST['date'];
$period=date("F-Y", strtotime($date));
$_SESSION['period']=$period;
$last = "SELECT DISTINCT *  FROM clients WHERE insurance_code='$code' OR client_id='$code'";
        $retval_last = mysqli_query($link,$last);
        if(! $retval_last )
           {  die('Could not get data: ' . mysqli_error($link));   }                         
         while($rowlast = mysqli_fetch_array($retval_last, MYSQLI_ASSOC))
                 {
					 $id=$rowlast['client_id'];
					 $percentage=$rowlast['percentage'];
					 $insu=$rowlast['insurance'];
					 $cname=$rowlast['beneficiary'];
					 $sectionx=$rowlast['sector'];
					 echo '<b>&nbsp;&nbsp;&nbsp;<font size="3">'.ucfirst($rowlast['beneficiary']).'</b>&nbsp;&nbsp;--';
					 echo $rowlast['famille'];
					 echo '--&nbsp;&nbsp;&nbsp;<b>('.$rowlast['insurance'].')</b> --->'.$date.' ---&nbsp;<b><i>CODE:</i><font color="#FF0000">&nbsp;&nbsp;&nbsp;'.$id.' </font>&nbsp;&nbsp;CAT: '.$percentage.'</font></b><br>&nbsp;&nbsp;&nbsp;<b>Address( District:';
					//  echo '--&nbsp;&nbsp;&nbsp;<b>('.$rowlast['insurance'].')</b> --->'.$date.' ---&nbsp;<b><i>CODE:</i><font color="#FF0000">&nbsp;&nbsp;&nbsp;'.$id.' </font>&nbsp;&nbsp;CAT: '.$percentage.'</font></b><br>&nbsp;&nbsp;&nbsp;';
		// $las = "SELECT section,district  FROM sector WHERE sector_code=$sectionx";
		// $las = "SELECT section,district  FROM sector WHERE sector_code=1";
        // $retval_las = mysqli_query($link,$las);
        // if(! $retval_las )
        //    {  die('Could not get data: ' . mysqli_error($link));   }                         
        //  while($rowlas = mysqli_fetch_array($retval_las, MYSQLI_ASSOC))
        //          {
					echo $rowlast['district'].' -- Sector:'.$rowlast['sector'];
				//  }
				 echo ' -- Cell:'.$rowlast['cell'].')';
					 break;		           
				 }
				   if (empty($id))
					{
					header("Location: home.php");
                    exit;
					}

}
else 
{
	$last = "SELECT * FROM clients WHERE insurance_code='$insurance_code' AND user='$user' ORDER BY client_id DESC LIMIT 1 ";
        $retval_last = mysqli_query($link,$last);
        if(! $retval_last )
           {  die('Could not get data: ' . mysqli_error($link));  }                         
         while($rowlast = mysqli_fetch_array($retval_last, MYSQLI_ASSOC))
                 {
					 $id=$rowlast['client_id'];
					 $percentage=$rowlast['percentage'];
					 $insu=$rowlast['insurance'];
					 $cname=$rowlast['beneficiary'];
					 $sectionx=$rowlast['sector'];
					 echo '<b><font size="3">'.ucfirst($rowlast['beneficiary']).'</b>-';
					 echo $rowlast['famille'];
					 echo '('.$rowlast['insurance'].')--->'.$date.'---&nbsp;<b><i>CODE:</i><font color="#FF0000">'.$id.'</font>&nbsp;&nbsp;&nbsp;&nbsp;CAT:'.$percentage.' </font></b><br>&nbsp;&nbsp;&nbsp;<b>Address( District:';
					//  echo '('.$rowlast['insurance'].')--->'.$date.'---&nbsp;<b><i>CODE:</i><font color="#FF0000">'.$id.'</font>&nbsp;&nbsp;&nbsp;&nbsp;CAT:'.$percentage.' </font></b><br>&nbsp;&nbsp;&nbsp;';
		// $las = "SELECT section,district  FROM sector WHERE sector_code=$sectionx";
		// $las = "SELECT section,district  FROM sector WHERE sector_code=1";
        // $retval_las = mysqli_query($link,$las);
        // if(! $retval_las )
        //    {  die('Could not get data: ' . mysqli_error($link));   }                         
        //  while($rowlas = mysqli_fetch_array($retval_las, MYSQLI_ASSOC))
        //          {
					echo $rowlast['district'].' -- Sector:'.$rowlast['sector'];
				//  }
				 echo ' -- Cell:'.$rowlast['cell'].')';
					 break;
				 }
}
?> 
<a style="color:green; float:right;" href="orderdelete-lab.php?id=<?php echo $id; ?>&date=<?php echo $date; ?>" onclick="return hs.htmlExpand(this, { objectType:'iframe'} )">
               <img src="img/edit1.png" width="20" height="20" /><strong>Edit</strong></a>
                                            </div>
                                        </div>                                         
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row" >
                                <!---------------------------kwongera imiti itarimo--------------------------------->
                                <iframe style="overflow:hidden; background-color:#fff;width:100%;height:68vh;border:0;" src="tabs-new.php?id=<?php echo $id; ?>&insu=<?php echo $insu; ?>&date=<?php echo $date; ?>"></iframe>
                                <!---------------------------kwerekana imiti yahawe--------------------------------->
                                <!-- <div class="card-body" >
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="col-md-6"></div>                
                                            <div class="col-md-2"></div>
                                            <div class="col-md-0"></div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6"></div>           
                                        <div class="col-md-2"></div>
                                        <div class="col-md-0"></div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                        <!-- <div class="card-header " style=" background-color:#EFEFEF;">
                        <div class="form-group row">
                            <div class="col-md-3"></div>
                            <div class="col-md-3"></div>
                        </div>
                        </div> -->
                    </div>
                    <div class="col-md-7" id="Div2" style="top:33px; display:none;">
                        <div class="card-body" style=" background-color:#FFF; box-shadow:#999 0px 2px 2px 0px; overflow:auto; height: 540px;">
                            <iframe style="position:absolute; border: 0px solid #F00; width: 700px; height: 580px;" src="consommation1.php"></iframe>
                        </div>
                        <div class="card-header " style=" background-color:#EFEFEF;">
                        <div class="form-group row">
                            <div class="col-md-3"></div>
                            <div class="col-md-3"></div>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-7" id="Div3" style="top:33px; display:none;">
                        <div class="card-body" style=" background-color:#FFF; box-shadow:#999 0px 2px 2px 0px; overflow:auto; height: 690px;">
                           <!-- <iframe style="position:absolute; border: 0px solid #F00; width: 700px; height: 580px;" src="find-served.php"></iframe>-->
                           <?php include('find-served2.php'); ?>
                        </div>
                        <div class="card-header " style=" background-color:#FFF;">
                        <div class="form-group row">
                            <div class="col-md-3"></div>
                            <div class="col-md-3"></div>
                        </div>
                        </div>
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
    <script>
        function switchVisible() 
        {
            if (document.getElementById('Div1')) 
                {
                    if (document.getElementById('Div1').style.display == 'none') 
                    {
                        document.getElementById('Div1').style.display = 'block';
                        document.getElementById('Div2').style.display = 'none';
                        document.getElementById('Div3').style.display = 'none';
                    }
                    else 
                    {
                        document.getElementById('Div1').style.display = 'none';
                        document.getElementById('Div2').style.display = 'block';
                    }
                }                
        }

        function switchVisible1() 
        {
            if (document.getElementById('Div3')) 
                {
                    if (document.getElementById('Div3').style.display == 'none') 
                    {
                        document.getElementById('Div3').style.display = 'block';
                        document.getElementById('Div2').style.display = 'none';
                        document.getElementById('Div1').style.display = 'none';
                    }
                    else 
                    {
                        document.getElementById('Div1').style.display = 'block';
                        document.getElementById('Div2').style.display = 'none';
                        document.getElementById('Div3').style.display = 'none';
                    }
                }                
        }
    </script>
<?php include('foot.php'); ?>