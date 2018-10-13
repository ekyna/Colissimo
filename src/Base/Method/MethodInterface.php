<?php
declare (strict_types=1);

namespace Ekyna\Component\Colissimo\Base\Method;

use Ekyna\Component\Colissimo\Base\Request\RequestInterface;
use Ekyna\Component\Colissimo\Base\Response\ResponseInterface;

/**
 * Interface MethodInterface
 * @package Ekyna\Component\Colissimo\Method
 * @author  Etienne Dauvergne <contact@ekyna.com>
 */
interface MethodInterface
{
    /**
     * Executes the request.
     *
     * @param RequestInterface $request
     *
     * @return ResponseInterface
     */
    public function execute(RequestInterface $request) : ResponseInterface;

    /**
     * Asserts that the request is supported.
     *
     * @param RequestInterface $request
     *
     * @throws \Ekyna\Component\Colissimo\Base\Exception\ExceptionInterface
     */
    public function supports(RequestInterface $request): void;
}
