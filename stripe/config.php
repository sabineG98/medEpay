<?php
require ('stripe-php/init.php');

$Publishablekey= 'pk_test_51KBzxXHR1XVDkcETOrSP6qWaNLmdo0zVEaOewCOUvSw05lNBKVJZGMMHmu3nI6zf2xaUpWp7l5g537eRjICoxWOv00NsKOshw3';

$Secretkey='sk_test_51KBzxXHR1XVDkcETd9dpbkV8xEyvRQmFPShqghPWRuNi2Y0zXFaWGL0GZFNEY5Cm9ua8ibow7kcjGRnpjpIprkRV00lLiD3eGN';

\stripe\stripe:: setApiKey($Secretkey);

?>