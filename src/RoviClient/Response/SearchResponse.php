<?php

namespace RoviTagger\RoviClient\Response;

class SearchResponse implements ResponseInterface
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var ControlSet
     */
    public $controlSet;

    /**
     * @var SearchResult[]
     */
    public $results;
}
