<?php

namespace Ekyna\Component\Colissimo\Postage\Response;

use Ekyna\Component\Colissimo\Base;

/**
 * Class GetListMailBoxPickingDatesResponse
 * @package Ekyna\Component\Colissimo
 * @author  Etienne Dauvergne <contact@ekyna.com>
 *
 * @property string      $mailBoxPickingDateMaxHour
 * @property \DateTime[] $mailBoxPickingDates
 * @property string      $validityTime
 */
class GetListMailBoxPickingDatesResponse extends Base\Response\AbstractResponse
{
    /**
     * @inheritDoc
     */
    public static function buildDefinition(Base\Definition\Definition $definition): void
    {
        $definition
            ->addField(new Base\Definition\AlphaNumeric('mailBoxPickingDateMaxHour', false, 5))
            ->addField(new Base\Definition\ArrayOfField('mailBoxPickingDates', true, new Base\Definition\Timestamp('', false)))
            ->addField(new Base\Definition\AlphaNumeric('validityTime', false, 5));
    }
}
