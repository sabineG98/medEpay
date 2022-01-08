<?php
require ('config.php');



?>

<form action="submit.php" method="POST">

<script

    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="<?php echo $Publishablekey ?>"
    data-amount="500"
   data-name="GISAGARA Sabine"
    data-description="medEpay bill"
   data-image=""
    data-currency="Rwf"
    >

    </script>


</form>