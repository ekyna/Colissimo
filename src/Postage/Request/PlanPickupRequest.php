<?php

namespace Ekyna\Component\Colissimo\Postage\Request;

use Ekyna\Component\Colissimo\Base;
use Ekyna\Component\Colissimo\Postage\Model\PickupSender;

/**
 * Class PlanPickupRequest
 * @package Ekyna\Component\Colissimo
 * @author  Etienne Dauvergne <contact@ekyna.com>
 *
 * @property string       $parcelNumber
 * @property \DateTime    $mailBoxPickingDate
 * @property PickupSender $sender
 */
class PlanPickupRequest extends AbstractCredentialRequest
{
    /**
     * @inheritDoc
     */
    public static function buildDefinition(Base\Definition\Definition $definition): void
    {
        AbstractCredentialRequest::buildDefinition($definition);

        $definition
            ->addField(new Base\Definition\AlphaNumeric('parcelNumber', true, 13))
            ->addField(new Base\Definition\Date('mailBoxPickingDate', true))
            ->addField(new Base\Definition\Model('sender', true, PickupSender::class));
    }
}
