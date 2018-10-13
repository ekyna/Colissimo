<?php

namespace Ekyna\Component\Colissimo\Postage\Request;

use Ekyna\Component\Colissimo\Base;
use Ekyna\Component\Colissimo\Postage\Model\MailBoxSender;

/**
 * Class GetListMailBoxPickingDatesRequest
 * @package Ekyna\Component\Colissimo
 * @author  Etienne Dauvergne <contact@ekyna.com>
 *
 * @property MailBoxSender $sender
 */
class GetListMailBoxPickingDatesRequest extends AbstractCredentialRequest
{
    /**
     * @inheritDoc
     */
    public static function buildDefinition(Base\Definition\Definition $definition): void
    {
        AbstractCredentialRequest::buildDefinition($definition);

        $definition
            ->addField(new Base\Definition\Model('sender', true, MailBoxSender::class));
    }
}
