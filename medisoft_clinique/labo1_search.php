<?php
      include('link.php');    
        if(isset($_POST['client2']))
        {
            include('find_musa_refresh_new.php');
        }

        if(isset($_REQUEST['client']))
        {					   
        $code=$_REQUEST['client'];

        $defper = "SELECT * FROM clients WHERE insurance_code='$code' OR client_id='$code' OR beneficiary LIKE'%$code%'  LIMIT 1";
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
                
                include('find_existing_new.php');	
                else
                include('find_musa_new.php');
            }
                
        ?>