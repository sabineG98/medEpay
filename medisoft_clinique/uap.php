

<form  method="POST" action="details.php">


<input type="hidden" name="date" value="<?php echo $date ?>" />
<input type="hidden" name="beneficiary" value="<?php echo $beneficiary ?>" />
<input type="hidden" name="d" value="<?php echo $d  ?>" />
<input type="hidden" name="m" value="<?php echo $m  ?>" />
<input type="hidden" name="age" value="<?php echo $age  ?>" />
<input type="hidden" name="sex" value="<?php echo $sex ?>" />
<input type="hidden" name="tel" value="<?php echo $tel  ?>" />
<input type="hidden" name="mother" value="<?php echo $mother  ?>" />
<input type="hidden" name="father" value="<?php echo $father  ?>" />
<input type="hidden" name="nationality" value="<?php echo $nationality  ?>" />
<input type="hidden" name="district" value="<?php echo $district  ?>" />
<input type="hidden" name="sector" value="<?php echo $sector  ?>" />
<input type="hidden" name="cell" value="<?php echo $cell  ?>" />
<input type="hidden" name="insurance" value="<?php echo $insurance  ?>" />
<input type="hidden" name="fiche" value="<?php echo $fiche  ?>" />
<input type="hidden" name="client_id" value="<?php echo $client_id  ?>" />


<strong>UAP INSURANCE RWANDA LTD<br>
       
       
       <img style="position: absolute; left: 653px; top: 0px; width: 113px; height: 96px;" src="img/uap.PNG" width="199" height="131"></strong>
<br><br>
<table>
   
   <tr>
   
   <tr>
   <td>Card N<sup><u>o</u></sup></td><td><input type="text" size="15" placeholder="" name="card" /></td>
   </tr>
   <tr>
   <td>Patient's name</td><td><input type="text" size="40" placeholder="" name="beneficiary"  value='<?php echo $beneficiary ?>' /></td>
   </tr>
   
   
   <tr>
   <td>Gourp or Employer's Name</td><td><input type="text" size="40" placeholder="" name="employer"  /></td>
   </tr>
   
  
 <tr>
   <td align="right">POURCENTAGE</td><td>
   <select style="font-size:20px;" name="pourcentage">
   <option></option>
   <option value="0" >0%</option>
   <option value="5" >5%</option>
   <option value="10">10</option>
   <option selected='selected' value="15">15%</option>
   <option value="20">20%</option>
   <option value="25">25%</option>

   
   </select>
   
   
   </td>
   </tr>

<tr>
  <td></td>
  <td>
  
  
  <button class="button" ><span>SUIVANT</span></button>
  </td>
  </tr>
</table>


</form>
