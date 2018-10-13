<?php

require __DIR__ . '/../vendor/autoload.php';

use Ekyna\Component\Colissimo\Api;
use Ekyna\Component\Colissimo\Tracking;


/* ---------------- API ---------------- */

require __DIR__ . '/config.php';

$api = new Api([
    'login'    => $contractNumber,
    'password' => $password,
    'cache'    => $cache,
    'debug'    => $debug,
]);


/* ---------------- REQUEST ---------------- */

$request = new Tracking\Request\TrackRequest();

$request->skybillNumber = '123456';


/* ---------------- RESPONSE ---------------- */

$response = $api->track($request);

foreach ($response->getMessages() as $message) {
    echo "Message [{$message->getId()}] ({$message->getType()}): " . $message->getContent() . "\n";
}

if (!$response->isSuccess()) {
    exit("Request failed");
}

echo <<<EOT
Data:
- Event code: {$response->eventCode}
- Event date: {$response->eventDate->format('Y-m-d H:i')}
- Event libelle: {$response->eventLibelle}
- Event site: {$response->eventSite}
- Recipient site: {$response->recipientCity}
- Recipient country code: {$response->recipientCountryCode}
- Recipient zip code: {$response->recipientZipCode}
- Skybill number: {$response->skybillNumber}

EOT;

foreach ($response->getAttachments() as $attachment) {
    echo "Attachment '" . $attachment->getType() . "' : " . strlen($attachment->getContent()) . "\n";
}
