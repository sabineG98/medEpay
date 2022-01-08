<?php
require ('config.php');

if(isset($_POST['stripeToken'])){

    \Stripe\Stripe::setVerifySslCerts(false);
}

echo '<pre>';
$token=$_POST['stripeToken'];

$data=\Stripe\Charge::create (array(

    "amount" => 5000,
    "currency"=>"Rwf",
    //"name"=>"GISAGARA Sabine",
 //"data-description"=>"medEpay bill",
 "source"=>$token,

));

echo "<pre>";
print_r($data);

?>



