<?php

namespace RoviTagger\RoviClient\Request;

use RoviTagger\RoviClient\Response\ControlSet;
use RoviTagger\RoviClient\Response\SearchResponse;
use RoviTagger\RoviClient\Response\SearchResult;

class SearchRequest implements RequestInterface
{
    /**
     * @var string Type of content to search for. One of song, album, artist.
     */
    private $entityType;

    /**
     * @var string The search string.
     */
    private $query;

    /**
     * @var string[] Additional data to include in each result.
     */
    private $include;

    public function __construct($entityType, $query, $include)
    {
        $this->entityType = $entityType;
        $this->query      = $query;
        $this->include    = $include;
    }

    /**
     * {@inheritDoc}
     */
    public function getParameters()
    {
        return array(
            'entitytype' => $this->entityType,
            'query'      => $this->query,
            'rep'        => 1,
            'include'    => implode(',', $this->include),
            'size'       => 20,
            'offset'     => 0,
        );
    }

    /**
     * {@inheritDoc}
     */
    public function getPath()
    {
        return 'search/v2.1/music/search';
    }

    /**
     * {@inheritDoc}0
     */
    function parseResponse($response)
    {
        $retval             = new SearchResponse();
        $response           = $response->searchResponse;
        $retval->id         = $response->{'meta:id'};
        $retval->controlSet = ControlSet::fromObject($response->controlSet);
        $retval->results    = SearchResult::fromObjectArray($response->results);

        return $retval;
    }
}
