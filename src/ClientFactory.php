<?php

namespace Ekyna\Component\Colissimo;

/**
 * Class ClientFactory
 * @package Ekyna\Component\Colissimo
 * @author  Etienne Dauvergne <contact@ekyna.com>
 */
class ClientFactory implements ClientFactoryInterface
{
    /**
     * @var bool
     */
    private $cache;

    /**
     * @var bool
     */
    private $debug;

    /**
     * @var object[]
     */
    private $clients;


    /**
     * Constructor.
     *
     * @param bool $cache
     * @param bool $debug
     */
    public function __construct(bool $cache = true, bool $debug = false)
    {
        $this->cache = $cache;
        $this->debug = $debug;
    }

    /**
     * @inheritdoc
     */
    public function getClient($class)
    {
        if (isset($this->clients[$class])) {
            return $this->clients[$class];
        }

        return $this->clients[$class] = new $class($this->cache, $this->debug);
    }
}
