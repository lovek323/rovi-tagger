<?php

namespace RoviTagger\RoviClient\Response;

class SearchResult extends EntityAbstract
{
    /**
     * @var string
     */
    public $type;

    /**
     * @var Relevance
     */
    public $relevance;

    /**
     * @var string
     */
    public $id;

    /**
     * @var mixed
     */
    public $messages;

    /**
     * @var Album
     */
    public $album;

    /**
     * {@inheritDoc}
     */
    public static function fromObject($object)
    {
        $retval = new SearchResult();

        $retval->type      = $object->type;
        $retval->relevance = Relevance::fromObjectArray($object->relevance);
        $retval->id        = $object->id;
        $retval->messages  = $object->messages;
        $retval->album     = Album::fromObject($object->album);

        return $retval;
    }
}