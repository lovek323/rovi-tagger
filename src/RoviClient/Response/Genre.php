<?php

namespace RoviTagger\RoviClient\Response;

class Genre extends EntityAbstract
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
        $retval = new Genre();

        $retval->id   = $object->id;
        $retval->name = $object->name;

        return $retval;
    }
}
