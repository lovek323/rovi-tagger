<?php

namespace RoviTagger\RoviClient\Response;

class Credit extends EntityAbstract
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
     * @var string
     */
    public $credit;

    /**
     * @var string
     */
    public $type;

    /**
     * {@inheritDoc}
     */
    public static function fromObject($object)
    {
        $retval = new Credit();

        $retval->id     = $object->id;
        $retval->name   = $object->name;
        $retval->credit = $object->credit;
        $retval->type   = $object->type;

        return $retval;
    }
}