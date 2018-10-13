<?php

namespace Ekyna\Component\Colissimo\Withdrawal\Request;

use Ekyna\Component\Colissimo\Base;

/**
 * Class FindPointRequest
 * @package Ekyna\Component\Colissimo
 * @author  Etienne Dauvergne <contact@ekyna.com>
 *
 * @property int       $id
 * @property \DateTime $date
 * @property int       $weight
 * @property boolean   $filterRelay
 * @property string    $reseau
 * @property string    $langue
 */
class FindPointRequest extends Base\Request\AbstractCredentialRequest
{
    /**
     * @inheritDoc
     */
    public static function buildDefinition(Base\Definition\Definition $definition): void
    {
        Base\Request\AbstractCredentialRequest::buildDefinition($definition);

        $definition
            ->addField(new Base\Definition\Numeric('id', true, 6))
            ->addField(new Base\Definition\Date('date', true, 'd/m/Y'))
            ->addField(new Base\Definition\Numeric('weight', false, 5))// g
            ->addField(new Base\Definition\Boolean('filterRelay', false))
            ->addField(new Base\Definition\AlphaNumeric('reseau', false, 3))
            ->addField(new Base\Definition\AlphaNumeric('lang', false, 2));
    }
}
