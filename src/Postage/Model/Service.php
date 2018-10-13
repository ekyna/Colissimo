<?php
declare (strict_types=1);

namespace Ekyna\Component\Colissimo\Postage\Model;

use Ekyna\Component\Colissimo\Base;
use Ekyna\Component\Colissimo\Postage;

/**
 * Class Service
 * @package Ekyna\Component\Colissimo
 * @author  Etienne Dauvergne <contact@ekyna.com>
 *
 * @property string    $productCode
 * @property \DateTime $depositDate
 * @property bool      $mailBoxPicking
 * @property \DateTime $mailBoxPickingDate
 * @property float     $transportationAmount
 * @property float     $totalAmount
 * @property string    $orderNumber
 * @property string    $commercialName
 * @property string    $returnTypeChoice
 */
class Service extends Base\Model\AbstractModel
{
    /**
     * @inheritdoc
     */
    public static function buildDefinition(Base\Definition\Definition $definition): void
    {
        $definition
            ->addField(new Base\Definition\Enum('productCode', true, false, Postage\Enum\ProductCode::class))
            ->addField(new Base\Definition\Date('depositDate', true))
            ->addField(new Base\Definition\Boolean('mailBoxPicking', false))
            ->addField(new Base\Definition\Date('mailBoxPickingDate', false))
            ->addField(new Base\Definition\Amount('transportationAmount', false))
            ->addField(new Base\Definition\Amount('totalAmount', false))
            ->addField(new Base\Definition\AlphaNumeric('orderNumber', false, 30))
            ->addField(new Base\Definition\AlphaNumeric('commercialName', false, 30))
            ->addField(new Base\Definition\Enum('returnTypeChoice', false, false, Postage\Enum\ReturnTypeChoice::class));
    }

    /**
     * @inheritdoc
     */
    public function validate(string $prefix = null): void
    {
        parent::validate($prefix);

        // TODO See page 21/22
    }
}
