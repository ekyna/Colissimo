<?php

namespace Ekyna\Component\Colissimo\Withdrawal\Response;

use Ekyna\Component\Colissimo\Base;
use Ekyna\Component\Colissimo\Withdrawal\Model\FindPointResult;

/**
 * Class FindPointResponse
 * @package Ekyna\Component\Colissimo
 * @author  Etienne Dauvergne <contact@ekyna.com>
 *
 * @property FindPointResult $return
 */
class FindPointResponse extends Base\Response\AbstractResponse
{
    /**
     * @inheritDoc
     */
    public static function buildDefinition(Base\Definition\Definition $definition): void
    {
        $definition
            ->addField(new Base\Definition\Model('return', true, FindPointResult::class));
    }
}
