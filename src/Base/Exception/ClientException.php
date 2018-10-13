<?php
declare (strict_types=1);

namespace Ekyna\Component\Colissimo\Base\Exception;

/**
 * Class ClientException
 * @package Ekyna\Component\Colissimo
 * @author  Etienne Dauvergne <contact@ekyna.com>
 */
class ClientException extends \RuntimeException implements ExceptionInterface
{
    /**
     * @var string
     */
    public $request;

    /**
     * @var string
     */
    public $response;


    /**
     * Creates a new client exception.
     *
     * @param \SoapClient $client
     * @param \Exception  $exception
     *
     * @return ClientException
     */
    public static function create(\SoapClient $client, \Exception $exception)
    {
        $exception = new static($exception->getMessage(), $exception->getCode(), $exception);

        if (!empty($xml = $client->__getLastRequest())) {
            $exception->request = static::formatXml($xml);
        }
        if (!empty($xml = $client->__getLastResponse())) {
            $exception->response = static::formatXml($xml);
        }

        return $exception;
    }

    /**
     * Pretty print the given XML.
     *
     * @param string $xml
     *
     * @return string
     */
    public static function formatXml(string $xml): string
    {
        if (empty($xml)) {
            return '';
        }

        $doc = new \DOMDocument();
        $doc->preserveWhiteSpace = false;
        $doc->formatOutput = true;
        $doc->loadXML($xml);

        return $doc->saveXML();
    }
}
