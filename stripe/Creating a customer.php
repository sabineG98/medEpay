Creating a customer
<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.stripe.com//v1/customers',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => 'address%5Bcity%5D=Kigali&address%5Bcountry%5D=Rwanda&address%5Bline1%5D=KG%20666%20St&balance=500&name=Gisagara&phone=0787982402',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/x-www-form-urlencoded',
    'Authorization: Bearer sk_test_51KBzxXHR1XVDkcETd9dpbkV8xEyvRQmFPShqghPWRuNi2Y0zXFaWGL0GZFNEY5Cm9ua8ibow7kcjGRnpjpIprkRV00lLiD3eGN'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
