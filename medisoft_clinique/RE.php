$facture = "SELECT DISTINCT period FROM orders";
        $retvalfac = mysqli_query($link, $facture);
        if(! $retvalfac )
           {
               die('Could not get data: ' . mysqli_error($link));
            }    
          
           
         while($rowfac = mysqli_fetch_array($retvalfac, MYSQLI_ASSOC))
                 {
					 $i++;
				  echo '<td>'.$i.'</>';
				  echo'<td>'.$rowfac['period'].'</>';
				 }