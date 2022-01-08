

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




<strong>NO INSURANCE<br>
</strong>

<br><br>
<table>
   
   <tr>
   <tr>
   <td> Profession </td>
   <td><input type="text" size="20" placeholder="" name="profession" /></td>
   </tr>
 
   <tr>
   <td>Noms du malade</td><td><input type="text" size="40" placeholder="" name="beneficiary"  value='<?php echo $beneficiary ?>' /></td>
   </tr>
   
  
 <tr>
   <td align="right">POURCENTAGE</td><td>
   <select style="font-size:20px;" name="pourcentage">
   
   <option selected='selected' value="100">100%</option>
  

   
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
