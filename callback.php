<?php

if (isset($_GET['code'])) {
    $authorization_code = $_GET['code'];

    $url = "https://api.mercadopago.com/oauth/token";
    $data = [
        'grant_type' => 'authorization_code',
        'client_id' => "MY_CLIENT_ID",
        'client_secret' => "MY_CLIENT_SECRET",
        'code' => $authorization_code,
        'redirect_uri' => "http://localhost:8080/checkoutpro/callback.php"
    ];

    $options = [
        'http' => [
            'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data)
        ]
    ];
    
    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    $response = json_decode($result);

    // Guardar el access_token en bd
    $seller_access_token = $response->access_token;
    $seller_user_id = $response->user_id;

    echo "
    <script>
        console.log('Collector ID (Seller User ID): {$seller_user_id}');
    </script>";
    //header("Location: http://localhost:8080/checkoutpro/crearpreferencia.php?collector_id=$seller_user_id");
    exit();
}

?>
