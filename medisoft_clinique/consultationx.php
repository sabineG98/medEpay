<?php include('head.php'); ?>
<title>.::CONSULTATION::.</title>
<?php include('navbar.php'); ?>
<?php
// if($_SESSION['nurse']=='nurse' || $_SESSION['phar']=='pharmacist' || $_SESSION['acc']=='accountant' || $_SESSION['titu']=='titulaire' || $_SESSION['adm']=='admin')
// {   
$service=$_GET['service'];
switch($service)
{
case"1":
	$service1='OPD ADULTS';
	break;
  case"2":
	$service1='CPN';
	break;
  case"3":
	$service1='IPD';
	break;
  case"4":
	$service1='PF';
	break;
  case"5":
	$service1='Maternity';
	break;
  case"6":
	$service1='ARV';
    break;					   
  case"7":
    $service1='OPD KIDS';
    break;	
  case"8":
    $service1='SURGERY';
    break;
  case"9":
    $service1='DENTISTRY';
    break;	
  case"10":
    $service1='NCDs';
    break;	
  case"11":
    $service1='MENTAL HEALTH';
    break;	
 default:
  //echo "No Insurance";
}				
?>
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
    <script>
function getVote(int,id,date,service) {
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
  xmlhttp.open("GET","test.php?product="+int+"&id="+id+"&date="+date+"&service="+service,true);
  xmlhttp.send();
}
</script>
<script src="js/jquery.js"></script>
<script>
	function autoRefresh(service) {	
	//setInterval(function(){
	var x = 1;
	 $.ajax({		 		
                url: "co-waiting-listx.php",
                type: "GET",
                data: "service="+service,
                success: function (data) {
                    $("#form_output").html(data);
					console.log(data);
                },
                error: function (jXHR, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            }); // AJAX Get Jquery statment   
	//},3600);
}
	
function run(service,id,date) {	
window.location="consultationx.php?service="+service+"&code="+id+"&date="+date;
}	
</script>
</head>
    <!-- <button id="Button1" class="btn-success" type="button" value="HISTORIQUE" style="position:absolute;top:20px;z-index:20 !important;left:35%" onclick="switchVisible1();">Historique</button> -->
    <div class="card-body" style="background-image:url(img/31.jpg);" >
<!--==============================================Search=======================================-->
        <div class="form-group row">                
          <div class="col-md-5" style="top:33px;background-color:#FFF;background-image:url(assets/images/bg.jpg);border:0px solid #000;height:92.9vh;" >
            <div id="overv2" style="width:585px;left:3px;top:2px;background-color:#FFF;background-image:none;z-index:10;">                          
               <iframe src="consult-search.php?service=<?php echo $service; ?>" style="width:570px;height:440px;border:0px solid #aaa;top:0px;" onmouseover="autoRefresh(<?php echo $service; ?>)"></iframe>
                        </div>
                        <button class="button d-none d-lg-block" style="z-index:1; position:absolute; top:45px; left:80%;padding:3px 5px;">Waiting List</button>
                        <button class="button d-none d-sm-block d-lg-none d-md-block" style="z-index:1; position:absolute; top:45px; left:430px;padding:3px 5px;">Waiting List</button>
                        <div class="card-body " style="top:60px; background-color:#FFF;"></div>
                        <div class="card-body " style="top:160px; background-color:#FFF;">           
                        <?php
                                        if(!empty($id))
                            				{
       			echo'<iframe src="co-waiting-listx.php?service='.$service.'" style="width:100%; height:730px; border:0px solid #f00; top:0px;"></iframe>';
											}else{           		
				echo'<div id="form_output" style="width:100%; height:82.5vh; border:0px solid #f00; top:0px;"></div>';
											}
                                    ?>
                        </div>           
                    </div>
<!--==============================================Medicaments==================================-->
                    <div class="col-md-7" id="Div1" style="top:33px;background-color:#FFF;height: 92.9vh;">
                        <div class="card-body" style=" background-color:#FFF;overflow:auto; height: 92.9vh;">
                            <div class="form-group row">
                               <!---------------------------umwirondoro--------------------------------->
                                <div class="row" style="background-color:#FFF;width:100%;">
                                    <div class="col-12 d-flex no-block align-items-center" style="width:100%;">
                                        <div class="card" style="width:100%;">
                                            <div class="card-header" style="box-shadow:#999 0px 2px 2px 0px;width:100%;z-index:1;">
                                            <?php

if(isset($_GET['code']) || isset($_POST['code']))
{
$code=$_GET['code'] or $code=$_POST['code'];
$date=$_GET['date'] or $date=$_POST['date'];
$period=date("F-Y", strtotime($date));
$_SESSION['period']=$period;
$service=$_POST['service'] or $service=$_GET['service'];
$last = "SELECT DISTINCT *  FROM clients WHERE insurance_code='$code' OR client_id='$code'";
        $retval_last = mysqli_query($link,$last);
        if(! $retval_last )
           {
               die('Could not get data: ' . mysqli_error($link));
            }                         
         while($rowlast = mysqli_fetch_array($retval_last, MYSQLI_ASSOC))
                 {
					 $id=$rowlast['client_id'];
					 $categorie=$rowlast['percentage'];
					 $insu=$rowlast['insurance'];
					 $cname=$rowlast['beneficiary'];
					 echo '<b>&nbsp;&nbsp;&nbsp;<font size="3">'.ucfirst($rowlast['beneficiary']).'</b>&nbsp;&nbsp;--';
					 echo $rowlast['famille'];
					 echo '--&nbsp;&nbsp;&nbsp;<b>('.$rowlast['insurance'].')</b> --->'.$date.' ---&nbsp;<b><i>CODE:</i><font color="#FF0000">&nbsp;&nbsp;&nbsp;'.$id.' </font>&nbsp;&nbsp;CAT: '.$categorie.'</font></b>';
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
           {
               die('Could not get data: ' . mysqli_error($link));
            }                         
         while($rowlast = mysqli_fetch_array($retval_last, MYSQLI_ASSOC))
                 {
					 $id=$rowlast['client_id'];
					 $categorie=$rowlast['percentage'];
					 $insu=$rowlast['insurance'];
					 $cname=$rowlast['beneficiary'];
					 echo '<b><font size="3">'.ucfirst($rowlast['beneficiary']).'</b>-';
					 echo $rowlast['famille'];
					 echo '('.$rowlast['insurance'].')--->'.$date.'---&nbsp;<b><i>CODE:</i><font color="#FF0000">'.$id.'</font>&nbsp;&nbsp;&nbsp;&nbsp;CAT:'.$categorie.' </font></b>';
					 break;
				 }
}
?>                                                
<a style="color:green; float:right;" href="orderdelete-co.php?id=<?php echo $id; ?>&date=<?php echo $date; ?>" onmouseover="getVote(this.value,<?php echo $id; ?>,<?php echo date('Ymd',strtotime($date)); ?>,<?php echo $service; ?>)" onclick="return hs.htmlExpand(this, { objectType:'iframe'} )">
               <img src="img/edit1.png" width="20" height="20" /><strong>Edit</strong></a><div id="poll-no-need"></div>
                                            </div>
                                        </div>                                         
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row" >
                                <!---------------------------kwongera imiti itarimo--------------------------------->
<iframe style="position:absolute;overflow:hidden;border: 0px solid #F00;background-color:#FFF;width:95%;height:79.7vh;" onmouseover="autoRefresh(<?php echo $service; ?>)" src="tabs-co.php?id=<?php echo $id; ?>&insu=<?php echo $insu; ?>&date=<?php echo $date; ?>&categorie=<?php echo $categorie; ?>&service=<?php echo $service; ?>&uid=<?php echo $use_id; ?>"></iframe>
                     <!---------------------------kwerekana imiti yahawe--------------------------------->                                                    
                                 <?php
////////////////////////////////////////voucher-numbering//////////////////////////////////////////////////   
   $az=mysqli_query ($link,"SELECT DISTINCT voucher_no FROM orders WHERE client_id='$id' AND period='$period' AND date='$date' AND insured=1");   
							   if(!$az)
							   {	die('Could not Insert data: '.mysqli_error($link));	   }
							    while($rowv = mysqli_fetch_array($az, MYSQLI_ASSOC))
                                      {   $numb=$rowv['voucher_no'];  }   
if($insu=='MUSA')
{
echo'<iframe style="position:absolute; border: 1px solid #FFF; height: 50px; width: 0px; background-color: #FFF; top:330px; left:610px;" src="numbering.php?id='.$id.'&date='.$date.'&insu='.$insu.'"></iframe>';
}
////////////////////////////////////////end-of-voucher-numbering//////////////////////////////////////////////////
   ?>
<!----------------------------------------------------------Historique--------------------------------------------------------------------->
<div style="position:absolute; border-radius:0px 200px 10px 10px; width:200px; border:1px solid #09F;height:25px; background-color:#BDF;left:25px;top:400px;">
<a style=" color:black; float:left;" href="histor.php?client=<?php echo $id;?>" onClick="return hs.htmlExpand(this, { objectType:'iframe', width:1400})"><strong> &nbsp;HISTORIQUE DU CLIENT</strong></a></div>
<!----------------------------------------------------------End-Historique------------------------------------------------------------------>
                                <!-- <div class="card-body">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="col-md-6">fsdfsdfasdfas</div>                
                                            <div class="col-md-2">sdfsdfsd</div>
                                            <div class="col-md-0">aaaaaaaaaaaaaaaaaafffffffffffffff</div>
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
                        <div class="card-body" style=" background-color:#FFF; box-shadow:#999 0px 2px 2px 0px; overflow:auto; height: 70%;">
                            <iframe style="position:absolute; border: 0px solid #F00; width: 700px; height: 580px;" src="consommation1.php"></iframe>
                        </div>
                        <div class="card-header " style=" background-color:#EFEFEF;">
                        <div class="form-group row">
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-3">                               
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-7" id="Div3" style="top:33px; display:none;">
                        <div class="card-body" style=" background-color:#FFF; box-shadow:#999 0px 2px 2px 0px; overflow:auto; height: 94.5%;">
                           <?php include('find-served-consult.php'); ?>
                        </div>
                        <div class="card-header " style=" background-color:#FFF;">
                        <div class="form-group row">
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-3">                               
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <?php
				// }
				// else
				// {
				//  header("Location: no.php");
				//     exit;	
				// }
				?>    
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
<!-- </body>
</html> -->
<?php include('foot.php'); ?>
