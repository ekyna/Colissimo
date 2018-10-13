<?php
declare (strict_types=1);

namespace Ekyna\Component\Colissimo\Postage\Method;

use Ekyna\Component\Colissimo\Postage;

/**
 * Class GetProductInterMethod
 * @package Ekyna\Component\Colissimo
 * @author  Etienne Dauvergne <contact@ekyna.com>
 */
class GetProductInterMethod extends AbstractMethod
{
    /**
     * @inheritdoc
     */
    protected function getMethodName(): string
    {
        return 'getProductInter';
    }

    /**
     * @inheritdoc
     */
    protected function getResponseClass(): string
    {
        return Postage\Response\GetProductInterResponse::class;
    }

    /**
     * @inheritdoc
     */
    protected function getRequestClass(): string
    {
        return Postage\Request\GetProductInterRequest::class;
    }
}
