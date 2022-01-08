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



<strong>RADIANT
       
       <img style="position: absolute; left: 620px; top: 3px; width: 143px; height: 85px;" src="img/radiant.jpg" width="199" height="131"></strong>

<br><br>
<table>
  
  <tr>
   <td align="right">N<sup><u>o</u></sup>. DE POLICE</td><td><input type="text" size="15" placeholder="" name="police" /></td>
   </tr>
   <tr>
   
   <tr>
   <td align="right">N<sup><u>o</u></sup>. DE FEUILLE</td><td><input type="text" size="15" placeholder="" name="matricule" /></td>
   </tr>
   
    <tr>
   <td align="right">N<sup><u>o</u></sup>. DE CARTE D'ASSURE</td><td><input type="text" size="15" placeholder="" name="card" /></td>
   </tr>

   <!--<tr>      
   <td align="right">NOM DE L'ADHERENT</td><td><input type="text" size="40" placeholder="" name="adherent" /></td>
   </tr>
   
   <tr>
   <td align="right">LIEU D'AFFECTATION</td><td><input type="text" size="40" placeholder="" name="departement" /></td>
   </tr>-->
   <tr>
   <td align="right">BENEFICIAIRE</td><td><input type="text" size="40" placeholder="" name="beneficiary" value='<?php echo $beneficiary ?>' /> </td>
   </tr>
   <tr>
   
   
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
