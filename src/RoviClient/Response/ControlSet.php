<?php

namespace RoviTagger\RoviClient\Response;

class ControlSet extends EntityAbstract
{
    /**
     * @var string
     */
    public $status;

    /**
     * @var int
     */
    public $code;

    /**
     * @var mixed
     */
    public $messages;

    /**
     * @param object $object The JSON decoded object.
     * @return ControlSet
     */
    public static function fromObject($object)
    {
        $retval           = new ControlSet();
        $retval->status   = $object->status;
        $retval->code     = $object->code;
        $retval->messages = $object->messages;

        return $retval;
    }
}