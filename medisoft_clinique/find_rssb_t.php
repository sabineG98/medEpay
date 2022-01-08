<?php


$code=$_POST['client'];
$defper = "SELECT * FROM rssb WHERE aff_num='$code' ";
        $retvalper = mysqli_query($link, $defper);
        if(! $retvalper )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($defrowper = mysqli_fetch_array($retvalper, MYSQLI_ASSOC))
                 {
				 $id=$defrowper['rssb_id'];
					$num_doss=$defrowper['num_doss'];
					$aff_num=$defrowper['aff_num'];
					$fname= $defrowper['fname'];
					$lname= $defrowper['lname'];
					
					$type=$defrowper['type'];
					 
					 
					  if ($type==1)
					 
					    {
							$adherent="".$fname= $defrowper['fname']." ".$lname= $defrowper['lname']."";
						}
					 
					 if ($type==2)
					 
					    {
						
		$defper = "SELECT fname, lname  FROM rssb WHERE num_doss='$num_doss' ORDER BY rssb_id ASC LIMIT 1 ";
        $retvalper = mysqli_query($link, $defper);
        if(! $retvalper )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($defrowper = mysqli_fetch_array($retvalper, MYSQLI_ASSOC))
                 {
						$adherent="".$fnamea= $defrowper['fname']." ".$lnamea= $defrowper['lname']."";  
				 }
						
						
						}
				
        
						   
						
										  
	             }
				 
				 
			
		 

?>