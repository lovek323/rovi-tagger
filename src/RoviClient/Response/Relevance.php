<?php

namespace RoviTagger\RoviClient\Response;

class Relevance extends EntityAbstract
{
    /**
     * @var string
     */
    public $code;

    /**
     * @var double
     */
    public $value;

    public static function fromObject($object)
    {
        $retval        = new Relevance();
        $retval->code  = $object->code;
        $retval->value = $object->value;

        return $retval;
    }
}