<?php
include('link.php');
        if(isset($_POST['client2']))
        {
            include('find_musa_refresh_consult.php');
        }

        if(isset($_REQUEST['client']))
        {					   
        $code=$_REQUEST['client'];
		$service=$_REQUEST['service'];

        if($service==7){
            $defper = "SELECT * FROM clients WHERE age > 2016 AND insurance_code='$code' OR client_id='$code' OR beneficiary LIKE'%$code%'  LIMIT 1";
        }else{
            $defper = "SELECT * FROM clients WHERE insurance_code='$code' OR client_id='$code' OR beneficiary LIKE'%$code%'  LIMIT 1";
        }
                $retvalper = mysqli_query($link,$defper);
                if(! $retvalper )
                    {
                        die('Could not get data: ' . mysqli_error($link));
                    }    
                    
                    
                while($defrowper = mysqli_fetch_array($retvalper, MYSQLI_ASSOC))
                        {
                    $id=$defrowper['client_id'];
                        
                                
                        }
            
                if(!empty($id))
                
                include('find_existing_consult.php');	
                else
                include('find_musa_consult.php');
            }
                
        ?>