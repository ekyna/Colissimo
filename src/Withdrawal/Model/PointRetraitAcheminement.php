<?php

namespace Ekyna\Component\Colissimo\Withdrawal\Model;

use Ekyna\Component\Colissimo\Base;

/**
 * Class PointRetraitAcheminement
 * @package Ekyna\Component\Colissimo
 * @author  Etienne Dauvergne <contact@ekyna.com>
 *
 * @property bool     $accesPersonneMobiliteReduite
 * @property string   $adresse1
 * @property string   $adresse2
 * @property string   $adresse3
 * @property string   $codePostal
 * @property bool     $congesPartiel
 * @property bool     $congesTotal
 * @property string   $coordGeolocalisationLatitude
 * @property string   $coordGeolocalisationLongitude
 * @property int      $distanceEnMetre
 * @property string   $horairesOuvertureLundi
 * @property string   $horairesOuvertureMardi
 * @property string   $horairesOuvertureMercredi
 * @property string   $horairesOuvertureJeudi
 * @property string   $horairesOuvertureVendredi
 * @property string   $horairesOuvertureSamedi
 * @property string   $horairesOuvertureDimanche
 * @property string   $identifiant
 * @property string   $indiceDeLocalisation
 * @property Conges[] $listeConges
 * @property string   $localite
 * @property string   $nom
 * @property string   $periodeActiviteHoraireDeb
 * @property string   $periodeActiviteHoraireFin
 * @property int      $poidsMaxi
 * @property string   $typeDePoint
 * @property string   $codePays
 * @property string   $langue
 * @property string   $libellePays
 * @property bool     $loanOfHandlingTool
 * @property bool     $parking
 * @property string   $reseau
 * @property string   $distributionSort
 * @property string   $lotAcheminement
 * @property string   $versionPlanTri
 */
class PointRetraitAcheminement extends Base\Model\AbstractModel
{
    /**
     * @inheritDoc
     */
    public static function buildDefinition(Base\Definition\Definition $definition): void
    {
        $definition
            ->addField(new Base\Definition\Boolean('accesPersonneMobiliteReduite', true))
            ->addField(new Base\Definition\AlphaNumeric('adresse1', true, 38))
            ->addField(new Base\Definition\AlphaNumeric('adresse2', false, 38))
            ->addField(new Base\Definition\AlphaNumeric('adresse3', false, 38))
            ->addField(new Base\Definition\AlphaNumeric('codePostal', true, 5))
            ->addField(new Base\Definition\Boolean('congesPartiel', true))
            ->addField(new Base\Definition\Boolean('congesTotal', true))
            ->addField(new Base\Definition\AlphaNumeric('coordGeolocalisationLatitude', true, 10))
            ->addField(new Base\Definition\AlphaNumeric('coordGeolocalisationLongitude', true, 10))
            ->addField(new Base\Definition\Numeric('distanceEnMetre', true, 5))
            ->addField(new Base\Definition\AlphaNumeric('horairesOuvertureLundi', true, 23))
            ->addField(new Base\Definition\AlphaNumeric('horairesOuvertureMardi', true, 23))
            ->addField(new Base\Definition\AlphaNumeric('horairesOuvertureMercredi', true, 23))
            ->addField(new Base\Definition\AlphaNumeric('horairesOuvertureJeudi', true, 23))
            ->addField(new Base\Definition\AlphaNumeric('horairesOuvertureVendredi', true, 23))
            ->addField(new Base\Definition\AlphaNumeric('horairesOuvertureSamedi', true, 23))
            ->addField(new Base\Definition\AlphaNumeric('horairesOuvertureDimanche', true, 23))
            ->addField(new Base\Definition\AlphaNumeric('identifiant', true, 6))
            ->addField(new Base\Definition\AlphaNumeric('indiceDeLocalisation', true, 70))
            ->addField(new Base\Definition\ArrayOfModel('listeConges', true, Conges::class))
            ->addField(new Base\Definition\AlphaNumeric('localite', true, 32))
            ->addField(new Base\Definition\AlphaNumeric('nom', true, 50))
            ->addField(new Base\Definition\AlphaNumeric('periodeActiviteHoraireDeb', true, 5))
            ->addField(new Base\Definition\AlphaNumeric('periodeActiviteHoraireFin', true, 5))
            ->addField(new Base\Definition\Numeric('poidsMaxi', true, 2))// Kg
            ->addField(new Base\Definition\AlphaNumeric('typeDePoint', true, 3))
            ->addField(new Base\Definition\AlphaNumeric('codePays', true, 2))
            ->addField(new Base\Definition\AlphaNumeric('langue', true, 2))
            ->addField(new Base\Definition\AlphaNumeric('libellePays', true, 64))
            ->addField(new Base\Definition\Boolean('loanOfHandlingTool', true))
            ->addField(new Base\Definition\Boolean('parking', true))
            ->addField(new Base\Definition\AlphaNumeric('reseau', true, 3))
            ->addField(new Base\Definition\AlphaNumeric('distributionSort', true, 10))
            ->addField(new Base\Definition\AlphaNumeric('lotAcheminement', true, 10))
            ->addField(new Base\Definition\AlphaNumeric('versionPlanTri', true, 2));
    }
}
