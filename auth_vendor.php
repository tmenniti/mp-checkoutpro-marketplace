<?php

$client_id = "MY_CLIENT_ID";
$client_secret = "MY_CLIENT_SECRET";

$auth_url = "https://auth.mercadopago.com.ar/authorization?response_type=code&client_id={$client_id}&redirect_uri=https://localhost:8080/checkoutpro/callback.php";

header("Location: $auth_url");
exit();

?>
