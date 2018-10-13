<?php

namespace Ekyna\Component\Colissimo\Tracking\Method;

use Ekyna\Component\Colissimo\Tracking\Request\TrackRequest;
use Ekyna\Component\Colissimo\Tracking\Response\TrackResponse;

/**
 * Class TrackMethod
 * @package Ekyna\Component\Colissimo\Tracking\Method
 * @author  Etienne Dauvergne <contact@ekyna.com>
 */
class TrackMethod extends AbstractMethod
{
    /**
     * @inheritDoc
     */
    protected function getMethodName()
    {
        return 'track';
    }

    /**
     * @inheritDoc
     */
    protected function getRequestClass()
    {
        return TrackRequest::class;
    }

    /**
     * @inheritDoc
     */
    protected function getResponseClass()
    {
        return TrackResponse::class;
    }
}
