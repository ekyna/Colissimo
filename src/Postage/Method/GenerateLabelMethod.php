<?php
declare (strict_types=1);

namespace Ekyna\Component\Colissimo\Postage\Method;

use Ekyna\Component\Colissimo\Postage;

/**
 * Class GenerateLabelMethod
 * @package Ekyna\Component\Colissimo
 * @author  Etienne Dauvergne <contact@ekyna.com>
 */
class GenerateLabelMethod extends AbstractMethod
{
    /**
     * @inheritdoc
     */
    protected function getMethodName(): string
    {
        return 'generateLabel';
    }

    /**
     * @inheritDoc
     */
    protected function getResponseClass()
    {
        return Postage\Response\GenerateLabelResponse::class;
    }

    /**
     * @inheritdoc
     */
    protected function getRequestClass(): string
    {
        return Postage\Request\GenerateLabelRequest::class;
    }
}
