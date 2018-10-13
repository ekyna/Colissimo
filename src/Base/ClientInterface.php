<?php
declare (strict_types=1);

namespace Ekyna\Component\Colissimo\Base;

/**
 * Interface ClientInterface
 * @package Ekyna\Component\Colissimo
 * @author  Etienne Dauvergne <contact@ekyna.com>
 */
interface ClientInterface
{
    /**
     * Returns the host.
     *
     * @return string
     */
    public function getHost(): string;

    /**
     * Call the web service method.
     *
     * @param string $method
     * @param mixed  $arguments
     *
     * @return mixed
     *
     * @throws \Ekyna\Component\Colissimo\Base\Exception\ClientException
     */
    public function call(string $method, $arguments);
}