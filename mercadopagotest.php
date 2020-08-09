<?php
  // SDK de Mercado Pago
  require __DIR__ .  '/vendor/autoload.php';

  // Agrega credenciales
  MercadoPago\SDK::setAccessToken('TEST-6740513320495009-080915-9b9a9f55396029c1e5e4956af3103c4d-83561899');

  // Crea un objeto de preferencia
  $preference = new MercadoPago\Preference();

  // Crea un ítem en la preferencia
  $item = new MercadoPago\Item();
  $item->title = 'CAM-SFE-ROJA-S';
  $item->description = "Camiseta Santa Fe Roja Talla S";
  $item->quantity = 1;
  $item->unit_price = 10000;
  $preference->items = array($item);
  $preference->save();

  //datos del comprador
  // ...
  $payer = new MercadoPago\Payer();
  $payer->name = "Charles";
  $payer->surname = "Luevano";
  $payer->email = "charles@hotmail.com";
  $payer->date_created = "2018-06-02T12:58:41.425-04:00";
  $payer->phone = array(
    "area_code" => "",
    "number" => "949 128 866"
  );
  
  $payer->identification = array(
    "type" => "DNI",
    "number" => "12345678"
  );
  
  $payer->address = array(
    "street_name" => "Cuesta Miguel Armendáriz",
    "street_number" => 1004,
    "zip_code" => "11020"
  );
?>
<!DOCTYPE html>
<html>
<head>
  <title>TEST MERCADOPAGO</title>
</head>
<body>
<form action="/procesar-pago" method="POST">
  <script
   src="https://www.mercadopago.com.co/integrations/v1/web-payment-checkout.js"
   data-preference-id="<?php echo $preference->id; ?>">
  </script>
</form>
</body>
</html>