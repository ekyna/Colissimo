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

$request = new Withdrawal\Request\FindPointRequest();

// Required
$request->id = '995890';
$request->date = new \DateTime('+1 day');

// Optional
$request->weight = 1000; // 1kg
$request->filterRelay = true;
$request->reseau = 'R03';
$request->langue = 'FR';


/* ---------------- RESPONSE ---------------- */

$response = $api->findPoint($request);

if (!$response->isSuccess()) {
    exit("Request failed");
}

$point = $response->return->pointRetraitAcheminement;

echo <<<EOT
Data:
        ID: {$point->identifiant}
   Address: {$point->adresse1}
            {$point->codePostal} {$point->localite} {$point->libellePays}
Coordinate: {$point->coordGeolocalisationLatitude} {$point->coordGeolocalisationLongitude}

EOT;
