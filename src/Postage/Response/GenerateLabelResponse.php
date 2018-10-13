<?php

namespace Ekyna\Component\Colissimo\Postage\Response;

use Ekyna\Component\Colissimo\Base;
use Ekyna\Component\Colissimo\Postage\Model\LabelResponse;

/**
 * Class GenerateLabelResponse
 * @package Ekyna\Component\Colissimo\Response
 * @author  Etienne Dauvergne <contact@ekyna.com>
 *
 * @property LabelResponse $labelV2Response
 */
class GenerateLabelResponse extends Base\Response\AbstractResponse
{
    /**
     * @inheritDoc
     */
    public static function buildDefinition(Base\Definition\Definition $definition): void
    {
        $definition
            ->addField(new Base\Definition\Model('labelV2Response', true, LabelResponse::class));
    }
}