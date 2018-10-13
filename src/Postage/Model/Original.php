<?php
declare (strict_types=1);

namespace Ekyna\Component\Colissimo\Postage\Model;

use Ekyna\Component\Colissimo\Base;

/**
 * Class Original
 * @package Ekyna\Component\Colissimo
 * @author  Etienne Dauvergne <contact@ekyna.com>
 *
 * @property string    $originalIdent
 * @property string    $originalInvoiceNumber
 * @property \DateTime $originalInvoiceDate
 * @property string    $originalParcelNumber
 */
class Original extends Base\Model\AbstractModel
{
    /**
     * @inheritdoc
     */
    public static function buildDefinition(Base\Definition\Definition $definition): void
    {
        $definition
            ->addField(new Base\Definition\AlphaNumeric('originalIdent', false, 1))
            ->addField(new Base\Definition\AlphaNumeric('originalInvoiceNumber', false, 35))
            ->addField(new Base\Definition\Date('originalInvoiceDate', false))
            ->addField(new Base\Definition\AlphaNumeric('originalParcelNumber', false, 35));
    }
}
