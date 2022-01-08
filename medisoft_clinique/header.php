<?php
    $med1 = "SELECT *  FROM address ";
    $retvalmed1 = mysqli_query($link,$med1);
    if(! $retvalmed1 )
    { die('Could not get data: ' . mysqli_error($link));  }                         
    while($rowmed1 = mysqli_fetch_array($retvalmed1, MYSQLI_ASSOC))
    {
        $ds=$rowmed1['district'];
        $hc=$rowmed1['hc'];
    }
?>
REPUBLIC OF RWANDA <br />
<img src="republic.PNG" /><br />
MINISTRY OF HEALTH<br />
<?php echo strtoupper($ds); ?>  DISTRICT<br />
<?php echo strtoupper($hc); ?>  HC<br />