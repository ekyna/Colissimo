<?php

namespace Ekyna\Component\Colissimo\Withdrawal\Method;

use Ekyna\Component\Colissimo\Withdrawal\Request\FindPointRequest;
use Ekyna\Component\Colissimo\Withdrawal\Response\FindPointResponse;

/**
 * Class FindPointMethod
 * @package Ekyna\Component\Colissimo
 * @author  Etienne Dauvergne <contact@ekyna.com>
 */
class FindPointMethod extends AbstractMethod
{
    /**
     * @inheritDoc
     */
    protected function getMethodName()
    {
        return 'findPointRetraitAcheminementByID';
    }

    /**
     * @inheritDoc
     */
    protected function getRequestClass()
    {
        return FindPointRequest::class;
    }

    /**
     * @inheritDoc
     */
    protected function getResponseClass()
    {
        return FindPointResponse::class;
    }
}
