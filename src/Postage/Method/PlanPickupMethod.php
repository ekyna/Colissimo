<?php
declare (strict_types=1);

namespace Ekyna\Component\Colissimo\Postage\Method;

use Ekyna\Component\Colissimo\Postage;

/**
 * Class PlanPickupMethod
 * @package Ekyna\Component\Colissimo
 * @author  Etienne Dauvergne <contact@ekyna.com>
 */
class PlanPickupMethod extends AbstractMethod
{
    /**
     * @inheritdoc
     */
    protected function getMethodName(): string
    {
        return 'planPickup';
    }

    /**
     * @inheritDoc
     */
    protected function getResponseClass()
    {
        return Postage\Response\PlanPickupResponse::class;
    }

    /**
     * @inheritdoc
     */
    protected function getRequestClass(): string
    {
        return Postage\Request\PlanPickupRequest::class;
    }
}
