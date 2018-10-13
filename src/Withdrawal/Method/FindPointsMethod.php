<?php

namespace Ekyna\Component\Colissimo\Withdrawal\Method;

use Ekyna\Component\Colissimo\Withdrawal\Request\FindPointsRequest;
use Ekyna\Component\Colissimo\Withdrawal\Response\FindPointsResponse;

/**
 * Class FindPointsMethod
 * @package Ekyna\Component\Colissimo
 * @author  Etienne Dauvergne <contact@ekyna.com>
 */
class FindPointsMethod extends AbstractMethod
{
    /**
     * @inheritDoc
     */
    protected function getMethodName()
    {
        return 'findRDVPointRetraitAcheminement';
    }

    /**
     * @inheritDoc
     */
    protected function getRequestClass()
    {
        return FindPointsRequest::class;
    }

    /**
     * @inheritDoc
     */
    protected function getResponseClass()
    {
        return FindPointsResponse::class;
    }
}
