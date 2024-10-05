# mp-checkoutpro-marketplace

1: 
FRONTEND: pago_mercadopago.html:
Este script contiene mi PUBLIC_KEY, renderiza el botón de pago y llama al crearpreferencia.php (backend).

2:
BACKEND: crearpreferencia.php:
Este script contiene mi ACCESS_TOKEN, crea la preferencia de pago (junto al marketplace_fee y collector_id) y retorna la preferencia.

3:
LOGIN: auth_vendor.php
Este script redirige al usuario al login de mercadopago para autorizar a la app y obtener el access token.

4:
callback.php:
Este script obtiene el codigo del login y lo intercambia por el access token y el collector id del vendedor logueado.
