<?php

namespace RoviTagger\RoviClient\Request;

use RoviTagger\RoviClient\Response\ResponseInterface;

interface RequestInterface
{
    /**
     * @return string[] Return a list of parameters for this request.
     */
    function getParameters();

    /**
     * @return string The request path.
     */
    function getPath();

    /**
     * @param object $response The JSON-decoded server result.
     * @return ResponseInterface A parsed response object.
     */
    function parseResponse($response);
}