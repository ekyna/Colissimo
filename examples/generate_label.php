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

$request = new Postage\Request\GenerateLabelRequest();

$request->outputFormat->outputPrintingType = Postage\Enum\OutputPrintingType::PDF_10x15_300dpi;

$request->letter->service->productCode = Postage\Enum\ProductCode::DOM;
$request->letter->service->depositDate = new \DateTime('now');

$request->letter->parcel->weight = 3;

//$request->letter->sender->senderParcelRef = 'senderParcelRef';
$request->letter->sender->address->companyName = 'companyName';
$request->letter->sender->address->line2 = 'main address';
$request->letter->sender->address->countryCode = 'FR';
$request->letter->sender->address->city = 'Paris';
$request->letter->sender->address->zipCode = '75007';

$request->letter->addressee->address->lastName = 'lastName';
$request->letter->addressee->address->firstName = 'firstName';
$request->letter->addressee->address->line2 = 'main address';
$request->letter->addressee->address->countryCode = 'FR';
$request->letter->addressee->address->city = 'Paris';
$request->letter->addressee->address->zipCode = '75017';


/* ---------------- RESPONSE ---------------- */

$response = $api->generateLabel($request);

foreach ($response->getMessages() as $message) {
    echo "Message [{$message->getId()}] ({$message->getType()}): " . $message->getContent() . "\n";
}

if (!$response->isSuccess()) {
    exit("Request failed");
}

echo <<<EOT
Data:
Parcel number: {$response->labelV2Response->parcelNumber}
Parcel number partner: {$response->labelV2Response->parcelNumberPartner}
Pdf Url: {$response->labelV2Response->pdfUrl}

EOT;

foreach ($response->getAttachments() as $attachment) {
    echo "Attachment '" . $attachment->getType() . "' : " . strlen($attachment->getContent()) . "\n";
}
