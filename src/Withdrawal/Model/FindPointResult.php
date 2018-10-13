<?php

namespace Ekyna\Component\Colissimo\Withdrawal\Model;

use Ekyna\Component\Colissimo\Base;

/**
 * Class FindPointResult
 * @package Ekyna\Component\Colissimo
 * @author  Etienne Dauvergne <contact@ekyna.com>
 *
 * @property PointRetraitAcheminement $pointRetraitAcheminement
 */
class FindPointResult extends Base\Model\AbstractModel
{
    /**
     * @inheritDoc
     */
    public static function buildDefinition(Base\Definition\Definition $definition): void
    {
        $definition
            ->addField(new Base\Definition\Model('pointRetraitAcheminement', true, PointRetraitAcheminement::class));
    }
}
