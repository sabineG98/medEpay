<?php include('link.php')?>
<?php 
        error_reporting(E_ERROR | E_PARSE);
        session_start();
        if(!$_SESSION['valid_user']){
            header("Location: login.php");
            exit;
        } 
    ////////////////////////
    $idletime=900;
    if(isset($_SESSION['timeout'])){
        $session_life = time() - $_SESSION['timeout'];
        if($session_life > $idletime){
            header("Location: logout.php");
        }
    }
    $_SESSION['timeout'] = time();	
    /////////////////////
    if($_SESSION['nurse']=='nurse' || $_SESSION['phar']=='pharmacist' || $_SESSION['acc']=='accountant' || $_SESSION['titu']=='titulaire' || $_SESSION['adm']=='admin')
    {   
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
        $name=$_SESSION['name'];
        $usr=$_SESSION['name'];
        $select_query = "SELECT * FROM users WHERE fullname='$usr'";
            $select_query_run = mysqli_query($link,$select_query);		
            if($select_query_run)
            {
                if(mysqli_num_rows($select_query_run) > 0)
                {
                    $row = mysqli_fetch_array($select_query_run,MYSQLI_ASSOC);				
                    $use_id=$row['id'];
                    $fullname=$row['fullname'];
                    $post=$row['post'];
                    $username=$row['username'];
                    $password=$row['password'];
                    $levels=$row['levels'];
                }
                else
                { die('Error in the SELECT query' . mysqli_error($link)); }
            }
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
<!DOCTYPE html PUBLIC "-//W3C//Dth XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/Dth/xhtml1-transitional.dth">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <link href="css.css" rel="stylesheet" type="text/css" media="screen" />
        <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
        <script type="text/javascript" src="path_to/jquery.leanModal.min.js"></script>
        <meta http-equiv="refresh" content="">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script type="text/javascript" src="highslide/highslide-with-html.js"></script>
        <link rel="stylesheet" type="text/css" href="highslide/highslide.css" />    
            <!-- Custom CSS -->
        <link href="dist/css/style.min.css" rel="stylesheet">
        <title> .::CONSULTATION::. </title>    
        <script type="text/javascript">
        hs.graphicsDir = 'highslide/graphics/';
        hs.outlineType = 'rounded-white';
        hs.wrapperClassName = 'draggable-header';
        </script>    
        <style>
            .blink{
                    animation:blinkingText 1.2s infinite;
                }
                @keyframes blinkingText{
                        0%{background-color:#ff0;}
                        49%{background-color:#ff0;}
                        60%{background-color:transparent;}
                        99%{background-color:transparent;}
                        100%{background-color:#ff0;}
                    }
            #bg {
                position: fixed; 
                top: 0; 
                left: 0; 

                /* Preserve aspet ratio */
                min-width: 100%;
                min-height: 100%;
                max-width: 100%;
                max-height: 100%;
                }

                #lean_overlay {
                position: fixed;
                z-index:100;
                top: 0px;
                left: 0px;
                height:100%;
                width:100%;
                background: #000;
                display: none;
                }
                /* Button used to open the contact form - fixed at the bottom of the page */
                .receipt-button {
                background-color: #555;
                color: white;
                padding: 6px 10px;
                border: none;
                cursor: pointer;
                opacity: 0.8;
                position: fixed;
                /* bottom: 23px; */
                /* right: 28px; */
                width: 18%;
                }

                .labo-button {
                background-color: #555;
                color: white;
                padding: 6px 10px;
                border: none;
                cursor: pointer;
                opacity: 0.8;
                position: fixed;
                left:48%;
                /* bottom: 23px; */
                /* right: 28px; */
                width: 18%;
                }
                .info-button {
                background-color: #555;
                color: white;
                padding: 6px 10px;
                border: none;
                cursor: pointer;
                opacity: 0.8;
                position: fixed;
                left:48%;
                /* bottom: 23px; */
                /* right: 28px; */
                width: 18%;
                }
                /* The popup form - hidden by default */
                .form-popup {
                display: none;
                position: absolute;
                width: 60%;
                bottom: 0;
                right: 15px;
                border: 0px solid #f1f1f1;
                z-index: 9;
                }
                .form-popup1 {
                display: none;
                position: absolute;
                width: 60%;
                bottom: 0;
                right: 15px;
                border: 0px solid #f1f1f1;
                z-index: 9;
                }
                .form-popup2 {
                display: none;
                position: absolute;
                width: 60%;
                bottom: 0;
                right: 15px;
                border: 0px solid #f1f1f1;
                z-index: 9;
                }
                .form-info {
                display: none;
                position: absolute;
                width: 60%;
                bottom: 0;
                right: 15px;
                border: 3px solid #f1f1f1;
                z-index: 9;
                }
                /* Add styles to the form container */
                .form-container {
                max-width: 300px;
                padding: 10px;
                background-color: white;
                }

                /* Full-width input fields */
                .form-container input[type=text], .form-container input[type=password] {
                width: 100%;
                padding: 15px;
                margin: 5px 0 22px 0;
                border: none;
                background: #f1f1f1;
                }

                /* When the inputs get focus, do something */
                .form-container input[type=text]:focus, .form-container input[type=password]:focus {
                background-color: #ddd;
                outline: none;
                }

                /* Set a style for the submit/login button */
                .form-container .btn {
                background-color: #04AA6D;
                color: white;
                padding: 16px 20px;
                border: none;
                cursor: pointer;
                width: 100%;
                margin-bottom:10px;
                opacity: 0.8;
                }

                /* Add a red background color to the cancel button */
                .form-container .cancel {
                background-color: red;
                }

                .button1 {
  border:hidden;
  display: inline-block;
  border-radius: 4px;
  background-color:#069;
  color: #FFFFFF;
  text-align: center;
  font-size: 16px;
  padding: 0 7px;
  width: auto;
  transition: all 0.5s;
  cursor: pointer;
  margin: 2px;
}
.button1 span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}
.button1 span:after {
  content: 'Ok';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}
.button1:hover span {
  /* padding-right: 25px; */
}
.button1:hover span:after {
  opacity: 1;
  right: 0;
}
                /* Add some hover effects to buttons */
                .form-container .btn:hover, .open-button:hover {
                opacity: 1;
                }
        </style>
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
        <script>
            function autoRefresh(service) {	
            var x = 1;
            $.ajax({		 		
            url: "co-waiting-list.php",
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
            }
            function run(service,id,date) {	
            window.location="consultation.php?service="+service+"&code="+id+"&date="+date;
            }	
        </script>
    </head>
    <body>
        <img src="img/31.jpg" id="bg" alt="">
        <div class="card" style="background: rgba(0%,50%,75%,0.4);box-shadow: 0px 0px 5px 0px #000;" >
            <div class="form-group row">
                <div class="col-md-10" style="top:8px;background-color:none; left:1%;">

                    <img  style="top: -3px;" src="img/logo medi.png" />
                    <?php 
                        $noon=date('12:00:00');
                        $evening=date('17:30:00');
                        $now=date('H:i:s');
                        echo'<font color="white">';
                        if($now>$noon && $now<$evening)
                        {
                        echo'Bon Apres-midi <a style="color:white;" href="userprofile.php?user='.$_SESSION['name'].'">'.ucwords($_SESSION['name']).'</a> !'; 
                        }
                        elseif($now>$evening)
                        {
                        echo'Bonsoir <a style="color:white;" href="userprofile.php?user='.$_SESSION['name'].'">'.ucwords($_SESSION['name']).'</a> !'; 
                        }
                        else
                        {
                        echo'Bonjour <a style="color:white;" href="userprofile.php?user='.$_SESSION['name'].'">'.ucwords($_SESSION['name']).'</a> !'; 
                        } 
                        
                    ?></font>
                    &nbsp;&nbsp;&nbsp;
    
                    <input id="Button1" style="opacity: 0.8;" class="btn btn-secondary" type="button" value="INSURANCE CODE,NAME,.." onclick="openForm();"/>
                    <button id="Button1" style="opacity: 0.8;" class="btn btn-secondary" onclick="openRec();">
                        <?php
                            $service=$_GET['service'];
                            $date1=date('Y-m-d');
                            $products = "SELECT COUNT(DISTINCT client_id) AS tot FROM orders WHERE orders.date='$date1' AND orders.type NOT IN ('med','laboratoire') AND orders.done=0 AND orders.service='$service' ";
                            $retval = mysqli_query($link,$products);
                            if(! $retval )
                            {
                            die('Could not get data: ' . mysqli_error($link));
                            }    
                            while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                            {					 
                            echo $row['tot'];
                            }
                        ?>
                        Patient(s) are waiting
                    </button>
                    <button id="Button1" style="opacity: 0.8;" class="btn btn-secondary"  onclick="openLabo();">
                    <?php
                        $date1=date('Y-m-d');
                        $prodcts = "SELECT COUNT(DISTINCT lab_results.client_id) AS tot FROM lab_results,orders,acts WHERE orders.type='laboratoire' AND orders.client_id=lab_results.client_id AND lab_results.date='$date1'  AND orders.done=3 AND orders.service='$service' AND lab_results.service=orders.service AND lab_results.done=0 AND lab_results.exam_id=acts.act_id AND orders.item=acts.act_id";
                        $retal = mysqli_query($link,$prodcts);
                        if(! $retal )
                        {
                        die('Could not get data: ' . mysqli_error($link));
                        }    
                        while($ro = mysqli_fetch_array($retal, MYSQLI_ASSOC))
                        {					 
                        echo $ro['tot'];
                        }
                    ?>
                    Patient(s) got lab results
                    </button>

                </div>

                <div class="col-md-2" style="top:13px;background-color:none;float:left;">
                    <?php
                        if ($_SESSION['post']!='nurse' && $_SESSION['post']!='pharmacist' && $_SESSION['post']!='laboratin')
                        {  echo'<a href="home.php"><img  style=" top: -3px; " src="img/home.png"  alt="Saisie"  /></a>'; }
                    ?>
                    <a href="applications.php"><img  style="top: -3px; " src="img/app.png"  /></a>
                    <a href="logout.php"><img  style="top: -3px; " src="img/logout.png" /></a>
                    <a href="inbox.php" onclick="return hs.htmlExpand(this, { objectType:'iframe'} )"><img  style="top: -3px; " src="img/coment2.png" />
                    <?php
                        $products="SELECT count(msg) AS msgs FROM messages,users WHERE users.id=messages.from_id AND messages.to_id='$use_id' AND ifread=0 ORDER BY msg_date DESC";
                        $retval = mysqli_query($link,$products);
                        if(! $retval )
                        {  die('Could not get data: ' . mysqli_error($link));   }                         
                        while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
                        {								 			 
                        $msgs=$row['msgs'];
                        if($msgs>0)
                        {
                        echo'<span class="blink" style="position:absolute; left: 640px; top: -22px; background-color:#FF0; border-radius:60%; ">';
                        echo $msgs;
                        echo'</span>';
                        }						
                        }
                    ?>
                    </a>
                </div>
            
            </div>
            
            <div class="form-popup" id="myForm" style="top:96%;left:13%; background-color:none;">
                <div id="overv2" style="width:73%; left:27px; top:2px; background-color:#FFF; background-image:none;">                          
                    <iframe src="adult-search.php?service=<?php echo $service; ?>" style="width:100%;height:440px;border:0px solid #aaa;top:0px;" onmouseover="autoRefresh(<?php echo $service; ?>)"></iframe>
                    <div id="form_output"></div>
                </div> 
                <button type="button" style="top:126px; background-color:none;" onclick="closeForm()">X</button>
            </div>
            <div class="form-popup1" id="rec" style="top:96%;left:13%; background-color:none;">
                <div style="border: 1px solid #069; width:auto; height:300px; overflow:auto; border-radius:10px;background-color:#B7E1F7;">
                    <button type="button" style="top:126px; background-color:none;" onclick="closeRec()">X</button>
                    <center>
                    <table width="100%" border="1" style="font-size:15px; border-collapse: collapse;" cellspacing="0" cellpadding="0">
                    <tr bgcolor="#CCCCCC">
                    <th colspan="4" style="font-size:20px;"><center>Waiting List</center></th>
                    </tr>
                    <tr bgcolor="skyblue">
                    <th><center>No</center></th>
                    <th>Names</th>
                    <th><center>Client Code</center></th>
                    <th><center>Select</center></th>
                    </tr>
                    <?php         
                    $products1 = "SELECT DISTINCT client_id FROM orders WHERE date='$date1' AND done=0 ";
                    $retval1 = mysqli_query($link,$products1);
                    if(! $retval1 )
                    {
                    die('Could not get data: ' . mysqli_error($link));
                    }    
                    while($row1 = mysqli_fetch_array($retval1, MYSQLI_ASSOC))
                    {
                    $clien=$row1['client_id'];
                    }        
                    $i=0;
                    $clients="SELECT DISTINCT beneficiary,orders.client_id,service FROM clients,orders WHERE clients.client_id=orders.client_id AND orders.type NOT IN ('med','laboratoire') AND orders.done=0 AND orders.date='$date1' AND orders.service='$service'"; 
                    $qry_run=mysqli_query($link,$clients);
                    if(!$qry_run)
                    {
                    die('Could not get data:'.mysqli_error($link));	
                    }
                    while($rows=mysqli_fetch_array($qry_run,MYSQLI_ASSOC))
                    {
                    $i++;
                    $clie=$rows['client_id'];
                    if($i%2==0)
                    {
                    echo '<tr bgcolor="#D9FFD9">';
                    }
                    else
                    echo '<tr bgcolor="#FFF">';
                    echo'<form action="opd-adult.php?service='.$service.'" method="post" target="_parent" name="form1"  >';
                    echo '<td><center>'.$i.'</center></td>';
                    echo '<td>'.ucfirst($rows['beneficiary']).'</td>';
                    echo '<td><center>'.$clie.'</center></td>';
                    echo'<input type="hidden" name="code" value="'.$clie.'">
                    <input type="hidden" name="service" value="'.$service.'">
                    <input type="hidden" name="date" size="8" value="'.date('Y-m-d').'"  autofocus="autofocus"/>';
                    echo' <td width="70"><center><button class="button1" onclick="run('.$service.','.$clie.','.date('Ymd').')"><span>Ok </span></button></center></td>';
                    echo '</form>';
                    echo '</tr>';
                    }
                    ?>
                    </table></center>
                    <br><br>
                </div>
            </div>
            <div class="form-popup2" id="labo" style="top:96%;left:13%; background-color:none;">

            <div style="border: 1px solid #069; width:auto; height:300px; overflow:auto; border-radius:10px;background-color:#B7E1F7;">
            <button type="button" style="top:126px; background-color:none;" onclick="closeLabo()">X</button>

            <center>
            <table width="100%" border="1" style="font-size:15px; border-collapse: collapse;margin:13px;" cellspacing="0" cellpadding="0">
            <tr bgcolor="#CCCCCC">
            <th colspan="5" style="font-size:20px;"><center>Waiting List</center></th>
            </tr>
            <tr bgcolor="skyblue">
            <th><center>No</center></th>
            <th>Names</th>
            <th><center>Client Code</center></th>
            <th><center>Exams & Results</center></th>
            <th><center>Select</center></th>
            </tr>
            <?php       
            $prducts1 = "SELECT DISTINCT client_id FROM lab_results WHERE date='$date1'";
            $reval1 = mysqli_query($link,$prducts1);
            if(! $reval1 )
            {
            die('Could not get data: ' . mysqli_error($link));
            }    
            while($rw1 = mysqli_fetch_array($reval1, MYSQLI_ASSOC))
            {
            $clen=$rw1['client_id'];
            }        
            $i=0;  
            $cients="SELECT DISTINCT beneficiary,lab_results.client_id,orders.type,orders.done FROM clients,lab_results,orders,acts WHERE  orders.type='laboratoire' AND clients.client_id=lab_results.client_id AND lab_results.date='$date1' AND orders.done=3 AND orders.service='$service' AND lab_results.service=orders.service AND lab_results.done=0 AND lab_results.exam_id=acts.act_id AND orders.item=acts.act_id"; 
            $qry_run=mysqli_query($link,$cients);
            if(!$qry_run)
            {
            die('Could not get data:'.mysqli_error($link));	
            }
            while($rows=mysqli_fetch_array($qry_run,MYSQLI_ASSOC))
            {
            $i++;
            $lien=$rows['client_id'];
            $benef=$rows['beneficiary'];							
            if($i%2==0)
            {
            echo '<tr bgcolor="#D9FFD9">';
            }
            else
            echo '<tr bgcolor="#FFF">';
            echo'<form action="opd-adult.php?service='.$service.'" method="post" target="_parent" name="form1"  >';
            echo '<td><center>'.$i.'</center></td>';
            echo '<td>'.ucfirst($benef).'</td>';
            echo '<td><center>'.$lien.'</center></td>';
            echo '<td>';				
            $j=1;
            $com="SELECT * FROM acts,lab_results WHERE acts.act_id=lab_results.exam_id AND lab_results.client_id='$lien' AND lab_results.date='$date1'";
            $com_run=mysqli_query($link,$com);
            if(!$com_run)
            {
            die('Could not get data:'.mysqli_error($link));	
            }
            while($rws=mysqli_fetch_array($com_run,MYSQLI_ASSOC))
            {
            $act=$rws['act'];
            $result=$rws['pos_neg_result'];
            $comment=$rws['comment'];
            echo '&nbsp;'.$j++ .'- '. $act.'&nbsp;'.'(';				
            if($result=='3')
            {
            echo '<font color="#006600">Negatif</font>';	
            }
            elseif($result=='1')
            {
            echo '<font color="#FF0000">Positif</font>';	
            }
            elseif($result=='2')
            {
            echo '<font color="#0033FF">'.$comment.'</font>';		
            }
            else
            {
            echo '<font color="#FF00FF">'.$result.'</font>';		
            }
            echo')<br>';
            }
            echo'</td>';
            echo'<input type="hidden" name="code" value="'.$lien.'">
            <input type="hidden" name="service" value="'.$service.'">';
            // $datex=date('Y-m-d',strtotime());
            $com="SELECT orders.date FROM orders,acts WHERE client_id='$lien' AND acts.act_id=orders.item ";
            $com_run=mysqli_query($link,$com);
            if(!$com_run)
            {
            die('Could not get data:'.mysqli_error($link));	
            }
            while($rws=mysqli_fetch_array($com_run,MYSQLI_ASSOC))
            {
            $date=$rws['date'];

            echo' <input type="hidden" name="date" size="8" value="'.$date.'"  autofocus="autofocus"/>';
            }
            echo' <td width="70"><center><button class="button1" onclick="run('.$service.','.$lien.','.date('Ymd').')"><span>Ok </span></button></center></td>';
            echo '</form>';
            echo '</tr>';
            }
            ?>
            </table></center>
            <br><br>
            </div>
            </div>
            <div class="form-info" id="info">
                <br><br><br>
                <button type="button" onclick="closeInfo()">X</button>
            </div>
        </div>

        <!-- <div class="card" style="margin:1%;top:3%;background-image:url(img/31.jpg);" > -->
            <div class="form-group row"> 
                <div class="col-md-12" style="top:3%;background-color:#EFEFEF;border:1px solid #000;left:1%" >
                    <div class="form-group row" style="box-shadow:#999 0px 0px 0px 0px; width:100%;">

                        <!---------------------------umwirondoro--------------------------------->
                        <div class="col-md-6"  style="background-color:#6be3e9;border:1px solid #a21c1c;box-shadow:#999 0px 2px 2px 0px;float:left;">
                         <!-- <br> -->
                         <label>Age: <?php $year=date('Y'); echo ($year-$age)*12;?>,  Sexe: <?php echo $sex;?>,  Poids: <input type="text" size="1" id="pcm210" name="210" onchange="checkthis(this.type,this.value,this.name,<?php echo $code;?>,false)" <?php $select = "SELECT * FROM evaluations WHERE client_id='$code' AND date='$date' AND pcmid=210";
                                    $retval_select = mysqli_query($link,$select);
                                    if($qry_ret=mysqli_num_rows($retval_select)>0){ while($rowselect = mysqli_fetch_array($retval_select, MYSQLI_ASSOC)){echo 'value="'.$rowselect['value'].'"'; }}
                                        ?>/>,  NC: <input type="checkbox" id="pcm214" name="pcmi214" value="214" onclick="checkthis(this.type,this.value,this.name,<?php echo $code;?>,false)" <?php $select = "SELECT * FROM evaluations WHERE client_id='$code' AND date='$date' AND pcmid=214";
                                    $retval_select = mysqli_query($link,$select);
                                    if($qry_ret=mysqli_num_rows($retval_select)>0){ echo 'checked'; }
                                        ?>>,  AC: <input type="checkbox" id="pcm213" name="pcmi213" value="213" onclick="checkthis(this.type,this.value,this.name,<?php echo $code;?>,false)" <?php $select = "SELECT * FROM evaluations WHERE client_id='$code' AND date='$date' AND pcmid=213";
                                    $retval_select = mysqli_query($link,$select);
                                    if($qry_ret=mysqli_num_rows($retval_select)>0){ echo 'checked'; }
                                        ?>>,  Taille: <input type="text" size="1" id="pcm211" name="211" onchange="checkthis(this.type,this.value,this.name,<?php echo $code;?>,false)" <?php $select = "SELECT * FROM evaluations WHERE client_id='$code' AND date='$date' AND pcmid=211";
                                        $retval_select = mysqli_query($link,$select);
                                        if($qry_ret=mysqli_num_rows($retval_select)>0){ while($rowselect = mysqli_fetch_array($retval_select, MYSQLI_ASSOC)){echo 'value="'.$rowselect['value'].'"'; }}
                                            ?>/>, Temperature: <input type="text" size="1" id="pcm212" name="212" onchange="checkthis(this.type,this.value,this.name,<?php echo $code;?>,false)" <?php $select = "SELECT * FROM evaluations WHERE client_id='$code' AND date='$date' AND pcmid=212";
                                            $retval_select = mysqli_query($link,$select);
                                            if($qry_ret=mysqli_num_rows($retval_select)>0){ while($rowselect = mysqli_fetch_array($retval_select, MYSQLI_ASSOC)){echo 'value="'.$rowselect['value'].'"'; }}
                                                ?>/> &deg;C </label>&nbsp;
                            <textarea style="position:relative;top:10px;" col="20" rows="1" id="pcm215" name="215" placeholder="Plainte" onchange="checkthis(this.type,this.value,this.name,<?php echo $code;?>,true)"><?php $select = "SELECT * FROM evaluations WHERE client_id='$code' AND date='$date' AND pcmid=215";
                                    $retval_select = mysqli_query($link,$select);
                                    if($qry_ret=mysqli_num_rows($retval_select)>0){ while($rowselect = mysqli_fetch_array($retval_select, MYSQLI_ASSOC)){echo $rowselect['comment']; }}
                                        ?>
                            </textarea>
                          </form>
                            <br>
                        </div>
                        &nbsp;
                        <div class="col-md-5"  style="box-shadow:#999 0px 2px 2px 0px;float:left;">
                         <br>
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
                                        $categorie=$rowlast['categorie'];
                                        $insu=$rowlast['insurance'];
                                        $cname=$rowlast['beneficiary'];
                                        $sex=$rowlast['sex'];
                                        $age=$rowlast['age'];
                                        echo '<b>&nbsp;<font size="2">'.ucfirst($rowlast['beneficiary']).'</b>&nbsp;&nbsp;-';
                                        echo $rowlast['famille'];
                                        echo '-&nbsp;&nbsp;<b>('.$rowlast['insurance'].')</b> -->'.$date.' --&nbsp;<b><i>CODE:</i><font color="#FF0000">&nbsp;'.$id.' </font>&nbsp;&nbsp;CAT: '.$categorie.'</font></b>';
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
                                        $categorie=$rowlast['categorie'];
                                        $insu=$rowlast['insurance'];
                                        $cname=$rowlast['beneficiary'];
                                        $sex=$rowlast['sex'];
                                        $age=$rowlast['age'];
                                        echo '<b><font size="3">'.ucfirst($rowlast['beneficiary']).'</b>-';
                                        echo $rowlast['famille'];
                                        echo '('.$rowlast['insurance'].')--->'.$date.'---&nbsp;<b><i>CODE:</i><font color="#FF0000">'.$id.'</font>&nbsp;&nbsp;&nbsp;&nbsp;CAT:'.$categorie.' </font></b>';
                                        break;
                                    }
                                }
                            ?> 
                            <a style="color:green; float:right;" href="orderdelete-co.php?id=<?php echo $id; ?>&date=<?php echo $date; ?>" onmouseover="getVote(this.value,<?php echo $id; ?>,<?php echo date('Ymd',strtotime($date)); ?>,<?php echo $service; ?>)" onclick="return hs.htmlExpand(this, { objectType:'iframe'} )">
                            <img src="img/edit1.png" width="20" height="20" /><strong>Edit</strong></a>
                            <div id="poll-no-need"></div>
                            <br>
                        </div>
                        <!---------------------------umwirondoro--------------------------------->
                    </div> 
                    <!---------------------------CONSULTATION-------------------------------->

                    <IFRAME STYLE="display:block;background-color:#FFF; top: 9%; width: 99%; height: 642px;"  onmouseover="autoRefresh(<?php echo $service; ?>)" src="tabs-new-consult-pcmi.php?id=<?php echo $id; ?>&insu=<?php echo $insu; ?>&date=<?php echo $date; ?>&categorie=<?php echo $categorie; ?>&service=<?php echo $service;?>&uid=<?php echo $use_id; ?>"></IFRAME>
                </div>
            </div>                  
        </div>





        <script>
            function openForm() {
            document.getElementById("myForm").style.display = "block";
            }

            function openLabo() {
            document.getElementById("labo").style.display = "block";
            }

            function openRec() {
            document.getElementById("rec").style.display = "block";
            }

            function openInfo() {
            document.getElementById("info").style.display = "block";
            }

            function closeForm() {
            document.getElementById("myForm").style.display = "none";
            }
            function closeLabo() {
            document.getElementById("labo").style.display = "none";
            }
            function closeRec() {
            document.getElementById("rec").style.display = "none";
            }
            function closeInfo() {
            document.getElementById("info").style.display = "none";
            }
        </script>
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
    </body>
</html>