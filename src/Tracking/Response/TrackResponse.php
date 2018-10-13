<?php

namespace Ekyna\Component\Colissimo\Tracking\Response;

use Ekyna\Component\Colissimo\Base;
use Ekyna\Component\Colissimo\Tracking\Model\TrackResult;

/**
 * Class TrackResponse
 * @package Ekyna\Component\Colissimo\Tracking\Response
 * @author  Etienne Dauvergne <contact@ekyna.com>
 *
 * @property TrackResult $return
 */
class TrackResponse extends Base\Response\AbstractResponse
{
    /**
     * @inheritDoc
     */
    public static function buildDefinition(Base\Definition\Definition $definition): void
    {
        $definition
            ->addField(new Base\Definition\Model('return', true, TrackResult::class));
    }
}