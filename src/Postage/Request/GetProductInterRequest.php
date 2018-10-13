<?php
declare (strict_types=1);

namespace Ekyna\Component\Colissimo\Postage\Request;

use Ekyna\Component\Colissimo\Base;

/**
 * Class GetProductInter
 * @package Ekyna\Component\Colissimo
 * @author  Etienne Dauvergne <contact@ekyna.com>
 *
 * @property string $productCode
 * @property bool   $insurance
 * @property bool   $nonMachinable
 * @property bool   $returnReceipt
 * @property string $countryCode
 * @property string $zipCode
 */
class GetProductInterRequest extends AbstractCredentialRequest
{
    /**
     * @inheritdoc
     */
    public static function buildDefinition(Base\Definition\Definition $definition): void
    {
        AbstractCredentialRequest::buildDefinition($definition);

        $definition
            ->addField(new Base\Definition\AlphaNumeric('productCode', true, 6))
            ->addField(new Base\Definition\Boolean('insurance', false))
            ->addField(new Base\Definition\Boolean('nonMachinable', false))
            ->addField(new Base\Definition\Boolean('returnReceipt', false))
            ->addField(new Base\Definition\AlphaNumeric('countryCode', false, 2))
            ->addField(new Base\Definition\AlphaNumeric('zipCode', true, 10));
    }

    /**
     * @inheritDoc
     */
    public function validate(string $prefix = null): void
    {
        parent::validate($prefix);

        // TODO countryCode / zipCode ?
    }
}
