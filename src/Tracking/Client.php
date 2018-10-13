<?php
declare (strict_types=1);

namespace Ekyna\Component\Colissimo\Tracking;

use Ekyna\Component\Colissimo\Base\Exception\ClientException;
use Ekyna\Component\Colissimo\Base\Request\RequestInterface;
use Ekyna\Component\Colissimo\Base\Response\ResponseInterface;

/**
 * Class Tracking
 * @package Ekyna\Component\Colissimo
 * @author  Etienne Dauvergne <contact@ekyna.com>
 */
class Client extends \SoapClient
{
    private const WSDL = 'https://www.coliposte.fr/tracking-chargeur-cxf/TrackingServiceWS?wsdl';

    /**
     * @var bool
     */
    private $cache;

    /**
     * @var bool
     */
    private $debug;


    /**
     * Constructor.
     *
     * @param bool   $cache
     * @param bool   $debug
     */
    public function __construct(bool $cache = false, bool $debug = false)
    {
        $this->cache = $cache;
        $this->debug = $debug;

        parent::__construct(static::WSDL, [
            'trace'        => $debug ? 1 : 0,
            'soap_version' => SOAP_1_1,
            'compression'  => true,
        ]);
    }

    /**
     * Call the web service method.
     *
     * @param string           $method
     * @param RequestInterface $request
     *
     * @return ResponseInterface
     *
     * @throws ClientException
     */
    public function call(string $method, RequestInterface $request)
    {
        try {
            $parameters = $request->toArray();

            return $this->__soapCall($method, ['parameters' => $parameters]);
        } catch (\Exception $exception) {
            if ($this->debug) {
                throw ClientException::create($this, $exception);
            }

            throw new ClientException($exception->getMessage(), $exception->getCode(), $exception);
        }
    }
}