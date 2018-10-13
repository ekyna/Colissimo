<?php

namespace Ekyna\Component\Colissimo\Withdrawal\Response;

use Ekyna\Component\Colissimo\Base;
use Ekyna\Component\Colissimo\Withdrawal\Model\FindPointsResult;

/**
 * Class FindPointsResponse
 * @package Ekyna\Component\Colissimo
 * @author  Etienne Dauvergne <contact@ekyna.com>
 *
 * @property FindPointsResult $return
 */
class FindPointsResponse extends Base\Response\AbstractResponse
{
    /**
     * @inheritDoc
     */
    public static function buildDefinition(Base\Definition\Definition $definition): void
    {
        $definition
            ->addField(new Base\Definition\Model('return', true, FindPointsResult::class));
    }
}
