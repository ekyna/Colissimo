<?php

namespace Ekyna\Component\Colissimo\Tracking\Model;

use Ekyna\Component\Colissimo\Base;

/**
 * Class TrackResult
 * @package Ekyna\Component\Colissimo\Tracking\Model
 * @author  Etienne Dauvergne <contact@ekyna.com>
 *
 * @property string    $eventCode
 * @property \DateTime $eventDate
 * @property string    $eventLibelle
 * @property string    $eventSite
 * @property string    $recipientCity
 * @property string    $recipientCountryCode
 * @property string    $recipientZipCode
 * @property string    $skybillNumber
 */
class TrackResult extends Base\Model\AbstractModel
{
    /**
     * @inheritDoc
     */
    public static function buildDefinition(Base\Definition\Definition $definition): void
    {
        $definition
            ->addField(new Base\Definition\AlphaNumeric('eventCode', true, 64))
            ->addField(new Base\Definition\Date('eventDate', true, \DateTime::ATOM))
            ->addField(new Base\Definition\AlphaNumeric('eventLibelle', true, 64))
            ->addField(new Base\Definition\AlphaNumeric('eventSite', true, 64))
            ->addField(new Base\Definition\AlphaNumeric('recipientCity', true, 64))
            ->addField(new Base\Definition\AlphaNumeric('recipientCountryCode', true, 64))
            ->addField(new Base\Definition\AlphaNumeric('recipientZipCode', true, 64))
            ->addField(new Base\Definition\AlphaNumeric('skybillNumber', true, 64));
    }
}