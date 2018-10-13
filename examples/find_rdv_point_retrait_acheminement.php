<?php

require __DIR__.'/../vendor/autoload.php';

use Ekyna\Component\Colissimo\Api;
use Ekyna\Component\Colissimo\Withdrawal;

/* ---------------- API ---------------- */

require __DIR__ . '/config.php';

$api = new Api([
    'login'    => $contractNumber,
    'password' => $password,
    'cache'    => $cache,
    'debug'    => $debug,
]);


/* ---------------- REQUEST ---------------- */

$request = new Withdrawal\Request\FindPointsRequest();

// Required
$request->zipCode = '35230';
$request->city = 'Noyal-Châtillon-sur-seiche';
$request->countryCode = 'FR';
$request->shippingDate = new \DateTime('+1 day');

// Optional
$request->address = 'rue de rennes';
$request->weight = 1000; // 1kg
$request->filterRelay = true;
$request->requestId = bin2hex(random_bytes(6));
$request->lang = 'FR';
$request->optionInter = true;


/* ---------------- RESPONSE ---------------- */

$response = $api->findPoints($request);

if (!$response->isSuccess()) {
    exit("Request failed");
}

echo <<<EOT
Data:
 Response quality: {$response->return->qualiteReponse}
 Request ID: {$response->return->wsRequestId}
 RDV: {$response->return->rdv}

Points list:

EOT;

foreach ($response->return->listePointRetraitAcheminement as $point) {

    echo <<<EOT
    ---------------------------------------------------
            ID: {$point->identifiant}
       Address: {$point->adresse1}
                {$point->codePostal} {$point->localite} {$point->libellePays}
    Coordinate: {$point->coordGeolocalisationLatitude} {$point->coordGeolocalisationLongitude}

EOT;
}
