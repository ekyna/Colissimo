<?php

namespace Ekyna\Component\Colissimo\Tracking\Request;

use Ekyna\Component\Colissimo\Base;

/**
 * Class TrackRequest
 * @package Ekyna\Component\Colissimo\Tracking\Request
 * @author  Etienne Dauvergne <contact@ekyna.com>
 *
 * @property string $skybillNumber
 */
class TrackRequest extends Base\Request\AbstractCredentialRequest
{
    /**
     * @inheritDoc
     */
    public static function buildDefinition(Base\Definition\Definition $definition): void
    {
        Base\Request\AbstractCredentialRequest::buildDefinition($definition);

        $definition
            ->addField(new Base\Definition\AlphaNumeric('skybillNumber', true, 13));
    }
}
