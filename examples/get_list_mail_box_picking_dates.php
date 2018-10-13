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

$request = new Postage\Request\GetListMailBoxPickingDatesRequest();

//$request->letter->sender->senderParcelRef = 'senderParcelRef';
$request->sender->companyName = 'companyName';
$request->sender->line2 = 'main address';
$request->sender->countryCode = 'FR';
$request->sender->city = 'Paris';
$request->sender->zipCode = '75007';


/* ---------------- RESPONSE ---------------- */

$response = $api->getListMailBoxPickingDates($request);

foreach ($response->getMessages() as $message) {
    echo "Message [{$message->getId()}] ({$message->getType()}): " . $message->getContent() . "\n";
}

if (!$response->isSuccess()) {
    exit("Request failed");
}

$dates = implode(', ', array_map(function(\DateTime $date) {
    return $date->format('Y-m-d');
}, $response->mailBoxPickingDates));

echo <<<EOT
Data:
- Picking max hour: {$response->mailBoxPickingDateMaxHour}
- Picking date: {$dates}
- Validity time: {$response->validityTime}

EOT;

foreach ($response->getAttachments() as $attachment) {
    echo "Attachment '" . $attachment->getType() . "' : " . strlen($attachment->getContent()) . "\n";
}
