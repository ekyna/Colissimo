<?php

namespace Ekyna\Component\Colissimo\Postage\Response;

use Ekyna\Component\Colissimo\Base\Definition;
use Ekyna\Component\Colissimo\Base\Response\AbstractResponse;
use Ekyna\Component\Colissimo\Postage\Enum;

/**
 * Class GetProductInterResponse
 * @package Ekyna\Component\Colissimo\Postage\Response
 * @author  Etienne Dauvergne <contact@ekyna.com>
 *
 * @property string $product
 * @property string $returnTypeChoice
 */
class GetProductInterResponse extends AbstractResponse
{
    /**
     * @inheritDoc
     */
    public static function buildDefinition(Definition\Definition $definition): void
    {
        $definition
            ->addField(new Definition\Enum('product', true, true, Enum\ProductCode::class))
            ->addField(new Definition\Enum('returnTypeChoice', true, true, Enum\ReturnTypeChoice::class));
    }
}
