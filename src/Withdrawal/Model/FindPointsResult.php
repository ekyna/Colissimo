<?php

namespace Ekyna\Component\Colissimo\Withdrawal\Model;

use Ekyna\Component\Colissimo\Base;

/**
 * Class FindPointsResult
 * @package Ekyna\Component\Colissimo
 * @author  Etienne Dauvergne <contact@ekyna.com>
 *
 * @property PointRetraitAcheminement[] $listePointRetraitAcheminement
 * @property int                        $qualiteReponse
 * @property string                     $wsRequestId
 * @property bool                       $rdv
 */
class FindPointsResult extends Base\Model\AbstractModel
{
    /**
     * @inheritDoc
     */
    public static function buildDefinition(Base\Definition\Definition $definition): void
    {
        $definition
            ->addField(new Base\Definition\ArrayOfModel('listePointRetraitAcheminement', true, PointRetraitAcheminement::class))
            ->addField(new Base\Definition\Numeric('qualiteReponse', true, 1))
            ->addField(new Base\Definition\AlphaNumeric('wsRequestId', true, 64))
            ->addField(new Base\Definition\Boolean('rdv', true));
    }
}
