<?php
declare (strict_types=1);

namespace Ekyna\Component\Colissimo\Postage\Model;

use Ekyna\Component\Colissimo\Base;
use Ekyna\Component\Colissimo\Postage\Enum\RecommendationLevel;

/**
 * Class Parcel
 * @package Ekyna\Component\Colissimo
 * @author  Etienne Dauvergne <contact@ekyna.com>
 *
 * @property float  $insuranceValue
 * @property string $recommendationLevel
 * @property float  $weight
 * @property bool   $nonMachinable
 * @property bool   $COD
 * @property float  $CODAmount
 * @property bool   $returnReceipt
 * @property string $instructions
 * @property int    $pickupLocationId
 * @property bool   $ftd
 */
class Parcel extends Base\Model\AbstractModel
{
    /**
     * @inheritdoc
     */
    public static function buildDefinition(Base\Definition\Definition $definition): void
    {
        $definition
            // parcelNumber
            // insuranceAmount
            ->addField(new Base\Definition\Amount('insuranceValue', false))
            ->addField(new Base\Definition\Enum('recommendationLevel', false, false, RecommendationLevel::class))
            ->addField(new Base\Definition\Decimal('weight', true, 10, 2))
            ->addField(new Base\Definition\Boolean('nonMachinable', false))
            ->addField(new Base\Definition\Boolean('COD', false))
            ->addField(new Base\Definition\Amount('CODAmount', false))// TODO Or Decimal ?
            ->addField(new Base\Definition\Boolean('returnReceipt', false))
            ->addField(new Base\Definition\AlphaNumeric('instructions', false, 35))
            ->addField(new Base\Definition\Numeric('pickupLocationId', false, 6))
            ->addField(new Base\Definition\Boolean('ftd', false));
    }

    /**
     * @inheritdoc
     */
    public function validate(string $prefix = null): void
    {
        parent::validate($prefix);

        // TODO See pages 22/23
    }
}
