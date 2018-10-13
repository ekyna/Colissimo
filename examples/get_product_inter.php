<?php

require __DIR__ . '/../vendor/autoload.php';

use Ekyna\Component\Colissimo\Api;
use Ekyna\Component\Colissimo\Postage;


/* ---------------- API ---------------- */

require __DIR__ . '/config.php';

$api = new Api([
    'login'    => $contractNumber,
    'password' => $password,
    'cache'    => $cache,
    'debug'    => $debug,
]);


/* ---------------- REQUEST ---------------- */

$request = new Postage\Request\GetProductInterRequest();

$request->productCode = Postage\Enum\ProductCode::COLI;
$request->countryCode = 'DZ';
$request->zipCode = '2000';


/* ---------------- RESPONSE ---------------- */

$response = $api->getProductInter($request);

foreach ($response->getMessages() as $message) {
    echo "Message [{$message->getId()}] ({$message->getType()}): " . $message->getContent() . "\n";
}

if (!$response->isSuccess()) {
    exit("Request failed");
}

echo <<<EOT
Data:
- Product: {$response->product}
- Return type choice: {$response->returnTypeChoice}

EOT;

foreach ($response->getAttachments() as $attachment) {
    echo "Attachment '" . $attachment->getType() . "' : " . strlen($attachment->getContent()) . "\n";
}
