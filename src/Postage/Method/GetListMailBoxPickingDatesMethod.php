<?php
declare (strict_types=1);

namespace Ekyna\Component\Colissimo\Postage\Method;

use Ekyna\Component\Colissimo\Postage;

/**
 * Class GetListMailBoxPickingDatesMethod
 * @package Ekyna\Component\Colissimo
 * @author  Etienne Dauvergne <contact@ekyna.com>
 */
class GetListMailBoxPickingDatesMethod extends AbstractMethod
{
    /**
     * @inheritdoc
     */
    protected function getMethodName(): string
    {
        return 'getListMailBoxPickingDates';
    }

    /**
     * @inheritDoc
     */
    protected function getResponseClass()
    {
        return Postage\Response\GetListMailBoxPickingDatesResponse::class;
    }

    /**
     * @inheritdoc
     */
    protected function getRequestClass(): string
    {
        return Postage\Request\GetListMailBoxPickingDatesRequest::class;
    }
}
