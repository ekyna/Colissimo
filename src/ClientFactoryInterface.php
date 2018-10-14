<?php

namespace Ekyna\Component\Colissimo;

/**
 * Interface ClientFactoryInterface
 * @package Ekyna\Component\Colissimo
 * @author  Etienne Dauvergne <contact@ekyna.com>
 */
interface ClientFactoryInterface
{
    /**
     * Returns the client.
     *
     * @param string $class
     *
     * @return object
     */
    public function getClient($class);
}
