<?php

namespace RoviTagger\RoviClient;

use RoviTagger\RoviClient\Request\RequestInterface;
use RoviTagger\RoviClient\Response\ResponseInterface;

class RoviClient
{
    const API_URL = 'http://api.rovicorp.com';

    /**
     * @var string The API key.
     */
    private $apiKey;

    /**
     * @var string The signature.
     */
    private $secret;

    /**
     * @param string $apiKey The API key.
     * @return RoviClient
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
        return $this;
    }

    /**
     * @param string $secret The signature.
     * @return RoviClient
     */
    public function setSecret($secret)
    {
        $this->secret = $secret;
        return $this;
    }

    /**
     * @param RequestInterface $request The request to perform.
     * @return ResponseInterface Parsed response object.
     */
    public function getRequest(RequestInterface $request)
    {
        $url         = self::API_URL.'/'.$request->getPath();
        $parameters  = $this->addCommonParameters($request->getParameters());
        $queryString = http_build_query($parameters);
        $url         = $url.'?'.$queryString;

        $jsonResult   = file_get_contents($url);
        $objectResult = json_decode($jsonResult);

        return $request->parseResponse($objectResult);
    }

    /**
     * @param string[] $parameters Add common parameters to a request-specific list of parameters.
     * @return string[] A full set of parameters for a request.
     */
    private function addCommonParameters($parameters)
    {
        return array_merge(
            $parameters,
            array(
                'language'   => 'en',
                'country'    => 'US',
                'format'     => 'json',
                'apikey'     => $this->apiKey,
                'sig'        => md5($this->apiKey.$this->secret.time()),
            )
        );
    }
}
