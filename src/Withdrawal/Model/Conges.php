<?php

namespace Ekyna\Component\Colissimo\Withdrawal\Model;

use Ekyna\Component\Colissimo\Base;

/**
 * Class Conges
 * @package Ekyna\Component\Colissimo
 * @author  Etienne Dauvergne <contact@ekyna.com>
 *
 * @property \DateTime $calendarDeDebut
 * @property \DateTime $calendarDeFin
 * @property int       $numero
 */
class Conges extends Base\Model\AbstractModel
{
    /**
     * @inheritDoc
     */
    public static function buildDefinition(Base\Definition\Definition $definition): void
    {
        $definition
            ->addField(new Base\Definition\Date('calendarDeDebut', true, DATE_ISO8601))
            ->addField(new Base\Definition\Date('calendarDeFin', true, DATE_ISO8601))
            ->addField(new Base\Definition\Numeric('numero', true, 1));
    }
}
