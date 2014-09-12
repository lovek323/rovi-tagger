<?php

namespace RoviTagger\RoviClient\Response;

class Artist extends EntityAbstract
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * {@inheritDoc}
     */
    public static function fromObject($object)
    {
        $retval = new Artist();

        $retval->id   = $object->id;
        $retval->name = $object->name;

        return $retval;
    }
}
