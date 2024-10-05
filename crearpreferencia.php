<?php

require __DIR__ . '/vendor/autoload.php'; // Cargar el autoload de Composer

use MercadoPago\SDK;
use MercadoPago\Preference;
use MercadoPago\Item;

SDK::setAccessToken("MY_ACCESS_TOKEN");
//Creator: APP_USR-6505342631598109-100418-1a087011d51c40ca4f94efbc8c6ec600-1995621955
$preference = new Preference();

$item = new Item();
$item->title = "Yotalpay";
$item->quantity = 1;
$item->unit_price = 10;
$item->currency_id = "ARS";
$preference->items = array($item);
$preference->marketplace_fee = 1;
$preference->collector_id = "SELLER_COLLECTOR_ID"; //TODO GET FROM CALLBACK.PHP

$preference->back_urls = array(
    "success" => "https://yotalpay.com/exito",
    "failure" => "https://yotalpay.com/fallo",
    "pending" => "https://yotalpay.com/pendiente"
);

$preference->auto_return = "approved"; // Redirigir automáticamente al usuario después de un pago exitoso

$preference->save();

echo json_encode([
    'preference_id' => $preference->id
]);

/*// Enviar la URL del 'init_point' al frontend en formato JSON
echo json_encode([
    'init_point' => $preference->init_point
]);
header("Location: " . $preference->init_point); // Redirigir al usuario al init_point de Mercado Pago*/
exit();

?>
