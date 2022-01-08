<?php	
	echo'<table width="0" border="1" style="font-size:15px; border-collapse: collapse;" cellspacing="0" cellpadding="0">
                         <tr bgcolor="#CCCCCC" >
                         <td>BENEFICARY&nbsp;</td>
						 <td>CODE&nbsp;</td>						
                         <td>INSURANCE&nbsp;</td>
                         <td colspan="">%&nbsp;</td>
						 <td colspan="">ADHERENT&nbsp;</td>
						 <td colspan="">AGE&nbsp;</td>
						 <td colspan="">SEXE&nbsp;</td>
						 <td colspan="">REG DATE&nbsp;</td>						   						   						   
						   ';
						   
$code=$_POST['client'];
$i=0;
$defper = "SELECT * FROM clients WHERE insurance_code ='$code' OR client_id='$code' OR beneficiary LIKE'%$code%'  ORDER BY client_id DESC LIMIT 1000 ";
        $retvalper = mysqli_query($link, $defper);
        if(! $retvalper )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($defrowper = mysqli_fetch_array($retvalper, MYSQLI_ASSOC))
                 {
				   $id=$defrowper['client_id'];
				   $status=$defrowper['status'];
				   $fiche=$defrowper['fiche'];
				   if($fiche==0)
				     $msg='<strong>(<font color="red">  Pas de fiche)</font></strong>';
				   else
				   $msg='';
				   
				   $fullname=$defrowper['beneficiary'];
				   $cell=$defrowper['cell'];
				   $sector=$defrowper['sector'];
				   $district=$defrowper['district'];
				   $date=$defrowper['date'];
				   $tel=$defrowper['tel'];
				   $mother=$defrowper['mother'];
				   $father=$defrowper['father'];
				   $insurance=$defrowper['insurance'];
				   $sex=$defrowper['sex'];
				   $age=$defrowper['age'];
				   
				   
				   
				   
				    $i++;
					 
					 
					 if ($i%2==0)
					   echo'<tr bgcolor="#D9FFD9">';
					
					 else
					  echo'<tr>';
				   
				   echo'<td>'.$defrowper['beneficiary'].''.$msg.'</td>';
				   echo'<td><strong>'.$id.'</strong></td>';
				   echo'<td>'.$defrowper['insurance'].'</td>';
				   echo'<td>'.$defrowper['percentage'].'</td>';
				   echo'<td>'.$defrowper['adherent'].'</td>';
				   echo'<td>'.$defrowper['age'].'</td>';
				   echo'<td>'.$defrowper['sex'].'</td>';
				   echo'<td>'.$defrowper['date'].'</td>';
				   
				   
				   
				   if ($status==1)
				   {
				   echo'<form action="details.php" method="post" target="_parent">';
				   echo'<td><input type="hidden" name="code" value="'.$id.'"><input type="text" name="date" size="8" value="'.date('Y-m-d').'"></td>';
				   echo'<td><button class="button" ><span>OK </span></button></td>';
				   echo'</form>';
				   
				   
				   echo'
				   <form action="home.php" method="post" target="_parent">
		            <input type="hidden" name="client_id" value="'.$id.'">
					<input type="hidden" name="date" size="8" value="'.date('Y-m-d').'">
					<input type="hidden" name="mother" value="'.$mother.'">
					<input type="hidden" name="father" value="'.$father.'">
					<input type="hidden" name="fullname" value="'.$fullname.'">
					<input type="hidden" name="cell" value="'.$cell.'">
					<input type="hidden" name="sector" value="'.$sector.'">
					<input type="hidden" name="district" value="'.$district.'">
					<input type="hidden" name="tel" value="'.$tel.'">
					<input type="hidden" name="sex" value="'.$sex.'">
					<input type="hidden" name="age" value="'.$age.'">
					<input type="hidden" name="insurance" value="'.$insurance.'">
		           <td> <button class="button" ><span>Update</span></button></td>
		           </form> ';				   				   
				   }
				   				   				   
				   if ($status==0)
				   {
				   echo'
				   <form action="home.php" method="post" target="_parent">
				    <td><input type="text" name="date" size="8" value="'.date('Y-m-d').'"></td>
		            <input type="hidden" name="client_id" value="'.$id.'">
					<input type="hidden" name="mother" value="'.$mother.'">
					<input type="hidden" name="father" value="'.$father.'">
					<input type="hidden" name="fullname" value="'.$fullname.'">
					<input type="hidden" name="cell" value="'.$cell.'">
					<input type="hidden" name="sector" value="'.$sector.'">
					<input type="hidden" name="district" value="'.$district.'">
					<input type="hidden" name="tel" value="'.$tel.'">
					<input type="hidden" name="sex" value="'.$sex.'">
					<input type="hidden" name="age" value="'.$age.'">
					<input type="hidden" name="insurance" value="'.$insurance.'">
		           <td> <button class="button" ><span>Update</span></button></td>
		           </form>';
				   }				   				   				  
				   echo'</tr>';		   				        						   																  
	             }
		 echo'</table>';
		/*echo'
		<form action="find.php" method="post">
		<input type="hidden" name="client2" value="'.$code.'">
		<button class="button" ><span>Other family members </span></button>
		</form>				
		';	*/	   				 
    ?>