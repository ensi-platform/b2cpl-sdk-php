<?php

namespace Ensi\B2Cpl\Adapter;

use Ensi\B2Cpl\Dto\AbstractDto;
use Ensi\B2Cpl\Exception\ExceptionInterface;
use Ensi\B2Cpl\Exception\ResponseException;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;

/**
 * Class GuzzleAdapter
 * @package Ensi\B2Cpl\Adapter
 */
class GuzzleAdapter extends AbstractAdapter implements AdapterInterface
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Response
     */
    protected $response;

    /**
     * @var ExceptionInterface
     */
    protected $exception;

    /**
     * @param string             $login
     * @param string             $password
     * @param ClientInterface    $client    (optional)
     * @param ExceptionInterface $exception (optional)
     * @param string             $platform  (optional)
     * @throws \InvalidArgumentException
     */
    public function __construct(
        string $login = '',
        string $password = '',
        ClientInterface $client = null,
        ExceptionInterface $exception = null,
        $platform = null
    ) {
        $this->login = trim($login) ? : $this->login;
        $this->key = trim($password) ? : $this->key;

        $that = $this;
        $this->exception = isset($exception) ? $exception : new ResponseException();
        
        $options = [];

        if ($platform) {
            $options['headers'] = ['platform' => $platform];
        }
        
        $handler = HandlerStack::create();
        $handler->push(Middleware::mapResponse(function (ResponseInterface $response) use ($that) {
            $that->handleResponse($response);
            return $response;
        }));
        
        $options['handler'] = $handler;
        
        $this->client = $client ?: new Client($options);
    }
    
    /**
     * @param  string  $func
     * @return array
     */
    protected function base(string $func): array
    {
        return [
            'client' => $this->login,
            'key' => $this->key,
            'func' => $func,
        ];
    }
    
    /**
     * @inheritDoc
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get(string $func, array $headers = [], array $query = [])
    {
        $options['headers'] = array_merge($headers, ['content-type' => 'application/json']);
        $options['query']   = $query + $this->base($func);
        
        $this->response = $this->client->request("GET", $this->getUrl(), $options);
        $body = (string) $this->response->getBody();
        
        return mb_detect_encoding($body, 'utf-8', true) ?
            $body : mb_convert_encoding($body, "utf-8", "windows-1251");
    }
    
    /**
     * @inheritDoc
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function delete(string $func, array $headers = [])
    {
        $options['headers'] = $headers;
        $options['json']    = $this->base($func);
        
        $this->response = $this->client->request("DELETE", $this->getUrl(), $options);

        return (string) $this->response->getBody();
    }
    
    /**
     * @inheritDoc
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function put(string $func, array $headers = [], $content = [])
    {
        $options['headers'] = array_merge($headers, ['content-type' => 'application/json']);
        $options['json']    = $content + $this->base($func);
        $this->response     = $this->client->request("PUT", $this->getUrl(), $options);

        return (string) $this->response->getBody();
    }
    
    /**
     * @inheritDoc
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function post(string $func, array $headers = [], $content = [])
    {
        $options['headers'] = array_merge($headers, ['content-type' => 'application/json']);
        $options['json']    = $content + $this->base($func);
        $this->response     = $this->client->request("POST", $this->getUrl(), $options);

        return (string) $this->response->getBody();
    }

    /**
     * @param ResponseInterface $response
     *
     * @throws \RuntimeException|ExceptionInterface
     */
    protected function handleResponse(ResponseInterface $response)
    {
        $this->response = $response;
        $code = $this->response->getStatusCode();
        $body = (string) $this->response->getBody();
        $body = mb_detect_encoding($body, 'utf-8', true) ?
            $body : mb_convert_encoding($body, "utf-8", "windows-1251");
        $content = new AbstractDto(json_decode($body, true) ?? []);

        if ($content->success || $content->result) {
            return;
        }

        if ($this->exception) {
            throw $this->exception->create($body, $code);
        }

        throw new \RuntimeException(
            sprintf('[%d]: %s', $code, $content->message ?? $content->text_error),
            $code
        );
    }
}
