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

$request = new Postage\Request\PlanPickupRequest();

$request->parcelNumber = '6A15786594858';
$request->mailBoxPickingDate = new \DateTime('+1 day');

//$request->sender->companyName = 'company';
$request->sender->lastName = 'lastName';
$request->sender->firstName = 'firstName';
//$request->sender->line0 = '';
//$request->sender->line1 = '';
$request->sender->line2 = 'main address';
//$request->sender->line3 = '';
$request->sender->zipCode = '75007';
$request->sender->city = 'Paris';
$request->sender->countryCode = 'FR';
$request->sender->email = 'sender@test.com';
//$request->sender->phoneNumber = '0123456789';


/* ---------------- RESPONSE ---------------- */

$response = $api->planPickup($request);

foreach ($response->getMessages() as $message) {
    echo "Message [{$message->getId()}] ({$message->getType()}): " . $message->getContent() . "\n";
}

if (!$response->isSuccess()) {
    exit("Request failed");
}

foreach ($response->getAttachments() as $attachment) {
    echo "Attachment '" . $attachment->getType() . "' : " . strlen($attachment->getContent()) . "\n";
}
