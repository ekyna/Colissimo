<?php

namespace Ekyna\Component\Colissimo\Tracking\Method;

use Ekyna\Component\Colissimo\Base\Method\AbstractMethod as BaseMethod;
use Ekyna\Component\Colissimo\Base\Request\RequestInterface;
use Ekyna\Component\Colissimo\Base\Response\Message;
use Ekyna\Component\Colissimo\Base\Response\ResponseInterface;
use Ekyna\Component\Colissimo\Tracking\Client;

/**
 * Class AbstractMethod
 * @package Ekyna\Component\Colissimo\Tracking\Method
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

        $object = $this->client->call($this->getMethodName(), $request);
        /** @var ReturnInterface $return */
        /** @noinspection PhpUndefinedFieldInspection */
        $return = $object->return;

        // Soap class map does not work ...
        $class = $this->getResponseClass();
        /** @var ResponseInterface $response */
        $response = new $class;
        /** @noinspection PhpUndefinedFieldInspection */
        $response->return = $return;

        if (0 === $return->errorCode) {
            $response->setSuccess(true);
        } else {
            $response->addMessage(new Message($return->errorCode, 'ERROR', $return->errorMessage));
        }

        return $response;
    }
}