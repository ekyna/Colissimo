<?php

namespace Ekyna\Component\Colissimo\Withdrawal\Request;

use Ekyna\Component\Colissimo\Base;

/**
 * Class FindPointsRequest
 * @package Ekyna\Component\Colissimo
 * @author  Etienne Dauvergne <contact@ekyna.com>
 *
 * @property string    $address
 * @property string    $zipCode
 * @property string    $city
 * @property string    $countryCode
 * @property int       $weight
 * @property \DateTime $shippingDate
 * @property boolean    $filterRelay
 * @property string    $requestId
 * @property string    $lang
 * @property bool      $optionInter
 */
class FindPointsRequest extends Base\Request\AbstractCredentialRequest
{
    /**
     * @inheritDoc
     */
    public static function buildDefinition(Base\Definition\Definition $definition): void
    {
        Base\Request\AbstractCredentialRequest::buildDefinition($definition);

        $definition
            ->addField(new Base\Definition\AlphaNumeric('address', false, 200))
            ->addField(new Base\Definition\AlphaNumeric('zipCode', true, 5))
            ->addField(new Base\Definition\AlphaNumeric('city', true, 50))
            ->addField(new Base\Definition\AlphaNumeric('countryCode', true, 2))
            ->addField(new Base\Definition\Numeric('weight', false, 5))// g
            ->addField(new Base\Definition\Date('shippingDate', true, 'd/m/Y'))
            ->addField(new Base\Definition\Boolean('filterRelay', false))
            ->addField(new Base\Definition\AlphaNumeric('requestId', false, 64))
            ->addField(new Base\Definition\AlphaNumeric('lang', false, 2))
            ->addField(new Base\Definition\Boolean('optionInter', false));
    }
}
