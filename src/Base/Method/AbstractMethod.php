<?php
declare (strict_types=1);

namespace Ekyna\Component\Colissimo\Base\Method;

use Ekyna\Component\Colissimo\Base\Exception\InvalidArgumentException;
use Ekyna\Component\Colissimo\Base\Request\RequestInterface;

/**
 * Class AbstractMethod
 * @package Ekyna\Component\Colissimo\Method
 * @author  Etienne Dauvergne <contact@ekyna.com>
 */
abstract class AbstractMethod implements MethodInterface
{
    /**
     * @inheritdoc
     */
    public function supports(RequestInterface $request): void
    {
        $class = $this->getRequestClass();

        if (!$request instanceof $class) {
            throw new InvalidArgumentException("Expected instance if $class.");
        }
    }

    /**
     * Returns the soap method name.
     *
     * @return string
     */
    abstract protected function getMethodName();

    /**
     * Returns the request class.
     *
     * @return string
     */
    abstract protected function getRequestClass();

    /**
     * Returns the response class.
     *
     * @return string
     */
    abstract protected function getResponseClass();
}
