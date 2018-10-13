<?php

namespace Ekyna\Component\Colissimo\Postage\Method;

use Ekyna\Component\Colissimo\Base\Method\AbstractMethod as BaseMethod;
use Ekyna\Component\Colissimo\Base\Request\RequestInterface;
use Ekyna\Component\Colissimo\Base\Response\ResponseInterface;
use Ekyna\Component\Colissimo\Postage\Client;

/**
 * Class AbstractMethod
 * @package Ekyna\Component\Colissimo
 * @author  Etienne Dauvergne <contact@ekyna.com>
 */
abstract class AbstractMethod extends BaseMethod
{
    /**
     * @var Client
     */
    private $client;


    /**
     * Constructor.
     *
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @inheritdoc
     */
    public function execute(RequestInterface $request): ResponseInterface
    {
        $this->supports($request);

        $request->validate();

        return $this->client->call($this->getMethodName(), $request, $this->getResponseClass());
    }
}