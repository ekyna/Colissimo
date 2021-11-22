<?php
declare (strict_types=1);

namespace Ekyna\Component\Colissimo\Postage;

use Ekyna\Component\Colissimo\Base\Exception\ClientException;
use Ekyna\Component\Colissimo\Base\Normalizer\ModelNormalizer;
use Ekyna\Component\Colissimo\Base\Request\RequestInterface;
use Ekyna\Component\Colissimo\Base\Response\Attachment;
use Ekyna\Component\Colissimo\Base\Response\Message;
use Ekyna\Component\Colissimo\Base\Response\ResponseInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Serializer;

/**
 * Class Client
 * @package Ekyna\Component\Colissimo
 * @author  Etienne Dauvergne <contact@ekyna.com>
 */
class Client extends \GuzzleHttp\Client
{
    private const ENDPOINT = 'https://ws.colissimo.fr/sls-ws/SlsServiceWSRest/2.0/';

    /**
     * @var bool
     */
    private $cache;

    /**
     * @var bool
     */
    private $debug;

    /**
     * @var Serializer
     */
    private $serializer;


    /**
     * Constructor.
     *
     * @param bool $cache
     * @param bool $debug
     */
    public function __construct(bool $cache = false, bool $debug = false)
    {
        $this->cache = $cache;
        $this->debug = $debug;

        parent::__construct([
            'base_uri'       => static::ENDPOINT,
            'stream_context' => [
                'ssl' => [
                    'verify_peer'       => false,
                    'verify_peer_name'  => false,
                    'allow_self_signed' => true,
                ],
            ],
        ]);
    }

    /**
     * Returns the serializer
     *
     * @return Serializer
     */
    public function getSerializer(): Serializer
    {
        if ($this->serializer) {
            return $this->serializer;
        }

        return $this->serializer = new Serializer([new ModelNormalizer()], [new JsonEncoder()]);
    }

    /**
     * Call the web service.
     *
     * @param string           $method
     * @param RequestInterface $request
     * @param string           $responseClass
     *
     * @return ResponseInterface
     *
     * @throws ClientException
     */
    public function call(string $method, RequestInterface $request, $responseClass)
    {
        $serializer = $this->getSerializer();

        $req = $res = null;

        try {
            $req = $serializer->normalize($request, 'json');

            $res = $this->request('POST', $method, [
                'json' => $req,
            ]);

            return $this
                ->parseResponse($res->getBody()->getContents(), $responseClass)
                ->setSuccess(true);
        } catch (\GuzzleHttp\Exception\RequestException $exception) {
            if (null !== $res = $exception->getResponse()) {
                return $this->parseResponse($res->getBody()->getContents(), $responseClass);
            }

            throw $exception;
        } catch (\Exception $exception) {
            $exception = new ClientException('REST call failed', 0, $exception);

            if ($this->debug && $req) {
                $exception->request = $req;
            }
            if ($this->debug && $res) {
                $exception->response = $res;
            }

            throw $exception;
        }
    }

    /**
     * Parses the response.
     *
     * @param string $response
     * @param string $class
     *
     * @return ResponseInterface
     */
    private function parseResponse(string $response, string $class): ResponseInterface
    {
        if (0 === preg_match_all('~--uuid:[a-zA-Z0-9-]+~', $response, $matches, PREG_OFFSET_CAPTURE)) {
            $responses = [[
                'headers' => [
                    'Content-Type'              => 'application/json;charset=UTF-8',
                    'Content-Transfer-Encoding' => 'binary',
                    'Content-ID'                => '<jsonInfos>',
                ],
                'body'    => $response,
            ]];
        } else {
            $uuids = $matches[0];

            $parts = [];

            for ($i = 0; $i < count($uuids) - 1; $i++) {
                $start = $uuids[$i][1] + strlen($uuids[$i][0]) + 2;
                $parts[] = substr($response, $start, $uuids[$i + 1][1] - $start);
            }

            $responses = [];

            foreach ($parts as $part) {
                list($header, $body) = explode("\r\n\r\n", $part);

                $headers = [];
                foreach (explode("\r\n", $header) as $line) {
                    list($key, $value) = explode(':', $line);
                    $headers[trim($key)] = trim($value);
                }

                $responses[] = [
                    'headers' => $headers,
                    'body'    => $body,
                ];
            }
        }

        /** @var ResponseInterface $response */
        $response = null;
        foreach ($responses as $part) {
            if ($part['headers']['Content-ID'] === '<jsonInfos>') {
                $response = $this->serializer->deserialize($part['body'], $class, 'json');
                if (isset($part['body']['messages']) && !empty($part['body']['messages'])) {
                    foreach ($part['body']['messages'] as $m) {
                        $response->addMessage(new Message(intval($m['id']), $m['type'], $m['messageContent']));
                    }
                }
            } elseif ($response) {
                $response->addAttachment(
                    new Attachment(trim($part['headers']['Content-ID'], '<>'), $part['body'])
                );
            }
        }

        return $response;
    }
}
