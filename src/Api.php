<?php
declare (strict_types=1);

namespace Ekyna\Component\Colissimo;

use Ekyna\Component\Colissimo\Base\ClientInterface;
use Ekyna\Component\Colissimo\Base\Exception\RuntimeException;
use Ekyna\Component\Colissimo\Base\Method\MethodInterface;
use Ekyna\Component\Colissimo\Base\Request\CredentialRequestInterface;
use Ekyna\Component\Colissimo\Base\Response\ResponseInterface;

/**
 * Class Api
 * @package Ekyna\Component\Colissimo
 * @author  Etienne Dauvergne <contact@ekyna.com>
 *
 * @method Postage\Response\GenerateLabelResponse generateLabel(Postage\Request\GenerateLabelRequest $request)
 * @method Postage\Response\GetProductInterResponse getProductInter(Postage\Request\GetProductInterRequest $request)
 * @method Postage\Response\GetListMailBoxPickingDatesResponse getListMailBoxPickingDates(Postage\Request\GetListMailBoxPickingDatesRequest $request)
 * @method Postage\Response\PlanPickupResponse planPickup(Postage\Request\PlanPickupRequest $request)
 *
 * @method Withdrawal\Response\FindPointsResponse findPoints(Withdrawal\Request\FindPointsRequest $request)
 * @method Withdrawal\Response\FindPointResponse findPoint(Withdrawal\Request\FindPointRequest $request)
 *
 * @method Tracking\Response\TrackResponse track(Tracking\Request\TrackRequest $request)
 */
class Api
{
    /**
     * @var array
     */
    private $config;

    /**
     * @var ClientInterface[]
     */
    private $clients;


    /**
     * Constructor.
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = array_replace([
            'login'    => null,
            'password' => null,
            'cache'    => true,
            'debug'    => false,
        ], $config);

        $this->clients = [];
    }

    /**
     * Calls the method with parameters.
     *
     * @param string $name       The method name
     * @param array  $parameters The parameters
     *
     * @return ResponseInterface
     */
    public function __call($name, $parameters): ResponseInterface
    {
        $method = $this->createMethod($name);
        $request = current($parameters);

        if ($request instanceof CredentialRequestInterface) {
            $request->setCredentials($this->config['login'], $this->config['password']);
        }

        /* TODO caching */

        return $method->execute($request);
    }

    /**
     * Creates the method.
     *
     * @param string $name
     *
     * @return MethodInterface
     */
    private function createMethod(string $name): MethodInterface
    {
        $methodClass = $clientClass = null;

        foreach (['Postage', 'Tracking', 'Withdrawal'] as $ns) {
            $class = 'Ekyna\\Component\\Colissimo\\' . $ns . '\\Method\\' . ucwords($name) . 'Method';
            if (class_exists($class)) {
                $methodClass = $class;
                $clientClass = 'Ekyna\\Component\\Colissimo\\' . $ns . '\\Client';
                break;
            }
        }

        if (is_null($methodClass)) {
            throw new RuntimeException("Method {$name} does not exist");
        }

        return new $methodClass($this->getClient($clientClass));
    }

    /**
     * Returns the client.
     *
     * @param string $class
     *
     * @return \stdClass
     */
    private function getClient($class)
    {
        if (isset($this->clients[$class])) {
            return $this->clients[$class];
        }

        return $this->clients[$class] = new $class($this->config['cache'], $this->config['debug']);
    }
}
